@extends('layouts.masteradmin')
@section('title', 'Position Management')
@section('pagetitle')
<h2>ระบบจัดการตำแหน่งงาน</h2>
<hr>
@endsection
@section('content')
<form method="POST" action="{{url('admin/position')}}" autocomplete="off">
    {{csrf_field()}}
    @if(count($position)>0)
<div class="just-padding">
    @foreach ($position as $row)
    <div class="list-group list-group-root well">
    <a href='#item-{{$row->category_id}}' class="list-group-item" onclick="showBut({{$row->category_id}})">
    <i class="glyphicon glyphicon-th-list text-align: left"><b> {{$row->category_name}}</b></i>
        </a>
    <?php
        $len = count($row->getPosition);
        ?>
    @if($len > 0)
    <div class="list-group collapse" id="item-{{$row->category_id}}">
    @foreach ($row->getPosition as $item)

                <i class="list-group-item">{{$item->position_name." (".$item->priority_level.')'}}</i>

    @endforeach

        <i class="list-group-item">+ <input type="text" name="position_name[]"><input type="hidden" name ="category[]" value="{{$row->category_id}}" ></i>

    </div>
    @else
        <div class="list-group collapse" id="item-{{$row->category_id}}">

        <i class="list-group-item">+ <input type="text" name="position_name[]"><input type="hidden" name ="category[]" value="{{$row->category_id}}"></i>

        </div>
    @endif
    <button style="margin-right: 1%;" id="edit-{{$row->category_id}}" type="button" class="btn pull-right hidden" onclick="editData({{$row->category_id}})">แก้ไข</button>
    <button style="margin-right: 1%;" id="butt-{{$row->category_id}}" type="button" class="btn pull-right hidden" onclick="addBut({{$row->category_id}},{{$row->category_id}})">เพิ่มแถว</button>
    </div>
@endforeach
</div>
<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
@else
<p>ไม่พบข้อมูล กรุณาเพิ่มหัวข้อ</p>
@endif
</form>
@endsection

@section('script')
<script>
$(window).ready(function(){
        $('#controll_l').addClass('active');
        $('#position_l').addClass('active');
    });
</script>
<script>
        function addBut(item,id) {
            var x = document.createElement("i");
            x.setAttribute("class", "list-group-item");
            var t = document.createTextNode("+ ");
            var y = document.createElement("input");
            y.setAttribute("type", "text");
            y.setAttribute("name", "position_name[]");
            var z = document.createElement("input");
            z.setAttribute("type", "hidden");
            z.setAttribute("name", "category[]");
            z.setAttribute("value", ""+id);
            x.appendChild(t);
            x.appendChild(y);
            x.appendChild(z);
            document.getElementById("item-"+item).appendChild(x);
        }
        function showBut(item) {
            $("#item-"+item).toggle(300);
            document.getElementById("butt-"+item).classList.toggle('hidden');
            document.getElementById("edit-"+item).classList.toggle('hidden');
        }

        function editData(id){
            window.location="/position/edit/"+id;
        }
    </script>
@endsection
