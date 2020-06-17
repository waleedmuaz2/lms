@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Teacher</div>
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
                    <form method="post" action="{{url('teacher/list/add')}}">
                        @csrf
                      <div class="form-group">
                        <label for="first">Teacher First Name:</label>
                        <input type="text" class="form-control" id="first" name="first_name">
                      </div>
                      <div class="form-group">
                        <label for="last">Teacher Last Name:</label>
                        <input type="text" class="form-control" id="last" name="last_name">
                      </div>
                      <div class="form-group">
                        <label for="email">Teacher Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="password">Teacher Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                      <button type="submit" class="btn btn-default">Add Teacher</button>
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
                <div class="card-header">Teacher List</div>
                <div class="card-body">
                    <table id="teacher" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td>{{$teacher->first_name}}</td>
                                <td>{{$teacher->last_name}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>
                                    <a href="{{url('teacher/list/update')}}/{{$teacher->id}}">
                                        <i class="fa fa-pencil-square-o alert alert-info" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('teacher/list/delete')}}/{{$teacher->id}}">
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
        $('#teacher').DataTable();
} );
</script>
@endsection
