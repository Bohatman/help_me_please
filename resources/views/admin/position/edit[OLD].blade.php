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
    <title>EDIT</title>
</head>
<body>
<div class="container">
        <br>
    @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
        @if (count($errors) > 0)
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
    <br>
        @if(count($position) > 0)
<br>
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
        <div class="pull-right">
<button type="submit" class="btn btn-primary">บันทึก</button>
<button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
</div>
</form>
@else
เกิดข้อผิดพลาด
@endif
</div>

<!--Script-->
<script>
$(window).ready(function(){
});
</script>
</body>
</html>
