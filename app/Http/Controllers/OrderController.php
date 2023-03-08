<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Favorites;
use App\Models\Order;
use App\Models\Servicescategory;
use App\Models\Subcategory;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {

        // Section = country , product = town
        $validate = $request->validate([
            'photo' => 'required',
            'orderName' => 'required',
            'orderDescription' => 'required',
            'startPrice' => 'required',
            'endPrice' => 'required',
            'Section' => 'required',
            'product' => 'required',
        ]);

        $mytime = Carbon::now()->toDateString();

        $imgData = [];
        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->move(public_path('Attachments/' . 'ordersImage'), $name);
                $imgData[] = $name;
            }
        }

        $country = Country::where('id', $request->Section)->first();
        $town = Town::where('id', $request->product)->first();

        Order::create([
            'orderName' => $request->orderName,
            'category_id' => $request->categoryId,
            'user_id' => auth()->user()->id,
            'subCategory' => $request->subCategory,
            'additionalService' => $request->additionalService,
            'photo_name' => $imgData,
            'photo_path' => "Attachments/ordersImage/",
            'orderDescription' => $request->orderDescription,
            'startPrice' => $request->startPrice,
            'endPrice' => $request->endPrice,
            'country' => $request->Section,
            'country_name' => $country->country_name,
            'town' => $request->product,
            'town_name' => $town->town_name,
            'phone' => $request->phone,
            'contact' => $request->contact,
            'date' => $mytime,
            'order_type' => auth()->user()->type,
        ]);





        if (auth()->user()->type == "0") {
            return redirect()->route('peopleOrders');
        } else {
            return redirect()->route('companyOrders');
        }
    }

    public function peopleOrders()
    {
        $categoris = Category::all();
        $subcategoris = Subcategory::all();
        $services = Servicescategory::all();
        $countries = Country::all();
        $user_orders = Order::where('order_type', "0")->where('ended_order', "0")->get();
        // $company_orders = Order::where('order_type',"0")->get();
        //return $user_orders;

        return view('order.peopleOrders', compact('categoris', 'subcategoris', 'services', 'countries', 'user_orders'));
    }

    public function companyOrders()
    {
        $categoris = Category::all();
        $subcategoris = Subcategory::all();
        $services = Servicescategory::all();
        $countries = Country::all();
        $company_orders = Order::where('order_type', "1")->where('ended_order', "0")->get();

        // return $orders;
        return view('order.companyOrders', compact('categoris', 'subcategoris', 'services', 'countries', 'company_orders'));
    }

    public function orderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $comments = Comment::where(['order_id' => $id, 'parent_id' => null])->get();

        return view('order.orderDetails', compact('order', 'comments'));
    }

    public function orderComment(Request $request)
    {
        //return $request;
        $data = $request->all();
        Comment::create($data);
        return back();
    }

    public function allOrders()
    {

        $user_orders = Order::where('order_type', "0")->where('user_id', auth()->user()->id)->where('ended_order', "0")->get();
        //return $user_orders;

        $company_orders = Order::where('order_type', "1")->where('user_id', auth()->user()->id)->where('ended_order', "0")->get();
        //return $company_orders;

        $ended_user_order = Order::where('order_type', "0")->where('user_id', auth()->user()->id)->where('ended_order', "1")->get();
        //return $ended_user_order;

        $ended_company_order = Order::where('order_type', "1")->where('user_id', auth()->user()->id)->where('ended_order', "1")->get();
        //return $ended_company_order;

        return view('order.showAllOrders', compact('user_orders', 'company_orders', 'ended_user_order', 'ended_company_order'));
    }

    public function endOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $comments = Comment::where('order_id', $id)->get();

        return view('order.endOrderDetails', compact('order', 'comments'));
    }

    public function endOrderDone($id)
    {
        Order::where('id', $id)->update(['ended_order' => "1"]);
        return redirect('home');
    }

    public function rePublishOrder($id)
    {
        Order::where('id', $id)->update(['ended_order' => "0"]);
        return redirect('home');
    }

    public function favorites()
    {
        $fav = Favorites::where(['user_id' => auth()->user()->id])->get('order_id');

        $orders = [];
        foreach ($fav as $fav) {
            array_push($orders, Order::where('id', $fav->order_id)->first());
        }

        return view('order.favoriteOrders', compact('orders'));
    }

    public function orderNotificationDetails($id,$notification_id){

        $notification = auth()->user()->notifications()->where('id', $notification_id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        $order = Order::where('id', $id)->first();
        $comments = Comment::where(['order_id' => $id, 'parent_id' => null])->get();

        return view('order.orderDetails', compact('order', 'comments'));
    }
}
