@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hotel</h1>
        <a href="{{route('hotel.create')}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Hotel
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Image</th>
                            <th>about</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->location}}</td>
                            @if (isset($item->galleries_hotel->first()->image))
                            <td><img src="{{ url($item->galleries_hotel->first()->image) }}" style="width: 200px"></td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{$item -> about}}</td>
                            <td>{{$item -> type}}</td>
                            <td>{{$item -> price}}</td>
                            <td>
                                <a href="{{route('hotel.edit', $item->id)}}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('hotel.destroy', $item->id)}}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Empty Data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
