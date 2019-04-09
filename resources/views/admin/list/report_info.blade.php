@extends('layouts.masteradmin')
@section('title', 'Result Detail')
@section('pagetitle')
<h2>รายละเอียดการร้องเรียน</h2>
<hr>
@endsection
@section('content')

<ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#home">ผู้ร้องเรียน</a></li>
        <li><a data-toggle="tab" href="#menu1">ผู้รับผิดชอบ</a></li>
        <li><a data-toggle="tab" href="#menu2">ผู้ส่งมอบงาน</a></li>
</ul>
<div class="tab-content">
        <div id="home" class="tab-pane fade in active" style="color: black">
                <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left media-top">
                                    @if($complaint->usertype == 3 || $complaint->getUser->picture == -1)
                                    <img src="{{asset('img/noimage.jpg')}}" class="media-object" style="width:100px;height:110px">
                                    @else
                                    <img src="{{url($complaint->getUser->picture)}}" class="media-object" style="width:100px;height:110px">
                                    @endif
                                </div>
                                <div class="media-body">
                                <h5 class="media-heading"><strong>ผู้ร้องเรียน: </strong>
                                    @if($complaint->usertype == 3)
                                    <span class="label label-default">บุคคลภายนอก</span>
                                    {{$complaint->getGuest->fname." ".$complaint->getGuest->lname}}</h5>
                                    @else
                                    @if($complaint->usertype == 0)
                                    <span class="label label-primary">ผู้ดูแลระบบ</span>

                                    @elseif($complaint->usertype == 1)
                                    <span class="label label-success">นักศึกษา</span>

                                    @elseif($complaint->usertype == 2)
                                    <span class="label label-info">บุคลากร</span>

                                    @else
                                    <strong>เกิดข้อผิดพลาดจากระบบ</strong>
                                    @endif
                                    {{$complaint->getUser->fname." ".$complaint->getUser->lname}}</h5>
                                    @endif
                                <h5><strong>วันที่รับเรื่อง: </strong>{{$complaint->created_at}}</h5>

                                <h5 class="media-heading"><strong>อีเมล์: </strong>
                                    @if($complaint->usertype == 3)
                                        {{$complaint->getGuest->email}}
                                    @else
                                    {{$complaint->getUser->email}}
                                    @endif
                                </h5>

                                <h5 class="media-heading"><strong>เบอร์โทรศัพท์: </strong>
                                    @if($complaint->usertype == 3)
                                        -
                                    @else
                                    @if($complaint->getUser->phone != -1)
                                    {{$complaint->getUser->phone}}
                                    @else
                                    -
                                    @endif
                                    @endif
                                </h5>

                                </div>
                              </div>
                        </div>
                      </div>
        </div>

        <div id="menu1" class="tab-pane fade" style="color: black">
          @if($complaint->PIC_ID == -1)
          <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left media-top">
                            <img src="{{asset('img/noimage.jpg')}}" class="media-object" style="width:100px;height:110px">
                        </div>
                        <div class="media-body">
                        <h5 class="media-heading"><strong>ผู้รับผิดชอบ: </strong>
                            <span class="label label-default">ไม่มีผู้รับผิดชอบ</span></h5>
                        </div>
                      </div>
                </div>
              </div>
              @else
              <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-top">
                                @if($complaint->usertype == 3 || $complaint->getPIC->picture == -1)
                                <img src="{{asset('img/noimage.jpg')}}" class="media-object" style="width:100px;height:110px">
                                @else
                                <img src="{{url($complaint->getPIC->picture)}}" class="media-object" style="width:100px;height:110px">
                                @endif
                            </div>
                            <div class="media-body">
                            <h5 class="media-heading"><strong>ผู้รับผิดชอบ: </strong>
                                @if($complaint->getPIC->usertype == 3)
                                <span class="label label-default">บุคคลภายนอก</span>
                                {{$complaint->getGuest->fname." ".$complaint->getGuest->lname}}</h5>
                                @else
                                @if($complaint->getPIC->usertype == 0)
                                <span class="label label-primary">ผู้ดูแลระบบ</span>

                                @elseif($complaint->getPIC->usertype == 1)
                                <span class="label label-success">นักศึกษา</span>

                                @elseif($complaint->getPIC->usertype == 2)
                                <span class="label label-info">บุคลากร</span>

                                @else
                                <strong>เกิดข้อผิดพลาดจากระบบ</strong>
                                @endif
                                {{$complaint->getPIC->fname." ".$complaint->getPIC->lname}}</h5>
                                @endif
                            <h5><strong>อัพเดทล่าสุด: </strong>{{$complaint->updated_at}}</h5>

                            <h5 class="media-heading"><strong>อีเมล์: </strong>
                                @if($complaint->usertype == 3)
                                    {{$complaint->getGuest->email}}
                                @else
                                {{$complaint->getPIC->email}}
                                @endif
                            </h5>

                            <h5 class="media-heading"><strong>เบอร์โทรศัพท์: </strong>
                                @if($complaint->usertype == 3)
                                    -
                                @else
                                @if($complaint->getUser->phone != -1)
                                {{$complaint->getPIC->phone}}
                                @else
                                -
                                @endif
                                @endif
                            </h5>

                            </div>
                          </div>
                    </div>
                  </div>
          @endif
        </div>

        <div id="menu2" class="tab-pane fade" style="color: black">
                @if($complaint->PIC_ID == -1)
                <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="media">
                              <div class="media-left media-top">
                                  <img src="{{asset('img/noimage.jpg')}}" class="media-object" style="width:100px;height:110px">
                              </div>
                              <div class="media-body">
                              <h5 class="media-heading"><strong>ผู้รับผิดชอบ: </strong>
                                  <span class="label label-default">ไม่มีผู้รับผิดชอบ</span></h5>
                              </div>
                            </div>
                      </div>
                    </div>
                    @else
                    <div class="panel panel-default">
                          <div class="panel-body">
                              <div class="media">
                                  <div class="media-left media-top">
                                      @if($complaint->usertype == 3 || $complaint->getRH->picture == -1)
                                      <img src="{{asset('img/noimage.jpg')}}" class="media-object" style="width:100px;height:110px">
                                      @else
                                      <img src="{{url($complaint->getRH->picture)}}" class="media-object" style="width:100px;height:110px">
                                      @endif
                                  </div>
                                  <div class="media-body">
                                  <h5 class="media-heading"><strong>ผู้ส่งมอบงาน: </strong>
                                      @if($complaint->getRH->usertype == 3)
                                      <span class="label label-default">บุคคลภายนอก</span>
                                      {{$complaint->getGuest->fname." ".$complaint->getGuest->lname}}</h5>
                                      @else
                                      @if($complaint->getRH->usertype == 0)
                                      <span class="label label-primary">ผู้ดูแลระบบ</span>

                                      @elseif($complaint->getRH->usertype == 1)
                                      <span class="label label-success">นักศึกษา</span>

                                      @elseif($complaint->getRH->usertype == 2)
                                      <span class="label label-info">บุคลากร</span>

                                      @else
                                      <strong>เกิดข้อผิดพลาดจากระบบ</strong>
                                      @endif
                                      {{$complaint->getRH->fname." ".$complaint->getRH->lname}}</h5>
                                      @endif
                                  <h5><strong>อัพเดทล่าสุด: </strong>{{$complaint->updated_at}}</h5>

                                  <h5 class="media-heading"><strong>อีเมล์: </strong>
                                      @if($complaint->usertype == 3)
                                          {{$complaint->getGuest->email}}
                                      @else
                                      {{$complaint->getRH->email}}
                                      @endif
                                  </h5>

                                  <h5 class="media-heading"><strong>เบอร์โทรศัพท์: </strong>
                                      @if($complaint->usertype == 3)
                                          -
                                      @else
                                      @if($complaint->getUser->phone != -1)
                                      {{$complaint->getRH->phone}}
                                      @else
                                      -
                                      @endif
                                      @endif
                                  </h5>

                                  </div>
                                </div>
                          </div>
                        </div>
                @endif
              </div>

      </div>


