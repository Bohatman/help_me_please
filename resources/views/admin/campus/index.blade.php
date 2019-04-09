@extends('layouts.masteradmin')
@section('title', 'Campus Management')
@section('pagetitle')
<h2>ระบบจัดการวิทยาเขต</h2>
<hr>
@endsection
@section('content')
<form method="POST" action="" class="form-inline">
        {{csrf_field()}}
<span class="input-group-text">Campus Name</span>
<input type="text" name="campus_name" class="form-control" required>
<button type="submit" class="btn btn-primary">เพิ่มวิทยาเขต</button>
</form>
<hr>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Campus Name</th>
        <th>การจัดการ</th>
      </tr>
    </thead>
    <tbody>
    @if(count($campus)>0)
        @foreach ($campus as $row)
            <tr>
            <td>{{$row->campus_name}}</td>
            <td>
                    <button style="margin-right: 1%;" id="remove-{{$row->campus_id}}" type="button" class="btn pull-right" onclick="delData({{$row->campus_id}})">ลบ</button>
                    <button style="margin-right: 1%;" id="edit-{{$row->campus_id}}" type="button" class="btn pull-right" onclick='editCampus({{$row->campus_id}},"{{$row->campus_name}}")'>แก้ไข</button>
            </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td colspan="2">ไม่พบข้อมูล<td>
        </tr>
        @endif
    </tbody>
  </table>
@endsection
@section('script')
<script>
        $(window).ready(function(){

            $('#controll_l').addClass('active');
            $('#campus_l').addClass('active');
        });
</script>
<script>
        function editCampus(id,name) {
            var txt;
            var campus = prompt("Please edit your campus name:", name);
            if (campus == null || campus == "" || campus == name) {
                 alert('การกระทำไม่สำเร็จ');
            } else {
                $.ajax({
             url:"{{route('campus.edit')}}",
             method:'GET',
             contentType: "application/x-www-form-urlencoded;charset=utf-8",
             data:{campus_id:id,campus_name:campus},
             dataType:'json',
             success:function(data)
             {
                alert(data.html_1);
                window.location.reload();
             }
            })
            }
        }
        function delData(id){
        var result = confirm("การที่สามารถลบวิทยาเขตจำเป็นต้องทำการลบ เรื่องร้องเรียนที่เกี่ยวข้องทั้งหมดจึงจะสามารถทำการลบได้");
        if(result)
        {
            $.ajax({
             url:"{{route('campus.del')}}",
             method:'GET',
             data:{query:id},
             dataType:'json',
             success:function(data)
             {
                alert(data.html_1);
                window.location.reload();
             }
            })
        }
    }
</script>
@endsection
