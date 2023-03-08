<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Country;
use App\Models\Servicescategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('categ.categories', compact('categories'));
    }

    public function orderDetails($id)
    {
        $category = Category::find($id);
        //return $category;
        $subCategory = Subcategory::where('category_id', $id)->get();
        //return $category;
        $serviceCategory = Servicescategory::where('category_id', $id)->get();
        //return $serviceCategory;
        $countries = Country::all();
        //return $country;

        return view('order.createOrder', compact('category', 'subCategory', 'serviceCategory', 'countries'));
    }


    public function gettowns($id)
    {
        $towns = DB::table('towns')->where('country_id', $id)->pluck('town_name', 'id');
        return json_encode($towns);
    }


    //dashboard work methods
    /////////////////////////////////////////////////////////////////////////////////////////
    public function dashIndex()
    {
        $categories = Category::all();
        return view('dashboard.categories.categories', compact('categories'));
    }

    public function addCategory()
    {
        return view('dashboard.categories.addcategory');
    }

    public function addCategoryDone(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            if ($request->file('image')->getSize() < (5 * 1024 * 1024)) {
                $image_name = $request->image->getClientOriginalName();
                $image = $image_name;
                $file = $request->image->move(public_path('images/'), $image_name);
            }
        }

        $category = Category::create([
            'category_name' => $request->category_name,
            'category_image' => $image
        ]);

        return redirect()->route('index.category');
    }

    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        //return $category;
        return view('dashboard.categories.editcategory', compact('category'));
    }

    public function editCategorydone(Request $request, $id)
    {
        dd($request);
    }

    public function deleteCategory(Request $request)
    {
        Category::where('id', $request->id_category)->delete();
        return back();
    }
}
