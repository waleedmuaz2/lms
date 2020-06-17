@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Assign Class</div>
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
                    <form method="post" action="{{url('class/assign/store')}}">
                        @csrf
                      <div class="form-group">
                        <label for="teacher">Teacher</label>
                            <select name="teacher" class="form-control" id="teacher">
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->first_name}}{{$teacher->last_name}}</option>
                                @endforeach
                            </select>
                      </div>
                        <div class="form-group">
                            <label  for="class">Class</label>
                                <select name="class" class="form-control" id="class">
                                    @foreach($classLists as $classList)
                                        <option value="{{$classList->id}}">{{$classList->class_name}}</option>
                                    @endforeach
                                </select>
                        </div>
                      <button type="submit" class="btn btn-default">Assign Class</button>
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
                <div class="card-header">Assign Class</div>
                <div class="card-body">
                    <table id="classBusy" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Teacher</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classBusy as $Busy)
                            <tr>
                                <td>{{$Busy->id}}</td>
                                <td>{{$Busy->teacher->first_name}}{{$Busy->teacher->last_name}}</td>
                                <td>{{$Busy->class->class_name}}</td>
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
        $('#classBusy').DataTable();
} );
</script>
@endsection
