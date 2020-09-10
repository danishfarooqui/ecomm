@extends('layout')
@section('dashboard-content')

    @if(Session::get('deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{Session::get('Deleted')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{Session::get('failed')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Product Table
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product Names</th>
                        <th>Product Price</th>
                        <th>Product Discount</th>
                        <th>Product Category</th>
                        <th>Product photo</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Product Names</th>
                        <th>Product Price</th>
                        <th>Product Discount</th>
                        <th>Product Category</th>
                        <th>Product photo</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->category->name}}</td>
                        <td><img src="{{$product->photo}}" width="100" height="100"></td>
                        <td>
                            <a href="{{URL::to('edit-product')}}/{{$product->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                            |
                            <a href="{{URL::to('delete-product')}}/{{$product->id}}" class="btn btn-outline-primary btn-sm" onclick="checkDelete()">Delete</a>
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
             confirm("Are you sure you want to delete?");

        }
    </script>

@stop
