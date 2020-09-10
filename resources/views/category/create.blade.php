@extends('dashboard')
@section('dashboard-content')
    <h1>Create Category Form</h1>
    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong>{{Session::get('success')}}</strong>
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

    <form action="{{URL::to('post-category-form')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Create Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name="categoryName">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Create Icon</label>
            <input type="file" class="form-control" name="categoryIcon" onchange="loadPhoto(event)">
        </div>
        <div>
            <img id="photo" height="100" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        function loadPhoto(event){
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop
