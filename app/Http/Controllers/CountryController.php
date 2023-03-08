<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Town;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::all();
        return view('dashboard.countries.country', compact('country'));
    }

    public function addCountry()
    {
        return view('dashboard.countries.addcountry');
    }

    public function addCountrydone(Request $request)
    {
        $data = $request->all();
        Country::create($data);
        return redirect()->route('index.country');
    }

    public function editCountry($id)
    {
        $country = Country::where('id',$id)->first();
        return view('dashboard.countries.editcountry',compact('country'));
    }

    public function editCountrydone(Request $request,$id)
    {
        Country::where('id',$id)->update([
            'country_name' => $request->country_name
        ]);
        return redirect()->route('index.country');
    }

    public function deleteCountry(Request $request){
        Country::where('id',$request->id_country)->delete();
        return back();
    }

    public function townsCountry($id){
        $country = Country::where('id',$id)->first();
        $towns = Town::where('country_id',$id)->get();
        return view('dashboard.countries.townscountry',compact('country','towns'));
    }
}
