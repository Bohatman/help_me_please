<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>EDIT</title>
</head>
<body>
<div class="container">
        <br>
    @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
        @if (count($errors) > 0)
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
    <br>
        @if(count($user) > 0)
<br>
<form method="post" class="form-group" action="{{url('/edit/user')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="UDI"><b>UID</b></label>
    <input type="text" class="form-control" value="{{$user[0]->UID}}" readonly name="UID">
    </div>

    <div class="form-group">
        <label for="usertype"><b>สถานะ: </b></label>
        <div class="form-check-inline">
            <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="student" name="usertype" value="1">นักศึกษา
           </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label" for="radio2">
            <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
            </label>
        </div>
    </div>

    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">ชื่อผู้แจ้ง</span>
            </div>
        <input type="text" class="form-control" value="{{$user[0]->fname}}" id="fname" name="fname">
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
    <button type="submit" class="btn btn-primary">บันทึก</button>
    <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
    </div>
</form>
@else
เกิดข้อผิดพลาด
@endif
</div>
<?php
if($user[0]->position_id == -1){
    $user_category=-1;
}
else{
    $user_category=$user[0]->getPosition->category_id;
}
?>
<!--Script-->
<script>
$(window).ready(function(){
    $("#category").val("{{$user_category}}");
    fetch_data($("#category").val());
    $("#position").val("{{$user[0]->position_id}}");
});
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
@endif
</body>
</html>
