@extends('layouts.masteradmin')
@section('title', 'edit-user Management')

@section('content')
@if(count($user) > 0)
<br>
<form method="post" class="form-group" action="{{url('/edit/user')}}" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
            @if($user[0]->picture == -1)
            <img src="{{asset('img/noimage.jpg')}}" class="img-thumbnail" width="200" height="200">
        @else
            <img src="{{url($user[0]->picture)}}" class="img-thumbnail" width="200" height="200">
        @endif
    </div>
    <div style="padding: 1%">
            <center>
            <input class="form-control" style="width: 30%;" type="file" name="images" accept="image/*" >
            </center></div>

    <div class="form-group">
        <label for="UDI"><b>UID</b></label>
    <input type="text" class="form-control" value="{{$user[0]->UID}}" readonly name="UID">
    </div>
    <p><strong>สถานะ: </strong></p>
    <label class="radio-inline"><input type="radio" id="student" name="usertype" value="1">นักศึกษา</label>
    <label class="radio-inline"><input type="radio" id="staff" name="usertype" value="2">บุคลากร</label>
    <div id="admin_div" hidden><label class="radio-inline"><input type="radio" name="usertype" value="0" id="admin" >ผู้ดูแลระบบ</label></div>



            <div class="input-group-prepend">
              <span class="input-group-text">ชื่อ</span>
            </div>
        <div class="form-group">
        <input type="text" class="form-control" value="{{$user[0]->fname}}" id="fname" name="fname">
        </div>
        <div class="input-group-prepend">
                <span class="input-group-text">นามสกุล</span>
              </div>
        <div class="form-group">
        <input type="text" class="form-control" value="{{$user[0]->lname}}" id="lname" name="lname">
        </div>

    <div class="form-group">
        <label for="email"><b>Email</b></label>
    <input type="email" class="form-control" value="{{$user[0]->email}}" name="email">
    </div>

    <div class="form-group">
            <label for="phone"><b>Phone</b></label>
        <input type="phone" class="form-control" value="{{$user[0]->phone}}" name="phone">
        </div>



    <div class="form-inline">
            <label for="category" class="mb-2 mr-sm-2"><b>Category:</b></label>
                <select name="category" id="category" class="custom-select mb-2 mr-sm-2">
                    @if(count($category)>0)
                    <option value="-1">ไม่พบข้อมูล</option>
                        @foreach ($category as $row)
                <option value="{{$row->category_id}}">{{$row->category_name}}</option>
                        @endforeach
                    @endif
            </select>
            <label for="pwd2" class="mb-2 mr-sm-2"><b>Position:</b></label>
                <select name="position" id="position" class="custom-select mb-2 mr-sm-2">

            </select>
    </div>

    <div class="float-right">
    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">บันทึก</button>
    <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
    </div>
</form>
@else
เกิดข้อผิดพลาด
@endif
@endsection

@section('script')
<?php
if($user[0]->position_id == -1){
    $user_category=-1;
}
else{
    $user_category=$user[0]->getPosition->category_id;
}
?>
<script>
$(window).ready(function(){
    $("#category").val("{{$user_category}}");
    fetch_data($("#category").val());
            setTimeout(function() {
                document.getElementById("position").value = "{{$user[0]->position_id}}";
        }, 500);

        });
        </script>
<!--Script-->
<script>
$('#category').on('change', function() {
    fetch_data($(this).val());
});
function fetch_data(query){
            $.ajax({
             url:"{{route('me.position')}}",
             method:'GET',
             data:{query:query},
             dataType:'json',
             success:function(data)
             {
                $('#position').html(data.html_1);
             }
          })
         }
function editUser(id){
        window.location="/user/edit/"+id;
    }
</script>
<!-- script -->
@if($user[0]->usertype == 1)
<script>document.getElementById("student").checked = true;
</script>
@elseif($user[0]->usertype == 2)
<script>document.getElementById("staff").checked = true;
</script>
@elseif($user[0]->usertype == 0)
 <script>
 document.getElementById("admin_div").hidden =false;
 document.getElementById("admin").checked = true;
 </script>
@endif
@endsection
