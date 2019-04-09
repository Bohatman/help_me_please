@extends('layouts.masteradmin')
@section('title', 'edit-position Management')

@section('content')
@if(count($position) > 0)
<form method="post" class="form-group" action="{{url('/edit/position')}}">
    {{ csrf_field() }}
    <div class="form-group">
            <h4><b>Category</b></h4>
            <hr />
            <label for="position_id">Position Group</label>
    <input type="hidden" name ="category_id" value="{{$category_id}}">
    <input type="text" class="form-control" id="position_id" name="category_name" value="{{$category_name}}" readonly>
    </div>
    <br>
        <h4><b>Position</b></h4>
<hr />
        @foreach ($position as $item)
        <div class="form-group">
        <label for="position_id">Position Name ({{$item->position_id}}): {{$item->position_name}}</label>
                <select class="form-control" id="priority_id_{{$item->position_id}}" name="priority_level[]">
                    <option value='1'>ระดับหัวหน้า</option>
                    <option value='2'>ระดับผู้ปฎิบัติ</option>
                </select>
                <script> $("#priority_id_{{$item->position_id}}").val("{{$item->priority_level}}"); </script>
            <input type="hidden" name="position_id[]" value="{{$item->position_id}}">
        </div>
        @endforeach
        <div class="float-right">
<button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">บันทึก</button>
<button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
</div>
</form>
@else
เกิดข้อผิดพลาด
@endif
@endsection

@section('script')
<script>
        $(window).ready(function(){
        });
</script>
@endsection
