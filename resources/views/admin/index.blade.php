@extends('layouts.masteradmin')
@section('title', 'Admin Panel')

@section('content')
<div class="row">
    <div class="col-sm-4">
            <div class="panel panel-primary">
                    <div class="panel-heading"><strong>เรื่องร้องเรียน</strong></div>
                    <div class="panel-body">
                            <i class="material-icons">
                                    note_add
                                    </i><strong>อยู่ระหว่างรอรับเรื่อง:</strong> 15 เรื่อง</p>
                       <p> <i class="material-icons">
                            insert_drive_file
                            </i><strong>รับเรื่องแล้ว:</strong> 15 เรื่อง</p>
                       <p> <i class="material-icons">
                            work
                            </i><strong>กำลังดำเนินการ:</strong> 32 เรื่อง</p>
                       <p> <i class="material-icons">
                            done
                            </i><strong>เสร็จสิ้น:</strong> 32 เรื่อง</p>
                       <p> <i class="material-icons">
                            cancel
                            </i><strong>ยกเลิก:</strong> 32 เรื่อง</p>

                    </div>
                  </div>
    </div>
    <div class="col-sm-4">
            <div class="panel panel-success">
                    <div class="panel-heading"><strong> สมาชิก </strong></div>
                    <div class="panel-body">
                       <p> <i class="material-icons">
                            school
                            </i><strong>นักศึกษา:</strong> 12 คน</p>
                       <p><i class="material-icons">
                            business_center
                            </i> <strong>บุคลากร:</strong> 32 คน</p>
                       <p><i class="material-icons">
                            public
                            </i> <strong>บุคคลภายนอก:</strong> 32 คน</p>
                            <p> <i class="material-icons">
                                    person
                                    </i><strong>รวม:</strong> 76 คน</p>
                  </div>
    </div>
    </div>
    <?php
        $user = Auth::user();
        if($user->position_id != -1){

            $position = App\position::with('getCategory')->where('position_id','=',$user->position_id)->first();
            $position_name = $position->position_name;
            $getCategory = $position->getCategory->category_name;
        }else{
            $position_name = "-";
            $getCategory = "-";
        }
    ?>
    <div class="col-sm-4">
            <div class="panel panel-info">
                    <div class="panel-heading">ข้อมูลของคุณ</div>
                    <div class="panel-body">
                    <p><strong>ชื่อ:</strong> {{$user->fname." ".$user->lname}}</p>
                    <p><strong>อีเมล์:</strong> {{$user->email}}</p>
                    @if($user->phone == -1)
                    <p><strong>เบอร์โทร:</strong> -</p>
                    @else
                    <p><strong>เบอร์โทร:</strong> {{$user->phone}}</p>
                    @endif
                    <p><strong>ตำแหน่ง:</strong> {{$position_name}}</p>
                    <p><strong>ฝ่ายที่รับผิดชอบ:</strong> {{$getCategory}}</p>
                    </div>
                  </div>
    </div>
</div>
<hr>
@endsection
@section('script')
<script>
$(window).ready(function(){

$('#index_l').addClass('active');
});
</script>
@endsection
