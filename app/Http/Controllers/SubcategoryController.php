<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subCategries($id)
    {
        $category = Category::where('id', $id)->first();
        $subCategory = Subcategory::where('category_id', $id)->get();
        return view('dashboard.subcategories.subcategory', compact('category', 'subCategory'));
    }

    public function addSubCategory($id)
    {
        return view('dashboard.subcategories.addsubcategory', compact('id'));
    }

    public function addSubCategorydone(Request $request)
    {
        $data = $request->all();
        Subcategory::create($data);
        return redirect('subCategries/' . $request->category_id);
    }

    public function editSubCategory($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();
        return view('dashboard.subcategories.editsubcategory', compact('subcategory'));
    }

    public function editSubCategorydone(Request $request, $id)
    {
        Subcategory::where('id', $id)->update([
            'subcategory_name' => $request->subCategory_name
        ]);
        $sub  = Subcategory::where('id', $id)->get();
        return redirect('subCategries/' . $sub[0]->category_id);
    }

    public function deleteSubCategory(Request $request)
    {
        Subcategory::where('id',$request->id_subcategory)->delete();
        return back();
    }
}
