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
        @if(count($category) > 0)
<br>

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
    $("#category_color").val("{{$category[0]->category_color}}");
});
</script>
</body>
</html>
