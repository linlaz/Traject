@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaction  {{$item -> user -> name}}</h1>
    </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item -> id}}</td>
                </tr>
                <tr>
                    <th>Created At </th>
                    <td>{{ $item -> created_at}}</td>
                </tr>
                <tr>
                    <th>Travel Package</th>
                    <td>{{ $item -> hotel -> title}}</td>
                </tr>
                <tr>
                    <th>Buyer</th>
                    <td>{{ $item -> user -> name}}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>Rp.{{ $item -> start_date}}</td>
                </tr>
                <tr>
                    <th>Finish Date</th>
                    <td>Rp.{{ $item -> finish_date}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $item -> transaction_status}}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ $item -> transaction_total}}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection



