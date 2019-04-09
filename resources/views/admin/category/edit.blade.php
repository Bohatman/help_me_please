@extends('layouts.masteradmin')
@section('title', 'Edit-Category Management')

@section('content')
@if(count($category) > 0)
<form method="post" class="form-group" action="{{url('/edit/category')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="category_id">Category ID:</label>
    <input type="text" class="form-control" value="{{$category[0]->category_id}}" readonly name="category_id">
    </div>
    <div class="form-group">
            <label for="category_id">Category Name:</label>
        <input type="text" class="form-control" value="{{$category[0]->category_name}}" name="category_name">
    </div>
    <div class="form-group">
            <label for="category_color">Category Color:</label>
            <select class="form-control" name="category_color" id="category_color">
                    <option value="default">Default Label</option>
                    <option value="primary">Primary Label</option>
                    <option value="success">Success Label</option>
                    <option value="info">Info Label</option>
                    <option value="warning">Warning Label</option>
                    <option value="danger">Danger Label</option>
                  </select>
    </div>
    <div class="form-group">
            <label for="category_id">Sub-category Name:</label>
        <?php
        $sub = $category[0]->getSubCategory; ?>
        @if(count($sub)>0)
        @foreach ($sub as $item)
        <div class="form-group">
        <input type="hidden" name="sub_category_id[]" value="{{$item->sub_category_id}}">
            <input type="text" class="form-control" value="{{$item->sub_category_name}}" name="sub_category_name[]">
        </div>
        @endforeach
        @else
        ไม่มีหัวข้อย่อย
        @endif
    </div>
    <div class="float-right">
    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">บันทึก</button>
    <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ</button>
    </div>
</form>
@else
เกิดข้อผิดพลาด
@endif
@endsection

@section('script')
<script>
        $(window).ready(function(){
            $("#category_color").val("{{$category[0]->category_color}}");
        });
</script>
@endsection
