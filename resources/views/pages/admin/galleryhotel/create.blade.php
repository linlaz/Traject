@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Gallery</h1>
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
            <form action="{{route('galleryhotel.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="hotels">Hotel</label>
                    <select name="hotel" required class="form-control">
                        <option value="">Select Hotel</option>
                        @foreach ($hotel as $travel_package)
                            <option value="{{$travel_package->id}}">
                                {{$travel_package->title}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
