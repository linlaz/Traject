<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Requests\Admin\HotelRequest;

class HotelController extends Controller
{
    public function index()
    {
        $items = Hotel::all();
        return view('pages.admin.hotel.index', [
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.admin.hotel.create');
    }

    public function store(HotelRequest $request)
    {

        $data = $request->all();

        Hotel::create([
            'title' => $data['title'],
            'location' => $data['location'],
            'about' => $data['about'],
            'type' => $data['type'],
            'price' => $data['price'],
        ]);

        return redirect()->route('hotel.index');
    }
    public function edit($id)
    {
        $item = Hotel::findOrFail($id);

        return view('pages.admin.hotel.edit', [
            'item' => $item
        ]);
    }
    public function update(HotelRequest $request, $id)
    {
        $data = $request->all();

        $item = Hotel::findOrFail($id);
        $item->update($data);
        return redirect()->route('hotel.index');
    }
    public function destroy($id)
    {
        $item = Hotel::findOrFail($id);
        $item->delete();
        return redirect()->route('hotel.index');
    }
}
