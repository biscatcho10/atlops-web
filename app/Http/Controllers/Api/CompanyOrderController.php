<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CompanyOrderController extends Controller
{
    public function filterOrder(Request $request)
    {

        $request->validate([
            'category_id' => ['required', 'numeric']
        ]);
        $orders = Order::where('category_id', $request->category_id)->where('order_type', "1")->get();
        return response()->json($orders);
    }

    public function arrangeOrder(Request $request)
    {
        // return response()->json($request);
        if ($request->category_id == 0) {
            if ($request->value == 1) {
                $orders = Order::where('order_type', "1")->orderBy('created_at', "DESC")->get();
                return response()->json($orders);
            } else {
                $orders = Order::where('order_type', "1")->orderBy('created_at', "asc")->get();
                return response()->json($orders);
            }
        } else {
            if ($request->value == 1) {
                $orders = Order::where('category_id', $request->category_id)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
                return response()->json($orders);
            } else {
                $orders = Order::where('category_id', $request->category_id)->where('order_type', "1")->orderBy('created_at', "asc")->get();
                return response()->json($orders);
            }
        }
    }

    public function countryOrder(Request $request)
    {

        if ($request->category_id == 0 && $request->sort_id == 0) {
            $orders = Order::where('country', $request->value)->where('order_type', "1")->get();
        } elseif ($request->category_id != 0 && $request->sort_id == 0) {
            $orders = Order::where('country', $request->value)->where('order_type', "1")->where('category_id', $request->category_id)->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0) {
            if ($request->sort_id == 1) {
                $orders = Order::where('country', $request->value)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('country', $request->value)->where('order_type', "1")->orderBy('created_at', "asc")->get();
            }
        } else {
            if ($request->sort_id == 1) {
                $orders = Order::where('country', $request->value)->where('order_type', "1")->where('category_id', $request->category_id)->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('country', $request->value)->where('order_type', "1")->where('category_id', $request->category_id)->orderBy('created_at', "asc")->get();
            }
        }

        return response()->json($orders);
    }

    public function townOrder(Request $request)
    {
        if ($request->category_id == 0 && $request->sort_id == 0 && $request->country_id == 0) {
            $orders = Order::where('town', $request->value)->where('order_type', "1")->get();
        } elseif ($request->category_id != 0 && $request->sort_id == 0 && $request->country_id == 0) {
            $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "1")->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0 && $request->country_id == 0) {
            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('order_type', "1")->orderBy('created_at', "asc")->get();
            }
        } elseif ($request->category_id == 0 && $request->sort_id == 0 && $request->country_id != 0) {

            $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "1")->get();
        } elseif ($request->category_id != 0 && $request->sort_id != 0 && $request->country_id == 0) {

            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('order_type', "1")->orderBy('created_at', "asc")->get();
            }
        } elseif ($request->category_id != 0 && $request->sort_id == 0 && $request->country_id != 0) {

            $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "1")->get();
        } elseif ($request->category_id == 0 && $request->sort_id != 0 && $request->country_id != 0) {

            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('country', $request->country_id)->where('order_type', "1")->orderBy('created_at', "asc")->get();
            }
        } else {
            if ($request->sort_id == 1) {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "1")->orderBy('created_at', "DESC")->get();
            } else {
                $orders = Order::where('town', $request->value)->where('category_id', $request->category_id)->where('country', $request->country_id)->where('order_type', "1")->orderBy('created_at', "asc")->get();
            }
        }

        return response()->json($orders);
    }
}
