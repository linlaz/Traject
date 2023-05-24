@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add mitra</h1>
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

    <div class="card">
        <div class="card-body">
            <form action="{{route('mitra.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">nama mitra</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                
                <div class="form-group">
                    <label for="email">email mitra</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                
                <div class="form-group">
                    <label for="password">passwrod mitra</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
