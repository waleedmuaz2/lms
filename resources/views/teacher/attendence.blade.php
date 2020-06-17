@extends('layouts.app')

@section('content')
@if($status==0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <form>
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
                                    <input type="checkbox" value="{{$teacher->id}}" name="teacher_id">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </form>
                    <button type="submit" class="btn btn-default" id="submit_attend">Submit Attendence</button>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <form>
                <div class="card-header">Teacher List</div>
                <div class="card-body">
                    <table id="teacher" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dateCurrent as $datecu)
                            <tr>
                                <td>{{$datecu->id}}</td>
                                <td>{{$datecu->teacher->first_name}}</td>
                                <td>{{$datecu->teacher->last_name}}</td>
                                <td>{{$datecu->teacher->email}}</td>
                                <td>{{($datecu->is_attend == 1) ? "Present" : "Absent"}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
@section('script')
<script type="text/javascript"> 
    $(document).ready( function () {
        $('#teacher').DataTable();
    $('#submit_attend').on('click', function(){
        var teacher_id = [];
        var un_teacher_id = [];
        $.each($("input[name='teacher_id']:checked"), function(){
            teacher_id.push($(this).val());
        });
        $.each($("input[name='teacher_id']:not(:checked)"), function(){
            un_teacher_id.push($(this).val());
        });
        $.ajax({
        url: "{{url('teacher/attendence/store')}}",
        type: "POST",
        data: {teacher_id:teacher_id,un_teacher_id:un_teacher_id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(response){
            if(response==1){
                window.location.reload();
            }
        }
    });


    });
} );
</script>
@endsection
