@extends('layouts.masteradmin')
@section('title', 'Appointment Management')
@section('content')
<?php
$usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
$status = array( "ยังไม่รับเรื่อง", "รับเรื่องแล้ว","กำลังดำเนินการ", "เสร็จสิ้น","ยกเลิก");
$color = array( "default", "info",'warning', "success","danger");
?>
<table class="table">
        <thead class="thead-dark">
          <tr>
                <th style="text-align: center; width: 5%">No.</th>
                <th style="text-align: center; width: 15%">Campus</th>
                <th style="text-align: center; width: 10%">Category</th>
                <th style="text-align: center; width: 10%">SubCategory</th>
                <th style="text-align: center; width: 10%">UserType</th>
                <th style="text-align: center; width: 15%">Name</th>
                <th style="text-align: center; width: 15%">สถานะการทำงาน</th>
                <th style="text-align: center; width: 15%">การจัดการ</th>
          </tr>
        </thead>
        <tbody>
                @if(count($complaint)>0)
                <?php $cout = 0;?>
                @foreach ($complaint as $item)
                @if(DB::table('priorityjobs')->where('issues_id','=',$item->issues_id)->exists())
                <tr class="danger">
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
                <td style="text-align: center">
                <span class="label label-{{$color[$item->status]}}">{{$status[$item->status]}}</span>
                </td>
                <td style="text-align:center">
                        <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                จัดการ <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a target="_blank" class="dropdown-item" href="{{url('/admin/list/'.$item->issues_id)}}">รายละเอียด</a></li>
                                  <li><a href="{{ url('set/statusonduty/'.$item->issues_id) }}">กำลังดำเนินการ</a></li>
                                  <li><a href="{{ url('submit/report/'.$item->issues_id) }}">ดำเนินการเสร็จสิ้น</a></li>
                                  <li><a href="{{ url('reject/report/'.$item->issues_id) }}">ยกเลิกคำร้องเรียน</a></li>
                                </ul>
                        </div>
                </td>

                </tr>
                @endif
                @endforeach
                @foreach ($complaint as $item)
                @if(!DB::table('priorityjobs')->where('issues_id','=',$item->issues_id)->exists())
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
                <td style="text-align: center">{{$item->getUser->fname }}</td>
                @endif
                <td style="text-align: center">
                <span class="label label-{{$color[$item->status]}}">{{$status[$item->status]}}</span>
                </td>
                <td style="text-align:center">
                        <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                จัดการ <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a target="_blank" class="dropdown-item" href="{{url('/admin/list/'.$item->issues_id)}}">รายละเอียด</a></li>
                                  <li><a href="{{ url('set/statusonduty/'.$item->issues_id) }}">กำลังดำเนินการ</a></li>
                                  <li><a href="{{ url('submit/report/'.$item->issues_id) }}">ดำเนินการเสร็จสิ้น</a></li>
                                  <li><a href="{{ url('reject/report/'.$item->issues_id) }}">ยกเลิกคำร้องเรียน</a></li>
                                </ul>
                        </div>
                </td>

                </tr>
                @endif
                @endforeach
                @else
                    <tr>
                        <td colspan="8">ไม่พบเรื่องร้องเรียน</td>
                    </tr>
    @endif
</tbody>
</table>
<div style="text-align: center"> {{$complaint->links() }}</div>
<br >
<h3> การรายงานแบบเรียลไทม์</h3>
<hr>

<div class="panel panel-default">
        <table class="table">
            <thead>
              <tr>
                    <th style="text-align: center; width: 5%">No.</th>
                    <th style="text-align: center; width: 15%">Campus</th>
                    <th style="text-align: center; width: 10%">Category</th>
                    <th style="text-align: center; width: 10%">SubCategory</th>
                    <th style="text-align: center; width: 10%">UserType</th>
                    <th style="text-align: center; width: 15%">Name</th>
                    <th style="text-align: center; width: 15%">สถานะการทำงาน</th>
                    <th style="text-align: center; width: 15%">การจัดการ</th>
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

@endsection
@section('script')
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
                             url:"{{route('real.list2')}}",
                             method:'GET',
                             dataType:'json',
                             data:{allcount:count, usertype:usertype, category_id:{{$category_id}}},
                             success:function(data)
                             {
                                 if(data.html_1=="-1"){
                                 }else{
                                    $('#content_list').append(data.html_1);
                                    count++;
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
</script>
@endsection
