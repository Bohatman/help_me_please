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

    <title>List</title>
</head>
<body>
    <?php
        $usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
        ?>
    <div class="container">
        <br>
        @if(\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div>
@elseif(\Session::has('Empty'))
<div class="alert alert-danger">
<p>{{ \Session::get('Empty') }}</p>
</div>
@else
<div class="alert alert-info">
  <strong>คำแนะนำ</strong> หากไม่รักก็หยุดจะได้ไม่เสียใจ.
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

            <table class="table">
                    <thead>
                      <tr>
                        <th style="text-align: center; width: 5%"><input type="checkbox" value=""></th>
                        <th style="text-align: center; width: 5%">No.</th>
                        <th style="text-align: center; width: 15%">Campus</th>
                        <th style="text-align: center; width: 10%">Category</th>
                        <th style="text-align: center; width: 10%">SubCategory</th>
                        <th style="text-align: center; width: 10%">UserType</th>
                        <th style="text-align: center; width: 15%">Name</th>
                        <th style="text-align: center; width: 15%">เจ้าหน้าที่</th>
                        <th style="text-align: center; width: 15%">การจัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
@if(count($complaint)>0)
<?php $cout = 0;?>
@foreach ($complaint as $item)
<tr>
<td style="text-align: center"><input name="select[]" type="checkbox" value="{{$item->issues_id}}"></td>
<td style="text-align: center">{{$item->issues_id}}</td>
<td style="text-align: center">{{$item->getList->getCampus->campus_name}}</td>
<td style="text-align: center">{{$item->getList->getCategory->category_name}}</td>
<!--Row หัวข้อย่อย-->
@if(!is_null($item->getList->getSubCategory))
<td style="text-align: center">{{$item->getList->getSubCategory->sub_category_name}}</td>
@else
<td style="text-align: center">none</td>
@endif
<td style="text-align: center">{{$usertype[$item->usertype]}}</td>
@if($item->usertype == 3)
<td style="text-align: center">{{$item->getGuest->fname}}</td>
@else
<td style="text-align: center">{{$item->getUser->fname }}</td>
@endif
<td>  <div class="form-group"><select class="form-control" name="PIC[]" id="select-{{$item->issues_id}}" onclick="addMan({{$item->getList->category_id}},{{$item->issues_id}})">
        <option value = "-1">เลือกผู้ดูแล</option>

      </select></div>
</td>
<td style="text-align:center">
        <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                   จัดการ
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" onclick="sentAPP({{$item->issues_id}},{{Auth::user()->UID}})">มอบงาน</a>
                <a target="_blank" class="dropdown-item" href="{{url('/admin/list/'.$item->issues_id)}}">รายละเอียด</a>
                </div>
              </div>
</td>

</tr>
@endforeach
@else
    <tr>
        <td colspan="8">ไม่พบเรื่องร้องเรียน</td>
    </tr>
@endif
</tbody>
</table>
    </div>

<!-- Script -->
<script>
function sentAPP(id,rhid){
    var PIC = document.getElementById("select-"+id).value;
    if(PIC == -1 || PIC == null){
        alert('กรุณาเลือกผู้รับผิดชอบ')
    }
    else{
    window.location="/admin/list/"+rhid+"/issues/"+id+"/picid/"+PIC;
    }
}
function addMan(id,seid){
    $.ajax({
             url:"{{route('me.staff')}}",
             method:'GET',
             data:{query:id},
             dataType:'json',
             success:function(data)
             {
                $('#select-'+seid).html(data.html_1);
             }
          })
}
</script>
</body>
</html>
