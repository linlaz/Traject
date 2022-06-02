<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionHotel;

class TransactionHotelAdmin extends Controller
{
    public function index()
    {
        $items = TransactionHotel::with(['hotel', 'user'])->get();
        return view('pages.admin.transactionhotel.index', [
            'items' => $items
        ]);
    }
    public function show($id)
    {
        $item = TransactionHotel::with(['hotel', 'user'])->findOrFail($id);

        return view('pages.admin.transactionhotel.detail', [
            'item' => $item
        ]);
    }
    public function edit($id)
    {
        $item = TransactionHotel::findOrFail($id);

        return view('pages.admin.transactionhotel.edit', [
            'item' => $item
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionHotel::findOrFail($id);
        $item->update($data);
        return redirect()->route('transactionhotel.index');
    }
    public function destroy($id)
    {
        $item = TransactionHotel::findOrFail($id);
        $item->delete();
        return redirect()->route('transactionhotel.index');
    }
}
