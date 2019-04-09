@extends('layouts.masteradmin')
@section('content')
<?php
// 1 = จอง ,2 = done, 3=ยกเลิก
$status = array('','จองเวลาเรียบร้อย','เสร็จสิ้น','ยกเลิก');
$colorstatus = array('','label label-primary','label label-success','label label-danger');
?>
<div class="card">
        <h3>รายละเอียดการจอง</h3>
        <span class=" {{$colorstatus[$book->status]}}">{{$status[$book->status]}}</span>
        <div class="card-body">
            <table class="table">
                <thead>
                        <tr>
                          <th>หัวข้อ</th>
                          <th>รายละเอียด</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td>Book ID</td>
                                <td>{{$book->book_id}}</td>
                            </tr>
                            <tr>
                                <td>บริการ</td>
                                <td>{{$book->getType->servicetype_name.' ('.$book->getType->servicetype_price.'บาท)'}}</td>
                            </tr>
                            <tr>
                                    <td>วันที่</td>
                                    <td>{{$book->date}}</td>
                                </tr>
                            <tr>
                                <td>เวลา</td>
                                <td>{{$book->getTime->time_start.' - '.$book->getTime->time_end}}</td>
                            </tr>
                            <tr>
                                <td>รายละเอียด</td>
                                @if(is_null($book->detail))
                                <td>ผู้ใช้ไม่ได้กรอกข้อมูล</td>
                                @else
                                <td>{{$book->detail}}</td>
                                @endif
                            </tr>
                    </tbody>
            </table>
            <br>

            <div style="text-align: center">
            <a href="{{url('admin/itpanel/'.$book->book_id.'/edit')}}"><button type ="button" class="btn btn-success">ออกใบเสร็จ</button></a>
                    <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
                    </div>
        </div>
      </div>

@endsection
