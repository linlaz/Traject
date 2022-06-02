@extends('layouts.app')
@section('title', 'Traject | Checkout')
@section('style')
 <link rel="stylesheet" type="text/css" href="{{asset('css/checkout.css')}}">
@endsection

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            Travel Package
                        </li>
                        <li class="breadcrumb-item">
                            Details
                        </li>
                        <li class="breadcrumb-item active">
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 my-1">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is Going?</h1>
                        <p>Trip to {{ $item -> travel_package -> location }}</p>
                        <div class="attendee">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item -> details as $detail)
                                        <tr>
                                            <td class="align-middle"><img src="https://ui-avatars.com/api/?name={{ $detail->username }}?size=60" alt="" height="60px" class="rounded-circle"></td>
                                            <td class="align-middle">{{ $detail->username }}</td>
                                            <td class="align-middle">{{ $detail->nationality }}</td>
                                            <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td>
                                            <td class="align-middle"><a href="{{ route('checkout-remove', $detail->id) }}"><img src="{{url('images/ic_remove.webp')}}" alt=""></a></td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-3">No Visitor</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-1">
                    <div class="card card-details">
                        <h2><b>Checkout Information</b></h2>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Member</div>
                            <div class="col-6 text-right">{{ $item -> details -> count() }} Person</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Additional Visa</div>
                            <div class="col-6 text-right">IDR {{ $item -> additional_visa }}</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Trip Price</div>
                            <div class="col-6 text-right">IDR {{ number_format($item -> travel_package -> price) }} / Person</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Subtotal</div>
                            <div class="col-6 text-right">IDR {{ number_format($item->transaction_total) }}</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Total(+Unique)</div>
                            <div class="col-6 text-right text-total">
                                <span class="text-blue">IDR {{ number_format($item->transaction_total) }}.</span>
                                <span class="text-orange">{{mt_rand(0,99)}}</span>
                            </div>
                        </div>
                        <hr>
                        <h2><b>Payment Instruction</b></h2>
                        <p class="payment-instruction">Please complete your payment before continue to travel.</p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{url('images/ic_bank.webp')}}" alt="" class="bank-image my-2">
                                <div class="description">
                                    <h3>PT. Travelgo ID</h3>
                                    <p>5271 6789 8877 <br> Bank Central Asia</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{url('images/ic_bank.webp')}}" alt="" class="bank-image my-2">
                                <div class="description">
                                    <h3>PT. Travelgo ID</h3>
                                    <p>6435 5555 6661 <br> Bank Mandiri</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
