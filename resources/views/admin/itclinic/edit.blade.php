@extends('layouts.masteradmin')
@section('title', 'edit-user Management')

@section('content')
<br>
<form method="post" class="form-group" action="{{url('/edit/servicetype')}}">
    {{ csrf_field() }}
    <input type="hidden" name="servicetype_id" value="{{$servicetype->servicetype_id}}">
    <div class="form-group">
            <label for="service_name">Service Name:</label>
    <input type="text" class="form-control" name="servicetype_name" value="{{$servicetype->servicetype_name}}" required>
    </div>
    <div class="form-group">
            <label for="usertype"><b>ผู้มีสิทธิใช้งาน: </b></label>
                <label class="radio-inline" for="radio1">
                    <input type="radio" class="form-check-input" id="student" name="usertype" value="1" checked>นักศึกษา
               </label>
                <label class="radio-inline" for="radio2">
                <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
                </label>
    </div>
    <div class="form-group">
            <label for="servicetype_price">อัตราค่าบริการ(บาท):</label>
    <input type="number" class="form-control" name="servicetype_price" value="{{$servicetype->servicetype_price}}" required>
    </div>
    <div class="pull-right">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">บันทึก</button>
            <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
    </div>
    <br>
</form>

@endsection

@section('script')
<script>
        $(window).ready(function(){
            $('#controll_l').addClass('active');
            $('#servicetype_l').addClass('active');
        });
</script>
@if($servicetype->usertype == 1)
<script>document.getElementById("student").checked = true;
    </script>
@elseif($servicetype->usertype == 2)
<script>document.getElementById("staff").checked = true;
    </script>
@endif
@endsection
