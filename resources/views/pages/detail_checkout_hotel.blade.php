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
                <div class="col my-1">
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
                        <p>Trip to {{ $item -> location }}</p>
                        {{-- <div class="attendee">
                            <div class="table-responsive">
                                <table class="table text-center">
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
                        </div> --}}

                        {{-- <div class="member mt-3">
                            <form method="post" action="{{ route('checkout-hotel-create') }}">
                                @csrf
                                <input type="hidden" name="hotels_id" value="{{ $item->id }}">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="username" class="form-label">Name</label>
                                        <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="username" placeholder="Username" readonly  required value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="nationality" class="form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control mb-2 mr-sm-2" id="nationality" placeholder="Nationality" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="nationality" class="form-label">Finish Date</label>
                                        <input type="date" name="finish_date" class="form-control mb-2 mr-sm-2" id="nationality" placeholder="Nationality" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="doe_passport" class="form-label">&nbsp;</label><br>
                                        <button type="submit" class="btn btn-add-now px-3 mx-auto">Add Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="col my-1">
                    <div class="card card-details">
                        <h2><b>Checkout Information</b></h2>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Hotel Price</div>
                            <div class="col-6 text-right">IDR {{ number_format($item -> hotel -> price) }} / Night</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Subtotal</div>
                            <div class="col-6 text-right">IDR {{ number_format($item -> transaction_total) }}</div>
                        </div>
                        <div class="row mb-2 trip-information">
                            <div class="col-6">Total(+Unique)</div>
                            <div class="col-6 text-right text-total">
                                <span class="text-blue">IDR {{ number_format($item -> transaction_total) }}.</span>
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
                                    <h3>PT. Traject ID</h3>
                                    <p>5271 6789 8877 <br> Bank Central Asia</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{url('images/ic_bank.webp')}}" alt="" class="bank-image my-2">
                                <div class="description">
                                    <h3>PT. Traject ID</h3>
                                    <p>6435 5555 6661 <br> Bank Mandiri</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="join-container my-3">
                            <a href="{{ route('checkout-hotel-success', $item -> id) }}" class="btn btn-block btn-join-now py-2">Confirm Payment</a>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('checkout-hotel-remove', $item->id)}}" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
