<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Category</title>
</head>
<body>
<!-- START add -->
<div class='container'>
<!-- ส่วนหัว -->
  <br>
@if(\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div>
@elseif(\Session::has('Empty'))
<div class="alert alert-danger">
<p>{{ \Session::get('Empty') }}</p>
</div>
@else
<div class="alert alert-info">
  <strong>คำแนะนำ</strong> หากไม่รักก็หยุดจะได้ไม่เสียใจ.
</div>
@endif
<!--ส่วนเพิ่มข้อมูล-->
<div>
<form class ="form-inline" action='{{url('admin/category')}}' method="POST" autocomplete="off">
    {{csrf_field()}}
        <span class="input-group-text">Category</span>
        <input type="text" name="category_name" class="form-control">
        <div class="form-group">
                <label for="sel1">Color</label>
                <select class="form-control" name="category_color">
                  <option value="default">Default Label</option>
                  <option value="primary">Primary Label</option>
                  <option value="success">Success Label</option>
                  <option value="info">Info Label</option>
                  <option value="warning">Warning Label</option>
                  <option value="danger">Danger Label</option>
                </select>
        </div>
        <button type="submit" class="btn btn-primary">เพิ่มหัวข้อหลัก</button>
</form>
<hr><br>
</div>
<!--ส่วนแสดงผลตาราง-->
<div>
<form method="POST" action="{{url('admin/subcategory')}}" autocomplete="off">
    {{csrf_field()}}
    @if(count($category)>0)
<div class="just-padding">
    @foreach ($category as $row)
    <div class="list-group list-group-root well">
    <a href='#item-{{$row->category_id}}' class="list-group-item" onclick="showBut({{$row->category_id}})">
    <i class="glyphicon glyphicon-th-list text-align: left text-{{$row->category_color}}"><b> {{$row->category_name}}</b></i>
        </a>
    <?php
        $len = count($row->getSubCategory);
        ?>
    @if($len > 0)
    <div class="list-group collapse" id="item-{{$row->category_id}}">
    @foreach ($row->getSubCategory as $item)

                <i class="list-group-item">{{$item->sub_category_name}}</i>

    @endforeach

        <i class="list-group-item">+ <input type="text" name=sub_name[]><input type="hidden" name ="category[]" value="{{$row->category_id}}" ></i>

    </div>
    @else
        <div class="list-group collapse" id="item-{{$row->category_id}}">

        <i class="list-group-item">+ <input type="text" name=sub_name[]><input type="hidden" name ="category[]" value="{{$row->category_id}}"></i>

        </div>
    @endif
    <button style="margin-right: 1%;" id="remove-{{$row->category_id}}" type="button" class="btn pull-right hidden" onclick="delData({{$row->category_id}})">ลบ</button>
    <button style="margin-right: 1%;" id="edit-{{$row->category_id}}" type="button" class="btn pull-right hidden" onclick="editData({{$row->category_id}})">แก้ไข</button>
    <button style="margin-right: 1%;" id="butt-{{$row->category_id}}" type="button" class="btn pull-right hidden" onclick="addBut({{$row->category_id}},{{$row->category_id}})">เพิ่มแถว</button>
    </div>
@endforeach
</div>
<button type="submit">บันทึกข้อมูล</button>
@else
<p>ไม่พบข้อมูล กรุณาเพิ่มหัวข้อ</p>
@endif
</form>
</div>

<!-- END add -->
</div>
<!-- END add -->
<!-- Modal -->

<!-- Script -->
<script>
    function addBut(item,id) {
        var x = document.createElement("i");
        x.setAttribute("class", "list-group-item");
        var t = document.createTextNode("+ ");
        var y = document.createElement("input");
        y.setAttribute("type", "text");
        y.setAttribute("name", "sub_name[]");
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
        document.getElementById("remove-"+item).classList.toggle('hidden');
        document.getElementById("edit-"+item).classList.toggle('hidden');
    }
    function delData(id){
        var result = confirm("คุณต้องการลบหัวข้อนี้ใช่ไหม หัวข้อย่อยทั้งหมดจะถูกลบ รวมถึงเรื่องร้องเรียนที่เกี่ยวข้องจะถูกลบและไม่สามรถเรียกคืนได้");
        if(result)
        {
            $.ajax({
             url:"{{route('me.del')}}",
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
    function editData(id){
        window.location="/category/edit/"+id;
    }
</script>

<!--Style -->
<style>

</style>
This page took {{ (microtime(true) - LARAVEL_START) }} seconds to render


</body>
</html>