<table class="table table-borderless ">
        <thead>
                <tr>
                  <th>หัวข้อ</th>
                  <th>รายละเอียด</th>
                </tr>
              </thead>
        <tbody>
                @if($complaint->status == 3)
                <tr class ="success">
                    @elseif($complaint->status == 4)
                    <tr class ="danger">
                  @endif
                      <td>
                          ผลการดำเนินการ :
                      </td>
                      <td>
                          {{$complaint->getReport->report}}
                      </td>
                  </tr>
          <tr>
                  <td>
                      หมายเลขร้องเรียนที่ :
                  </td>
                  <td>
                      {{$complaint->issues_id}}
                  </td>
          </tr>
          <tr>
                  <td>
                      หมายเลขร้องเรียนที่ :
                  </td>
                  <td>
                      {{$complaint->issues_id}}
                  </td>
          </tr>

          <tr>
              <td>
                  Campus :
              </td>
              <td>
                  {{$complaint->getList->getCampus->campus_name}}
              </td>
          </tr>
          <tr>
               <td>
                   Category :
                  </td>
               <td>
                      {{$complaint->getList->getCategory->category_name}}
               </td>
          </tr>
          <tr>
               <td>
                   Sub Category :
              </td>
              <td>
                      @if(!is_null($complaint->getList->getSubCategory))
                      {{$complaint->getList->getSubCategory->sub_category_name}}
                      @else
                      ไม่มีหัวข้อย่อย
                      @endif
              </td>
          </tr>
          <tr>
              <td>
                  Detail :
              </td>
              <td>
                      {{$complaint->getList->detail}}
              </td>
          </tr>
          <tr>
              <td>
                  Building :
              </td>
              <td>
                      @if($complaint->getList->building == -1)
                      ผู้ใช้ไม่ได้กรอก (-1)

                  @else
                      {{$complaint->getList->building}}

                  @endif
              </td>
          </tr>
          <tr>
              <td>
                  Room :
              </td>
              <td>
                      @if($complaint->getList->room == -1)
                      ผู้ใช้ไม่ได้กรอก (-1)

                  @else
                      {{$complaint->getList->room}}

                  @endif
              </td>
          </tr>
          <tr>
               <td>
                   Image:
              </td>
              <td>
                      @if($complaint->getList->picture == -1)
                      <img src="{{asset('img/noimage.jpg')}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                      @else
                  <img src="{{url($complaint->getList->picture)}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                      @endif
              </td>
          </tr>
        </tbody>
      </table>
      <div style="text-align: center">
      <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
      </div>
@endsection
@section('script')
<script>
$(window).ready(function(){
    $('#listGroup_l').addClass('active');
    $('#list_l').addClass('active');
});
</script>
@endsection
