<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function hotel(Request $request) {
        if ($request->search) {
            $searches = Hotel::where('title', 'LIKE', "%".$request->search."%")->take(4)->get();
        } else{
            $searches = "";
        }
        $populars = Hotel::all();
        return view('pages.service-hotel',[
            'searches' => $searches,
            'populars' => $populars,
        ]);
        // return view('pages.service-hotel', []);
    }
    public function show($id){
        $item = Hotel::with(['galleries_hotel'])->where('id', $id)->firstOrFail();
        return view('pages.detail_hotel', [
            'item' => $item,
        ]);
    }
}
