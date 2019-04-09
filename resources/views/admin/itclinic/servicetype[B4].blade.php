@extends('layouts.masteradmin')
@section('title', 'Service-type Management')
@section('content')
<form method="POST" action="{{url('admin/itclinic/service')}}">
    {{csrf_field()}}
        <br />
            <div class="card">
                    <div class="card-body">
            <div class="form-group">
                    <label for="sname">Service name:</label>
                    <input type="text" class="form-control" id="sname" name="servicetype_name" required>
                  </div>
                      <div class="form-group">
                            <label for="usertype"><b>ผู้มีสิทธิใช้งาน: </b></label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="student" name="usertype" value="1" checked>นักศึกษา
                               </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="radio2">
                                <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="อัตราค่าบริการ" name="servicetype_price" required>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">บาท</span>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary float-right">บันทึก</button>
                    </div>
            </div>
    </form>
    <br>
    <table class="table">
            <thead>
              <tr>
                <th style="text-align: center;width: 15%">Service ID</th>
                <th style="text-align: center;width: 30%">Service Name</th>
                <th style="text-align: center;width: 20%">Service Price</th>
                <th style="text-align: center;width: 35%">Handle</th>
              </tr>
            </thead>
            <tbody>
                @if(count($servicetype)>0)
                    @foreach ($servicetype as $item)
                    <tr>
                    <td style="text-align: center">{{$item->servicetype_id}}</td>
                    <td style="text-align: center">{{$item->servicetype_name}}</td>
                    <td style="text-align: right">{{$item->servicetype_price." บาท"}}</td>
                    <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">แก้ไข</button>
                        <form method="post" class="delete_form" action="{{action('ServiceTypeController@destroy',$item->servicetype_id)}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">ลบ</button>
                    </form>
                            </div>
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
