@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Class</div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @if ($errors->any())
                        {!! implode('', $errors->all('<p class="alert alert-danger">:message</p>')) !!}
                    @endif
                    <form method="post" action="{{url('class/list/add')}}">
                        @csrf
                      <div class="form-group">
                        <label for="classname">Class Name:</label>
                        <input type="text" class="form-control" id="classname" name="class_name">
                      </div>
                      <button type="submit" class="btn btn-default">Add Class</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Class List</div>
                <div class="card-body">
                    <table id="classlist" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Class Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classLists as $classList)
                            <tr>
                                <td>{{$classList->id}}</td>
                                <td>{{$classList->class_name}}</td>
                                <td>
                                    <a href="{{url('class/list/update')}}/{{$classList->id}}">
                                        <i class="fa fa-pencil-square-o alert alert-info" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('class/list/delete')}}/{{$classList->id}}">
                                        <i class="fa fa-trash alert alert-danger" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready( function () {
        $('#classlist').DataTable();
} );
</script>
@endsection
