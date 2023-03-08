<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function addTown($id)
    {
        return view('dashboard.towns.addtown', compact('id'));
    }

    public function addTowndone(Request $request)
    {
        //return $request;
        $data = $request->all();
        Town::create($data);
        return redirect('townsCountry/' . $request->country_id);
    }

    public function editTown($id)
    {
        $town = Town::where('id', $id)->first();
        return view('dashboard.towns.edittown', compact('town'));
    }

    public function editTowndone(Request $request, $id)
    {
        Town::where('id', $id)->update([
            'town_name' => $request->town_name
        ]);

        $town  = Town::where('id', $id)->get();
        return redirect('townsCountry/' . $town[0]->country_id);
    }

    public function deleteTown(Request $request){
        Town::where('id',$request->id_town)->delete();
        return back();
    }
}
