<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TransactionHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class TransactionHotelController extends Controller
{
    public function index($id) {
        $hotel = Hotel::findOrFail($id);
        return view('pages.checkout_hotel', [
            'item' => $hotel
        ]);
    }

    public function process(Request $request){


        $data = $request->validate([
            'username' => 'required',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'hotels_id' => 'required'
        ]);
        $hotel = Hotel::findOrFail($data['hotels_id']);
        $cDate = Carbon::parse($data['start_date']);
        // $cDate->diff($data['finish_date']);
        // $tanggal = date_diff($data['start_date'], $data['finish_date']);
        // $tanggal = $data['start_date'] - $data['finish_date'];
        // dd($cDate->diff($data['finish_date'])->days * $hotel->price);
        $hasil = $cDate->diff($data['finish_date'])->days * $hotel->price;
        if ($hasil < 1) {
            return redirect()->back();
        }

        $transaction = TransactionHotel::create([
            'hotels_id' => $data['hotels_id'],
            'users_id' => Auth::user()->id,
            'start_date' => $data['start_date'],
            'finish_date' => $data['finish_date'],
            'transaction_total' => $cDate->diff($data['finish_date'])->days * $hotel->price,
            'transaction_status' => 'IN_CART'
        ]);
        return redirect()->route('detail-checkout-hotel', $transaction->id);
    }

    public function create($id)
    {
        $hotel = TransactionHotel::with(['hotel'])->findOrFail($id);
        // dd($hotel);
        return view('pages.detail_checkout_hotel', [
            'item' => $hotel
        ]);
    }
    public function success($id)
    {
        $hotel = TransactionHotel::with(['hotel','user'])->findOrFail($id);
        $hotel->update(['transaction_status' => 'PENDING']);
        Mail::to($hotel->user->email)->send(new \App\Mail\TransactionSuccessHotel($hotel));
        // Mail::to($transaction->user)->send(
        //     new TransactionSuccess($transaction)
        // );

        return view('pages.success');
    }
    public function remove($id)
    {
        $hotel = TransactionHotel::with(['hotel','user'])->findOrFail($id)->delete();
        return redirect('/hotel');
    }
    // public function remove(Request $request, $detail_id){
    //     $item = TransactionDetail::findOrFail($detail_id);

    //     $transaction = TransactionHotel::with(['details', 'travel_package']) -> findOrFail($item -> transactions_id);

    //     if($item->is_visa){
    //         $transaction -> transaction_total -= 1500000;
    //         $transaction -> additional_visa -= 1500000;
    //     }

    //     $transaction -> transaction_total -= $transaction -> travel_package -> price;
    //     $transaction -> save();

    //     $item->delete();

    //     return redirect() -> route('checkout', $item -> transactions_id);
    // }

    // public function create(Request $request, $id){
    //     $request -> validate([
    //         'username' => 'required|string',
    //         'is_visa' => 'required|boolean',
    //         'doe_passport' => 'required'
    //     ]);

    //     $data = $request -> all();
    //     $data['transactions_id'] = $id;

    //     TransactionDetail::create($data);

    //     $transaction = TransactionHotel::with(['travel_package']) -> find($id);

    //     if($request->is_visa){
    //         $transaction -> transaction_total += 1500000;
    //         $transaction -> additional_visa += 1500000;
    //     }

    //     $transaction -> transaction_total += $transaction -> travel_package -> price;
    //     $transaction -> save();

    //     return redirect() -> route('checkout', $id);
    // }

    // public function success(Request $request, $id){
    //     $transaction = TransactionHotel::with(['details', 'travel_package.galleries', 'user'])->findOrFail($id);
    //     $transaction -> transaction_status = 'PENDING';

    //     $transaction -> save();
    //     Mail::to($transaction->user)->send(new \App\Mail\TransactionSuccess($transaction));
    //     // Mail::to($transaction->user)->send(
    //     //     new TransactionSuccess($transaction)
    //     // );

    //     return view('pages.success');
    // }
}
