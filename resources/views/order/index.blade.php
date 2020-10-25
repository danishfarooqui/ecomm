@extends('layout')
@section('dashboard-content')

    @if(Session::get('Deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{Session::get('Deleted')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
           All Orders
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Photo</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Photo</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product->name}}</td>
                        <td><img src="{{$order->product->photo}}" width="100" height="100"></td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>
                            <a href="{{URL::to('edit-category')}}/{{$order->id}}" class="btn btn-outline-primary btn-sm">Approve</a>
                            |
                            <a href="{{URL::to('delete-category')}}/{{$order->id}}" class="btn btn-outline-primary btn-sm" onclick="checkDelete()">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm("Are you sure you want to cancel?");
            if(check){
                return true;
            }
            else{
                return false;
            }
        }
    </script>

@stop
