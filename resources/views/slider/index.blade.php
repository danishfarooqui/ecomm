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
           Slider Table
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Slider Names</th>
                        <th>Slider Message</th>
                        <th>Slider Image</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Slider Names</th>
                        <th>Slider Message</th>
                        <th>Slider Image</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->message}}</td>
                        <td><img src="{{$slider->image_url}}" width="100" height="100"></td>
                        <td>
                            <a href="{{URL::to('edit-slider')}}/{{$slider->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                            |
                            <a href="{{URL::to('delete-slider')}}/{{$slider->id}}" class="btn btn-outline-primary btn-sm" onclick="checkDelete()">Delete</a>
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
