<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
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
<form method="POST" action="{{url('/report')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="IPv4" value="{{get_client_ip()}}">
        <div class="form-group">
            <label for="category">ประเภทของปัญหา</label>
            <select name="category" class="custom-select" id="categorylist">
                @if(count($category))
                    @foreach ($category as $item)
                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                    @endforeach
                    @else
                        <option value="-1">ไม่พบข้อมูล</option>
                    @endif
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory">ระบุปัญหาของคุณ</label>
            <div id="subhere">
                <!-- ajax loading -->
            </div>
        </div>
        <div class="form-group">
            <label for="detail">รายละเอียดของปัญหา</label>
            <textarea required class="form-control" rows="5" name="detail"></textarea>
        </div>
        <!-- Upload -->
        <div class="form-group">
            <input type="file" name="images" id="filUpload" accept="image/*" >
        </div>

        <div class="form-group">
                <label for="place">วิทยาเขต:</label>
                <select name="campus" class="custom-select">
                            @foreach ($campus as $item)
                                <option value="{{$item->campus_id}}">{{$item->campus_name}}</option>
                            @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="place">อาคาร:</label>
            <input type="text" class="form-control" id="place" name="building">
          </div>
          <div class="form-group">
                <label for="place">ห้อง:</label>
                <input type="text" class="form-control" id="place" name="room">
              </div>
        <br>
        <hr>
        <br>
        <div class="form-group">
            <label for="usertype"><b>ผู้ร้องเรียน: </b></label>
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
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="guest" name="usertype" value="3">บุคคลภายนอก
                </label>
            </div>
        </div>
        <div id="information">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">ชื่อผู้แจ้ง</span>
                        </div>
                        <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname">
                        <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname">
                        <input type="hidden" id="UID" name="UID" value="-1">
                </div>
        <div class="form-group">
                <label for="email">email:</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        </div>
        <button type="submit" class="btn btn-primary">ส่งเรื่อง</button>
    </form>
<br><br>
</div>
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
<script>document.getElementById("staff").checked = true;
document.getElementById("student").disabled = true;
document.getElementById("guest").disabled = true;
</script>
@elseif($user->usertype == 0)
<script>
document.getElementById("staff").checked = true;
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
<script>document.getElementById("guest").checked = true;</script>
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
<script>
    $('input[type=radio][name=usertype]').change(function() {
    if (this.value == 1 || this.value == 2) {
        var data = document.getElementById("information").innerHTML;
        document.getElementById("information").innerHTML= "<h1>กรุณา LOGIN</h1>";
    }
    else{
        //คลิกกลับมาที่เดิม
    }
});
</script>
<!--Style-->

</body>
</html>
