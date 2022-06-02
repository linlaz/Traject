<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryHotelRequest;
use App\Models\GalleryHotel;
use App\Models\Hotel;

class GalleryHotelController extends Controller
{
    public function index()
    {
        $items = GalleryHotel::with(['hotel'])->get();
        return view('pages.admin.galleryhotel.index', [
            'items' => $items
        ]);
    }
    public function create()
    {
        $hotel = Hotel::all();
        return view('pages.admin.galleryhotel.create',[
            'hotel' => $hotel
        ]);
    }
    public function store(GalleryHotelRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image')->store(
            '/assets/gallery', 'public'
        );
        $data['image'] = "storage/".$image;

        GalleryHotel::create([
            'hotels_id' => $data['hotel'],
            'image' => $data['image']
        ]);
        return redirect()->route('galleryhotel.index');
    }
    public function destroy($id)
    {
        $item = GalleryHotel::findOrFail($id);
        $item->delete();
        return redirect()->route('galleryhotel.index');
    }
}
