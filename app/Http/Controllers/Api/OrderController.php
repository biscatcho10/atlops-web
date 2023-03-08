<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Favorites;
use App\Models\Order;
use App\Models\User;
use App\Notifications\Add_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function filterOrder(Request $request)
    {

        $request->validate([
            'category_id' => ['required', 'numeric']
        ]);
        $orders = Order::where('category_id', $request->category_id)->where('order_type', "0")->get();
        return response()->json($orders);
    }

    public function arrangeOrder(Request $request)
    {
        // return response()->json($request);
        if ($request->category_id == 0) {
            if ($request->value == 1) {
                $orders = Order::where('order_type', "0")->orderBy('created_at', "DESC")->get();
                return response()->json($orders);
            } else {
                $orders = Order::where('order_type', "0")->orderBy('created_at', "asc")->get();
                return response()->json($orders);
            }
        } else {
            if ($request->value == 1) {
                $orders = Order::where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
                return response()->json($orders);
            } else {
                $orders = Order::where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "asc")->get();
                return response()->json($orders);
            }
        }
    }

    public function countryOrder(Request $request)
    {

        if ($request->category_id == 0 && $request->sort_id == 0) {
            $orders = Order::where('country', $request->value)->where('order_type', "0")->get();
        } elseif ($request->category_id != 0 && $request->sort_id == 0) {
            $orders = Order::where('country', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0) {
            if ($request->sort_id == 1) {
                $orders = Order::where('country', $request->value)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('country', $request->value)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        } else {
            if ($request->sort_id == 1) {
                $orders = Order::where('country', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('country', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        }

        return response()->json($orders);
    }

    public function townOrder(Request $request)
    {
        if ($request->category_id == 0 && $request->sort_id == 0 && $request->country_id == 0) {
            $orders = Order::where('town', $request->value)->where('order_type', "0")->get();
        } elseif ($request->category_id != 0 && $request->sort_id == 0 && $request->country_id == 0) {
            $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0 && $request->country_id == 0) {
            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        } elseif ($request->category_id == 0 && $request->sort_id == 0 && $request->country_id != 0) {

            $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "0")->get();
        } elseif ($request->category_id != 0 && $request->sort_id != 0 && $request->country_id == 0) {

            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        } elseif ($request->category_id != 0 && $request->sort_id == 0 && $request->country_id != 0) {

            $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "0")->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0 && $request->country_id != 0) {

            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        } else {
            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "0")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "0")->orderBy('created_at', "asc")->get();
            }
        }

        return response()->json($orders);
    }

    public function addtowishlist(Request $request)
    {
        //Order::where('id', $request->order_id)->update(['loved_order' => "1"]);
        $fav = Favorites::create([
            'order_id' => $request->order_id,
            'user_id' => $request->user_id
        ]);

        return "done";
    }

    public function removefromwishlist(Request $request)
    {
        //Order::where('id', $request->order_id)->update(['loved_order' => "0"]);

        $user_id = $request->user_id;
        $order_id = $request->order_id;

        Favorites::where(['user_id' => $user_id, 'order_id' => $order_id])->delete();

        return "done";
    }

    public function getlovedorder(Request $request)
    {
        // dd($request);
        // $order = order::where('id',$request->order_id)->first();
        // return $order->loved_order;

        $user_id = $request->user_id;
        $order_id = $request->order_id;


        $user = User::find($user_id);

        // like
        $orders = Favorites::where(['user_id' => $user_id, 'order_id' => $order_id])->pluck('order_id')->toArray();
        if (in_array($order_id, $orders)) {
            return "1";
        }

        return "0";
    }

    public function orderComment(Request $request)
    {

        //get the user who i comnented on his post
        $user_id = Order::find($request->order_id)->user_id;
        $get_user = User::where('id', $user_id)->first();


        $comment = Comment::create($request->all());
        $user = User::where('id', $request->user_id)->first();

        // Notification::send($user,Add_comment($comment));
        $get_user->notify(new Add_comment($comment, $user));


        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $serverKey = 'AAAAwGf_-m4:APA91bEY2ISTK0yqCd_C8jkFS5n-BRVnzKBaOZ3KYHWr4M2cuFbEDgc9tPrelBo3eeuAR3C1wapC-DzTaB_WkLMuSFSWouyv-9uQKJ_nEZz4BDkl3Wk5xVovnw9GQCv2Ig-BXxu_SmOW';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $user->firstName . $user->lastName . " علق على منتجك الجديد",
                "body" => $request->comment,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);


        return response()->json(['comment' => $comment, 'user' => $user, "auth_name" => $request->auth_name, "auth_photo" => $request->auth_photo]);
    }

    public function replyComment(Request $request)
    {

        //get the user who i replyed to his comment
        $user_id = Comment::find($request->comment_id)->user_id;
        $get_user = User::where('id', $user_id)->first();

        $comment = Comment::create([
            'user_id' => $request->user_id,
            'order_id' => $request->order_id,
            'parent_id' => $request->comment_id,
            'comment' => $request->comment,
        ]);
        $user = User::where('id', $request->user_id)->first();

        $get_user->notify(new Add_comment($comment, $user));


        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $serverKey = 'AAAAwGf_-m4:APA91bEY2ISTK0yqCd_C8jkFS5n-BRVnzKBaOZ3KYHWr4M2cuFbEDgc9tPrelBo3eeuAR3C1wapC-DzTaB_WkLMuSFSWouyv-9uQKJ_nEZz4BDkl3Wk5xVovnw9GQCv2Ig-BXxu_SmOW';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $user->firstName . $user->lastName . " رد على تعليقك",
                "body" => $request->comment,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);


        return response()->json(['comment' => $comment, 'user' => $user]);
        //return response()->json($request);
    }

    
}
