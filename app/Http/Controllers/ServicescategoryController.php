<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Servicescategory;
use Illuminate\Http\Request;

class ServicescategoryController extends Controller
{
    public function serviceCategries($id)
    {
        $category = Category::where('id', $id)->first();
        $serviceCategory = Servicescategory::where('category_id', $id)->get();
        return view('dashboard.servicecategories.servicecategory', compact('category', 'serviceCategory'));
    }

    public function addServiceCategory($id)
    {
        return view('dashboard.servicecategories.addservicecategory', compact('id'));
    }

    public function addServiceCategorydone(Request $request)
    {
        $data = $request->all();
        Servicescategory::create($data);
        return redirect('serviceCategries/' . $request->category_id);
    }

    public function editServiceCategory($id)
    {
        $serviceCategory = Servicescategory::where('id', $id)->first();
        return view('dashboard.servicecategories.editservicecategory', compact('serviceCategory'));
    }

    public function editServiceCategorydone(Request $request, $id)
    {
        Servicescategory::where('id', $id)->update([
            'service_name' => $request->service_name
        ]);
        $service  = Servicescategory::where('id', $id)->get();
        return redirect('serviceCategries/' . $service[0]->category_id);
    }

    public function deleteServiceCategory(Request $request)
    {
        Servicescategory::where('id', $request->id_servicecategory)->delete();
        return back();
    }
}
