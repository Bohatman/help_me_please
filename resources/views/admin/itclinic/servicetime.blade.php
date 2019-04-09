@extends('layouts.masteradmin')
@section('title', 'Service-type Management')
@section('pagetitle')
<h2>ระบบจัดการเวลาในการให้บริการ</h2>
<hr>
@endsection
@section('content')

<?php $usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");?>
<form method="POST" action="{{url('admin/itclinic/service')}}">
    {{csrf_field()}}
        <br />
        <div class="panel panel-default">
                <div class="panel-heading"><h5><strong>เพิ่มข้อมูล </strong> ระยะเวลา</h5></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 text-right">
                    <label for="timestart" >เวลาเริ่มต้น</label>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="timestart">ชั่วโมง :</label>
                            <select class="form-control" id="start_hour">
                                @for($i=0;$i<24;$i++)
                                    <?php
                                    $time = str_pad($i, 2, '0', STR_PAD_LEFT);
                                    ?>
                            <option value="{{$time}}">{{$time}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group" style="padding-left: 1%">
                                <label for="timestart">นาที :</label>
                                <select class="form-control" id="start_min">
                                    @for($i=0;$i<60;$i++)
                                        <?php
                                        $time = str_pad($i, 2, '0', STR_PAD_LEFT);
                                        ?>
                                <option value="{{$time}}">{{$time}}</option>
                                    @endfor
                                </select>
                            </div>
                    </div>

                    </div>

                    <div class="col-sm-6">
                            <label for="timestart">เวลาสิ้นสุด</label>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="timestart">ชั่วโมง :</label>
                                    <select class="form-control" id="end_hour">
                                        @for($i=0;$i<24;$i++)
                                            <?php
                                            $time = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            ?>
                                    <option value="{{$time}}">{{$time}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group" style="padding-left: 1%">
                                        <label for="timestart">นาที :</label>
                                        <select class="form-control" id="end_min">
                                            @for($i=0;$i<60;$i++)
                                                <?php
                                                $time = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                ?>
                                        <option value="{{$time}}">{{$time}}</option>
                                            @endfor
                                        </select>
                                    </div>
                            </div>
                            </div>
                    </div>
                    <div class="form-group text-center">
                        <br>
                    <button type="button" class="btn btn-success" onclick="addTime()">บันทึก</button>
                    </div>
                </div>
        </div>
    </form>
    <br>
<div hidden>
    <form id="time_server" method="POST" action="{{url('admin/itclinic/time')}}">
        @csrf
        <input type="hidden" value="" name="time_start" id="time_start">
        <input type="hidden" value="" name="time_end" id="time_end">
    </form>
</div>

<div class="panel panel-default">
        <div class="panel-heading">เวลาที่เปิดให้บริการ</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>เวลา</th>
                          <th>การจัดการ</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $index = 1;
                            ?>
                            @if(count($servicetime) > 0)
                          @foreach ($servicetime as $item)
                          <tr>
                          <td>{{$index++}}</td>
                          <td>{{$item->time_start." - ".$item->time_end}}</td>
                                <td>
                                        <form method="post" class="delete_form" action="{{action('ServiceTimeController@destroy',$item->available_id)}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                </td>
                              </tr>
                          @endforeach
                          @else
                          <tr><td colspan="3">ไม่พบข้อมูล</td></tr>
                          @endif
                      </tbody>
                    </table>

        </div>
      </div>

@endsection
@section('script')
<script>
    function addTime(){
        var start_hour = document.getElementById('start_hour').value;
        var start_min = document.getElementById('start_min').value;
        var end_hour = document.getElementById('end_hour').value;
        var end_min = document.getElementById('end_min').value;
        if(end_hour-start_hour < 0){
            alert('กรุณาเลือกเวลาให้ถูกต้อง');
        }else if(start_hour==end_hour){
            if(end_min-start_min <=0){
                alert('กรุณาเลือกเวลาให้ถูกต้อง');
            }else{
                //addFunction
                document.getElementById('time_start').setAttribute('value',start_hour.toString()+":"+start_min.toString()+":00");
                document.getElementById('time_end').setAttribute('value',end_hour.toString()+":"+end_min.toString()+":00");
                document.getElementById('time_server').submit();

            }
        }else{
            //addFunction
            document.getElementById('time_start').setAttribute('value',start_hour.toString()+":"+start_min.toString()+":00");
            document.getElementById('time_end').setAttribute('value',end_hour.toString()+":"+end_min.toString()+":00");
            document.getElementById('time_server').submit();
        }
    }
</script>
<script>
        $(window).ready(function(){
            $('#controll_l').addClass('active');
            $('#servicetime_l').addClass('active');
        });
</script>
@endsection
