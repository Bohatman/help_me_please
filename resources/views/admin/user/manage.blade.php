@extends('layouts.masteradmin')
@section('title', 'edit-position Management')

@section('content')
<?php
$usertype = array('ผู้ดูแลระบบ','นักศึกษา','บุคคลากร');
?>
<h2>รายชื่อผู้ใช้</h2>
<hr>
<table class="table">
        <thead>
          <tr>
            <th>UID</th>
            <th>Usertype</th>
            <th>Position</th>
            <th>Name</th>
            <th>email</th>
            <th>การจัดการ</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            @if(count($user)>0)
                @foreach ($user as $row)
                    <td>{{$row->UID}}</td>
                    <td>{{$usertype[$row->usertype]}}</td>
                    @if($row->position_id == -1)
                    <td>ผู้ใช้ทั่วไป</td>
                    @else
                    <td>{{$row->getPosition->position_name."(".$row->getPosition->getCategory->category_name.")"}}</td>
                    @endif
                    <td>{{$row->fname." ".$row->lname}}</td>
                        <td>{{$row->email}} {{(is_null($row->email_verified_at)) ? "(ยังไม่ได้ยืนยัน)":"(ยืนยันแล้ว)"}}</td>
                    @if($row->usertype == 0)
                    <td><div class="btn-group">
                            <button id="edit-{{$row->UID}}" type="button" class="btn btn-warning" onclick="editUser({{$row->UID}})">แก้ไข</button>
                            <button type="button" class="btn btn-dark" disabled>ลบ</button>
                        </div></td>
                    @else
                    <td><div class="btn-group">
                        <button id="edit-{{$row->UID}}" type="button" class="btn btn-warning" onclick="editUser({{$row->UID}})">แก้ไข</button>
                        <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">ลบ</button>
                    </div></td>
                    @endif
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div style="text-align: center"> {{$user->links() }}</div>
    <br>
    <h2>รายชื่อบุคคลภายนอก</h2>
    <hr>
    <table class="table table-striped">
            <thead>
              <tr>
                <th>Guest ID</th>
                <th>Name</th>
                <th>email</th>
                <th>การจัดการ</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                @if(count($guest)>0)
                    @foreach ($guest as $row)
                        <td>{{$row->guest_id}}</td>
                        <td>{{$row->fname." ".$row->lname}}</td>
                        <td>{{$row->email}}</td>
                        <td>
                                <form method="post" class="delete_form" action="{{route('user.destroy',$row->guest_id)}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">ลบ</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div style="text-align: center"> {{$guest->links() }}</div>
@endsection

@section('script')
<script>
    $(window).ready(function(){
$('#controll_l').addClass('active');
$('#user_l').addClass('active');
});
        function editUser(id){
            window.location="/user/edit/"+id;
        }
    </script>
@endsection
