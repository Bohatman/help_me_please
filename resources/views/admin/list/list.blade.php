@extends('layouts.masteradmin')
@section('title', 'BossList Management')
@section('pagetitle')
<h2>ระบบจัดการเรื่องร้องเรียน</h2>
<hr>
@endsection
@section('content')
<?php
$usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
?>
<div class="panel panel-default">
<table class="table">
        <thead>
          <tr>
            <th style="text-align: center; width: 5%">No.</th>
            <th style="text-align: center; width: 14%">Campus</th>
            <th style="text-align: center; width: 10%">Category</th>
            <th style="text-align: center; width: 10%">SubCategory</th>
            <th style="text-align: center; width: 10%">UserType</th>
            <th style="text-align: center; width: 13%">Name</th>
            <th style="text-align: center; width: 20%">เจ้าหน้าที่</th>
            <th style="text-align: center; width: 13%">การจัดการ</th>
          </tr>
        </thead>
        <tbody>
@if(count($complaint)>0)
<?php $cout = 0;?>
@foreach ($complaint as $item)
<tr>
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
<td style="text-align: center">{{$item->getUser->fname}}</td>
@endif
<td>
    <div class="form-group">
<select class="form-control" name="PIC[]" id="select-{{$item->issues_id}}">
<option value = "-1">เลือกผู้ดูแล</option>

</select></div>

<!-- LOAD -->
<script>
        $(window).ready(function(){
            addMan({{$item->getList->category_id}},{{$item->issues_id}});
        });
        </script>
<!-- END-LOAD -->
</td>
<td style="text-align:center">
        <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                จัดการ <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a class="dropdown-item" onclick="sentAPP({{$item->issues_id}},{{Auth::user()->UID}})">มอบงาน</a></li>
                  <li><a href="{{ url('submit/report/'.$item->issues_id) }}">ดำเนินการเสร็จสิ้น</a></li>
                  <li><a href="{{ url('reject/report/'.$item->issues_id) }}">ยกเลิกคำร้องเรียน</a></li>
                  <li><a target="_blank" class="dropdown-item" href="{{url('/admin/list/'.$item->issues_id)}}">รายละเอียด</a></li>
                </ul>
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
<div style="text-align: center"> {{$complaint->links() }}</div>
</div>

<br >
<h3> การรายงานแบบเรียลไทม์</h3>
<hr>
<div class="panel panel-default">
<table class="table">
    <thead>
      <tr>
        <th style="text-align: center; width: 5%">No.</th>
        <th style="text-align: center; width: 14%">Campus</th>
        <th style="text-align: center; width: 10%">Category</th>
        <th style="text-align: center; width: 10%">SubCategory</th>
        <th style="text-align: center; width: 10%">UserType</th>
        <th style="text-align: center; width: 13%">Name</th>
        <th style="text-align: center; width: 20%">เจ้าหน้าที่</th>
        <th style="text-align: center; width: 13%">การจัดการ</th>
      </tr>
    </thead>
    <style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 0.5%;
          height: 0.5%;
          -webkit-animation: spin 2s linear infinite; /* Safari */
          animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        </style>
    <tbody id="content_list">
        <tr><td colspan="8" style="text-align: center"><div style="display: inline-block;" class="loader"></div><p>ระบบจะทำการโหลดข้อมูลทุกๆ 10 วินาที</p></td>
    </tbody>
</table>
</div>
<br>
@endsection

@section('script')
<!-- Script -->
<!-- Real-Time-->
<?php
    if(Auth::user()->usertype != 0){
    $position = DB::table('positions')->where('position_id','=',Auth::user()->position_id)->get();
    $category_id = $position[0]->category_id;
    }else{
        $category_id=-1;
    }
?>
<script>
var intervalID = window.setInterval(myCallback, 10000);
var usertype = {{Auth::user()->usertype}};
var count = {{$count}};
function myCallback() {
    $.ajax({
                     url:"{{route('real.list')}}",
                     method:'GET',
                     dataType:'json',
                     data:{allcount:count, usertype:usertype, category_id:{{$category_id}}},
                     success:function(data)
                     {
                         if(data.html_1=="-1"){
                         }else{
                            $('#content_list').append(data.html_1);
                            count++;
                            addMan(data.category_id,data.issues_id);
                         }
                     }
                  })
}
</script>


<script>
$(window).ready(function(){
    $('#listGroup_l').addClass('active');
    $('#list_l').addClass('active');
});
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
            var link = document.getElementById('select-'+seid);
            link.setAttribute('onclick', "");
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
@endsection
