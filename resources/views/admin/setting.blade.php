@extends('layouts.masteradmin')
@section('title', 'System Configuration')

@section('content')
<h2 class="text-primary">ตั้งค่า</h2>
<hr>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-heading">หัวข้อการร้องเรียน <a href="{{url('/admin/category')}}"><button type="button" class="btn btn-warning btn-xs pull-right">แก้ไข</button></a></div>
            <div class="panel-body">
            <p>มีจำนวนหาข้อทั้งหมด {{count($category)}} หัวข้อ</p>
                @if(count($category) > 0)
                <ul>
                    @foreach($category as $item)
                <li class="text-{{$item->category_color}}">{{$item->category_name}}
                        @if(count($item->getSubCategory) > 0 )
                        <ul>
                            @foreach ($item->getSubCategory as $row)
                                <li>{{$row->sub_category_name}}</li>
                            @endforeach
                        </ul>
                        @endif
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading">ตำแหน่งผู้รับผิดชอบ<a href="{{url('/admin/position')}}"><button type="button" class="btn btn-warning btn-xs pull-right">แก้ไข</button></a></div>
            <div class="panel-body">
                    <p>มีจำนวนฝายที่รับผิดชอบทั้งหมด {{count($category)}} หัวข้อ</p>
                    @if(count($category) > 0)
                    <ul>
                        @foreach($category as $item)
                    <li class="text-{{$item->category_color}}">{{$item->category_name}}
                            @if(count($item->getPosition) > 0 )
                            <ul>
                                @foreach ($item->getPosition as $row)
                                    <li>{{$row->position_name}}{{($row->priority_level == 1) ? " (หัวหน้าฝ่าย)": " (พนักงาน)"}}</li>
                                @endforeach
                            </ul>
                            @endif
                            </li>
                        @endforeach
                    </ul>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-warning">
            <div class="panel-heading">จัดการบัญชีผู้ใช้<a href="{{url('/admin/user')}}"><button type="button" class="btn btn-warning btn-xs pull-right">แก้ไข</button></a></div>
            <div class="panel-body">
                <div class="row">
                <div class="col-sm-4"><p style="text-align: center">นักศึกษา <span class="badge">{{$student}}</span></p></div>
                <div class="col-sm-4"><p style="text-align: center">บุคลากร <span class="badge">{{$staff}}</span></div>
                <div class="col-sm-4"><p style="text-align: center">อื่นๆ <span class="badge">{{$guest}}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">

</div>
@endsection
@section('script')
<script>
$(window).ready(function(){

    $('#controll_l').addClass('active');
    $('#setting_l').addClass('active');
});
</script>
@endsection
