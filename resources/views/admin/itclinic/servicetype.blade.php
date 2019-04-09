@extends('layouts.masteradmin')
@section('title', 'Service-type Management')
@section('pagetitle')
<h2>ระบบจัดการอัตราค่าบริการ</h2>
<hr>
@endsection
@section('content')
<?php $usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");?>
<form method="POST" action="{{url('admin/itclinic/service')}}">
    {{csrf_field()}}
        <br />
        <div class="panel panel-default">
                <div class="panel-body">
                <div class="form-group">
                        <label for="sname">Service name:</label>
                        <input type="text" class="form-control" id="sname" name="servicetype_name" required>
                </div>

                <div class="form-group">
                        <label for="usertype"><b>ผู้มีสิทธิใช้งาน: </b></label>
                            <label class="radio-inline" for="radio1">
                                <input type="radio" class="form-check-input" id="student" name="usertype" value="1" checked>นักศึกษา
                           </label>
                            <label class="radio-inline" for="radio2">
                            <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
                            </label>
                    </div>
                    <div class="form-group">
                            <label for="servicetype_price">อัตราค่าบริการ(บาท):</label>
                            <input type="number" class="form-control" placeholder="อัตราค่าบริการ" name="servicetype_price" required>
                          </div>
                          <button type="submit" class="btn btn-primary pull-right">บันทึก</button>



                </div>
        </div>
    </form>
    <br>
    <table class="table">
            <thead>
              <tr>
                <th style="text-align: center;width: 15%">Service ID</th>
                <th style="text-align: center;width: 20%">Service's rule</th>
                <th style="text-align: center;width: 20%">Service Name</th>
                <th style="text-align: center;width: 15%">Service Price</th>
                <th style="text-align: center;width: 30%">Handle</th>
              </tr>
            </thead>
            <tbody>
                @if(count($servicetype)>0)
                    @foreach ($servicetype as $item)
                    <tr>
                    <td style="text-align: center">{{$item->servicetype_id}}</td>
                    <td style="text-align: center">{{$usertype[$item->usertype]}}</td>
                    <td style="text-align: center">{{$item->servicetype_name}}</td>
                    <td style="text-align: right">{{$item->servicetype_price." บาท"}}</td>
                    <td style="text-align: center;">


                        <form method="post" class="delete_form" action="{{action('ServiceTypeController@destroy',$item->servicetype_id)}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />

                                <a href="{{url('servicetype/edit/'.$item->servicetype_id)}}" ><button type="button" class="btn btn-warning">แก้ไข</button></a>
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">ลบ</button>

                    </form>
                    </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
@endsection
@section('script')
<script>
        $(window).ready(function(){
            $('#controll_l').addClass('active');
            $('#servicetype_l').addClass('active');
        });
</script>
@endsection
