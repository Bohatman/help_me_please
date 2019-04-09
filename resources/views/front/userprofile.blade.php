@extends('layouts.new')
@section('title', 'Student page')
@section('content')
<div class="card">
        <div class="card-header">
          จัดการโปรไฟล์
</div>
<div class="card-body">

<div class="row">

<div class="col-3" style="padding-left: 5%">
    @if($user->picture == -1)
        <img src="{{asset('img/noimage.jpg')}}" class="img-thumbnail" width="200" height="200">
    @else
        <img src="{{url($user->picture)}}" class="img-thumbnail" width="200" height="200">
    @endif
</div>
<div class="col-9">

        <div class="card">
                <div class="card-body">

    <div class="row">
        <div class="col-2">
        รหัสสมาชิก:
        </div>
        <div class="col-2" style="background-color: whitesmoke;text-align: center">
            {{$user->UID}}
        </div>
        <div class="col-2">
                การยืนยันอีเมล์:
        </div>
        <div class="col-2">
                @if(is_null($user->email_verified_at))
        <a href="{{url('email/verify')}}"><span class="badge badge-danger">ยังไม่ได้ยืนยัน</span></a>
                @else
                <span class="badge badge-success">ยืนยันแล้ว</span>
                @endif
        </div>
        <div class="col-2">
                ประเภทสมาชิก:
        </div>
        <div class="col-2">
            @if($user->usertype == 0)
                <span class="badge badge-primary">ผู้ดูแลระบบ</span>
            @elseif($user->usertype == 1)
                <span class="badge badge-success">นักศึกษา</span>
            @elseif($user->usertype == 2)
                <span class="badge badge-info">บุคลากร</span>
            @else
                <strong>เกิดข้อผิดพลาดจากระบบ</strong>
            @endif

        </div>
    </div>

    <div class="row" style="padding-top: 2%">
            <div class="col-1">
                    ชื่อ:
            </div>
            <div class="col-5" style="background-color: whitesmoke;text-align: center">
                    {{$user->fname." ".$user->lname}}
            </div>
            <div class="col-2">
                    เบอร์ติดต่อ:
            </div>
            <div class="col-4" style="background-color: whitesmoke;text-align: center">
                    {{$user->phone}}
            </div>
        </div>

    <div class="row" style="padding-top: 2%">
            <div class="col-2">
                    Email:
            </div>
            <div class="col-4" style="background-color: whitesmoke;text-align: center">
                    {{$user->email}}
            </div>
            <div class="col-2">
                    วันที่สมัคร:
            </div>
            <div class="col-4" style="background-color: whitesmoke;text-align: center">
                    {{$user->created_at}}
            </div>
    </div>
    </div>
</div>

@if($user->position_id != -1)
<div style="padding-top: 1%">
<div class="card">
        <div class="card-body">
                <div class="row">
                        <div class="col-2">
                                ตำแหน่ง:
                        </div>
                        <div class="col-4">
                            {{$user->getPosition->position_name}}
                        </div>
                </div>
        </div>
</div>
</div>
@endif

</div>
</div>


</div>
</div>
<br>

<div class="card">
        <div class="card-header">
                รายการใช้บริการ
        </div>
        <div class="card-body">
                <div class="row">
                <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">รายการปัญหา</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">IT Clinic</a>
                      </div>
                    </div>
                    <div class="col-10">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                                <table class="table">
                                        <thead>
                                          <tr>
                                            <th>หมายเลขการร้องเรียน</th>
                                            <th>หัวข้อที่ร้องเรียน</th>
                                            <th>สถานะปัจจุบัน</th>
                                            <th>รายละเอียด</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                                <?php $usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
                                                $status = array( "ยังไม่รับเรื่อง", "รับเรื่องแล้ว","กำลังดำเนินการ", "เสร็จสิ้น","ยกเลิก");
                                                $color = array( "secondary", "info",'warning', "success","danger"); ?>
                                            @foreach ($complaint as $item)
                                            <tr>
                                                    <td>{{$item->issues_id}}</td>
                                                    <td>{{$item->getList->getCategory->category_name}}</td>
                                                    <td><span style="display: inline-block;" class="badge badge-{{$color[$item->status]}}">{{$status[$item->status]}}</span></td>
                                                    <td>

                                                        <div class="btn-group" role="group">
                                                                <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    การจัดการ
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <a class="dropdown-item" href="{{url('search/'.$item->issues_id)}}">รายละเอียด</a>
                                                                <a class="dropdown-item" href="{{url('issues/update/'.$item->issues_id)}}">แก้ไขรายละเอียด</a>
                                                                </div>
                                                              </div>
                                                    </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">หมายเลขการจอง</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">วันที่</th>
                                            <th scope="col">เวลา</th>
                                            <th scope="col">การจัดการ</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                // 1 = จอง ,2 = done, 3=ยกเลิก
                                                $status = array('','จองเวลาเรียบร้อย','เสร็จสิ้น','ยกเลิก');
                                                $colorstatus = array('','badge badge-primary','badge badge-success','badge badge-danger');
                                                ?>
                                            @foreach ($book as $item)
                                            <tr class="{{(($item->status != 2 && (strtotime($item->getTime->time_start)-strtotime(date('h:i:s')) < 0) && $item->date == date('Y-m-d') ) ? 'table-danger':'')}}">
                                                    <td style="text-align: center">
                                                        {{$item->book_id}}
                                                    </td>
                                                    <td>
                                                            <span class="{{$colorstatus[$item->status]}}">{{$status[$item->status]}}</span>
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{$item->date}}
                                                    </td>
                                                <td style="text-align: center">
                                                        {{$item->getTime->time_start.' - '.$item->getTime->time_end}}
                                                    </td>
                                                    <td style="text-align: center">

                                                            <div class="btn-group" role="group">
                                                                    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        การจัดการ
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                    <a class="dropdown-item" href="{{url('book/'.$item->book_id)}}">รายละเอียด</a>
                                                                    <a class="dropdown-item" href="{{url('book/update/'.$item->book_id)}}">แก้ไขเวลาจอง</a>
                                                                    <a class="dropdown-item" href="{{url('book/'.$item->book_id.'/edit')}}">ยกเลิก</a>
                                                                    </div>
                                                                  </div>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>


                        </div>
                      </div>
                    </div>
                </div>

        </div>
</div>


<br>


@endsection

@section('script')

@endsection
