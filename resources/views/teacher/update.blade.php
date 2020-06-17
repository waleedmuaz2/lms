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
                    @if ($errors->any())
                        {!! implode('', $errors->all('<p class="alert alert-danger">:message</p>')) !!}
                    @endif
                    <form method="post" action="{{url('teacher/list/update')}}">
                        @csrf
                      <div class="form-group">
                        <label for="classname">First Name:</label>
                        <input type="text" class="form-control"  name="first_name" value="{{$teacher->first_name}}">
                      </div>
                      <div class="form-group">
                        <label for="classname">Last Name:</label>
                        <input type="text" class="form-control"  name="last_name" value="{{$teacher->last_name}}">
                      </div>
                        <input type="hidden" class="form-control"  name="id" value="{{$teacher->id}}">
                      <button type="submit" class="btn btn-default">Update Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
