@extends('layouts.masteradmin')
@section('title', 'Service-type Management')
@section('pagetitle')
<h2>IT Clinic</h2>
<hr>
@endsection
@section('content')
<?php
// 1 = จอง ,2 = done, 3=ยกเลิก
$status = array('','จองเวลาเรียบร้อย','เสร็จสิ้น','ยกเลิก');
$colorstatus = array('','label label-primary','label label-success','label label-danger');
?>
<div class="panel panel-default">
        <div class="panel-body">
            <label class="pull-left">เลือกวันที่</label>
            <select id ="date" class="form-control" onchange="myFunction()">
            <option value="{{date('Y-m-d')}}">{{date('Y-m-d')}}</option>
                @foreach ($date as $item)
                    @if($item->date != date('Y-m-d'))
            <option value="{{$item->date}}">{{$item->date}}</option>
                    @endif
                @endforeach
            </select>

                <table class="table">
                        <thead>
                          <tr>
                            <th style="text-align: center">หมายเลขการจอง</th>
                            <th style="text-align: center">สถานะ</th>
                            <th style="text-align: center">เวลา</th>
                            <th style="text-align: center">บริการ</th>
                            <th style="text-align: center">ชื่อผู้จอง</th>
                            <th style="text-align: center">การจัดการ</th>
                          </tr>
                        </thead>
                        <tbody id="list_item">
                          @foreach ($book as $item)
                            <tr>
                            <td style="text-align: center">{{$item->book_id}}</td>
                            <td style="text-align: center"><span class=" {{$colorstatus[$item->status]}}">{{$status[$item->status]}}</span></td>
                            <td style="text-align: center">{{$item->getTime->time_start." - ".$item->getTime->time_end}}</td>
                            <td style="text-align: center">{{$item->getType->servicetype_name}}</td>
                            <td style="text-align: center">{{$item->getUser->fname." ".$item->getUser->lname}}</td>
                            <td style="text-align: center">

                                    <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            จัดการ<span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{url('/admin/itpanel/'.$item->book_id)}}">ออกใบเสร็จ</a></li>
                                            <li><a href="{{url('/admin/itclinic/cancel/'.$item->book_id)}}">ยกเลิก</a></li>
                                            </ul>
                                          </div>

                            </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

        </div>
      </div>

      <br >
<h3> การรายงานแบบเรียลไทม์</h3>
<hr>
<div class="panel panel-default">
<table class="table">
    <thead>
      <tr>
            <th style="text-align: center">หมายเลขการจอง</th>
            <th style="text-align: center">สถานะ</th>
            <th style="text-align: center">เวลา</th>
            <th style="text-align: center">ชั่วโมง</th>
            <th style="text-align: center">บริการ</th>
            <th style="text-align: center">ชื่อผู้จอง</th>
            <th style="text-align: center">การจัดการ</th>
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
        <tr><td colspan="7" style="text-align: center"><div style="display: inline-block;" class="loader"></div><p>ระบบจะทำการโหลดข้อมูลทุกๆ 10 วินาที</p></td>
    </tbody>
</table>
</div>
<br>

@endsection
@section('script')
<script>
        var intervalID = window.setInterval(myCallback, 10000);
        var count = {{$count}};
        function myCallback() {
            $.ajax({
                             url:"{{route('me.rit')}}",
                             method:'GET',
                             dataType:'json',
                             data:{allcount:count},
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
                $('#IT_list').addClass('active');
            });
        </script>
<script>
        function myFunction() {
          var x = document.getElementById("date").value;
          $.ajax({
             url:"{{route('me.it')}}",
             method:'GET',
             data:{query:x},
             dataType:'json',
             success:function(data)
             {
                $('#list_item').html(data.html_1);
             }
          })
        }
        </script>
@endsection
