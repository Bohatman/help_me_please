@extends('layouts.new')
@section('title', 'Complaint page')
@section('content')
<p  style="color:white">" ---- "</p>
<h3 style="color:rgb(13, 68, 252)"><b>รายงานปัญหา</b></h3>
<hr>
<form method="POST" action="{{url('/report')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="IPv4" value="{{get_client_ip()}}">
    <input type="hidden" id="UID" name="UID" value="-1">

    <div class="form-group row">
            <label for="fname" class="col-sm-1 col-form-label">ชื่อ: </label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" placeholder="ชื่อผู้เเจ้ง" id="fname" name="fname">
            </div>
    </div>

    <div class="form-group row">
            <label for="lname" class="col-sm-1 col-form-label">นามสกุล: </label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" placeholder="นามสกุลผู้เเจ้ง" id="lname" name="lname">
            </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-sm-1 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
            </div>
    </div>

    <div class="form-group row">
            <label for ="usertype" class="control-label col-sm-2" >ประเภท:</label>
            <div class="col-sm-9">
                    <label class="radio-inline" style="padding-right: 1%" ><input type="radio" name="usertype" value="3" id="guest" checked> บุคคลทั่วไป</label>
                    <label class="radio-inline" style="padding-right: 1%"><input type="radio" name="usertype" value="1" id="student" > นักศึกษา</label>
                    <label class="radio-inline" style="padding-right: 1%"><input type="radio" name="usertype" value="2" id="staff"> บุคลากรของมหาวิทยาลัย</label>
                    <label hidden id="admin_div" style="padding-right: 1%"><input type="radio" name="usertype" value="0" id="admin"> ผู้ดูแลระบบ</label>
            </div>
    </div>

    <div class="form-group row">
            <label for ="select" class="control-label col-sm-2" >ประเภทของปัญหา:</label>
            <div class="col-sm-9">
                    <select class="form-control" name="category" class="custom-select" id="categorylist">
                            @if(count($category))
                                @foreach ($category as $item)
                                    <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                @endforeach
                                @else
                                    <option value="-1">ไม่พบข้อมูล</option>
                                @endif
                    </select>
            </div>
    </div>

    <div class="form-group row">
            <label for ="select" class="control-label col-sm-2" >ระบุปัญหา:</label>
            <div class="col-sm-9">
                    <select class="form-control" name="subcategory" class="custom-select" id="subhere">

                    </select>
            </div>
    </div>

    <div class="form-group row">
            <label for ="detail" class="control-label col-sm-2" >รายละเอียด:</label>
            <div class="col-sm-9">
            <textarea required class="form-control" name="detail" placeholder="รายละเอียดของปัญหา"></textarea>
            </div>
      </div>


      <div class="form-group row">
            <label class="control-label col-sm-2" for="building">อาคาร:</label>
            <div class="col-sm-9">
                    <input type="text" class="form-control" id="place" name="building">
            </div>
      </div>

      <div class="form-group row">
            <label class="control-label col-sm-2" for="room">ห้อง:</label>
            <div class="col-sm-9">
                    <input type="text" class="form-control" id="place" name="room">
            </div>
      </div>

      <div class="form-group row">
            <label for ="place" class="control-label col-sm-2" >วิทยาเขต:</label>
            <div class="col-sm-9">
                    <select name="campus" class="form-control">
                            @foreach ($campus as $item)
                                <option value="{{$item->campus_id}}">{{$item->campus_name}}</option>
                            @endforeach
                </select>            </div>
      </div>

      <div class="form-group row">
            <label class="control-label col-sm-2" for="email">แนบภาพ:</label>
            <div class="col-sm-9">
                <input class="form-control-file border" type="file" name="images" id="filUpload" accept="image/*" >
            </div>
      </div>

      <div class="form-group"  style="text-align: center">
              <button type="submit" class="btn btn-success">บันทึก</button>
        </div>

</form>
@endsection
@section('script')
<script>
$(window).ready(function(){
        $('#report_list').addClass('active');
    });
</script>
<?php
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
?>
<!-- script -->
@if (Auth::check())
<?php $user = Auth::user();
$fname =$user->fname;
$lname =$user->lname;
$email =$user->email;
$UID = $user->UID;
?>
@if($user->usertype == 1)
<script>document.getElementById("student").checked = true;
document.getElementById("staff").disabled = true;
document.getElementById("guest").disabled = true;
</script>
@elseif($user->usertype == 2)
<script>
document.getElementById("staff").checked = true;
document.getElementById("student").disabled = true;
document.getElementById("guest").disabled = true;
</script>
@elseif($user->usertype == 0)
<script>
    document.getElementById("admin_div").hidden =false;
    document.getElementById("admin").checked = true;
document.getElementById("staff").disabled = true;
document.getElementById("student").disabled = true;
document.getElementById("guest").disabled = true;
</script>
@endif
<script>
    document.getElementById("fname").value = "{{$fname}}";
    document.getElementById("fname").readOnly = true;
    document.getElementById("lname").value = "{{$lname}}";
    document.getElementById("lname").readOnly = true;
    document.getElementById("email").value = "{{$email}}";
    document.getElementById("email").readOnly = true;
    document.getElementById("UID").value = "{{$UID}}";

</script>
@else
<script>document.getElementById("guest").checked = true;
document.getElementById("staff").disabled = true;
document.getElementById("student").disabled = true;
document.getElementById("admin").disabled = true;
</script>
@endif
<script type="text/javascript">
    $(document).ready(function(){
        fetch_data($('#categorylist').val());
    });
    $('#categorylist').change(function() {
        var query = $(this).val();
        fetch_data(query);
    });
    function fetch_data(query = '')
          {
            $.ajax({
             url:"{{route('me.action')}}",
             method:'GET',
             data:{query:query},
             dataType:'json',
             success:function(data)
             {
                $('#subhere').html(data.html_1);
             }
          })
         }
</script>
<!--Style-->
@endsection
