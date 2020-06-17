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
                    <form method="post" action="{{url('class/list/update')}}">
                        @csrf
                      <div class="form-group">
                        <label for="classname">Class Name:</label>
                        <input type="text" class="form-control" id="classname" name="class_name" value="{{$classList->class_name}}">
                        <input type="hidden" class="form-control"  name="id" value="{{$classList->id}}">
                      </div>
                      <button type="submit" class="btn btn-default">Update Class</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
