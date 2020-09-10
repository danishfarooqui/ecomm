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
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Category Names</th>
                        <th>Category Icon</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Category Names</th>
                        <th>Category Icon</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><img src="{{$category->icon}}" width="100" height="100"></td>
                        <td>
                            <a href="{{URL::to('edit-category')}}/{{$category->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                            |
                            <a href="{{URL::to('delete-category')}}/{{$category->id}}" class="btn btn-outline-primary btn-sm" onclick="checkDelete()">Delete</a>
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
            var check = confirm("Are you sure you want to delete?");
            if(check){
                return true;
            }
            else{
                return false;
            }
        }
    </script>

@stop
