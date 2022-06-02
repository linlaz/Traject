@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
  </div>

  <div class="row">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Hotel</th>
                        <th>User</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item -> hotel -> title}}</td>
                        <td>{{$item -> user -> name}}</td>
                        <td>{{$item -> start_date}}</td>
                        <td>{{$item -> finish_date}}</td>
                        <td>Rp.{{$item -> transaction_total}}</td>
                        <td>{{$item -> transaction_status}}</td>
                        <td>
                            <a href="{{route('transactionhotel.show', $item->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('transactionhotel.edit', $item->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                             <form action="{{route('transactionhotel.destroy', $item->id)}}" method="post"
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
                        <td colspan="7" class="text-center">
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



