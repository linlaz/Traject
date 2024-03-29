@extends('layouts.app')
@section('title', 'Traject | Checkout Success')
@section('style')
    <link rel="stylesheet" type="text/css" href="/css/success.css">
@endsection

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{url('images/ic_mail.webp')}}" alt="">
            <h1>Yay! Success</h1>
            <p>We’ve sent you email for trip instruction <br> please read it as well</p>
            <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">Homepage</a>
        </div>
    </div>
</main>
@endsection
