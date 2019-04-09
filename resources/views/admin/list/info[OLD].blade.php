<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

   <h1>หมายเลขร้องเรียน {{$complaint->issues_id}} </h1>
   <h1>{{$complaint->getList->getCampus->campus_name}}</h1>
   <h1>{{$complaint->getList->getCategory->category_name}}</h1>
    <br>
    <h3>Detail</h3>
    {{$complaint->getList->detail}}
    <hr>
    <br>

    <h2>Building</h2>
    @if($complaint->getList->building == -1)
        <h2>ผู้ใช้ไม่ได้กรอก (-1)</h2>
        <hr>
    @else
        <h2>{{$complaint->getList->building}}</h2>
        <hr>
    @endif

    <h2>Room</h2>
    @if($complaint->getList->room == -1)
        <h2>ผู้ใช้ไม่ได้กรอก (-1)</h2>
        <hr>
    @else
        <h2>{{$complaint->getList->room}}</h2>
        <hr>
    @endif

    <h2>Image</h2>
    @if($complaint->getList->picture == -1)
    <h3>ไม่มีรูปไอ้ควายยยย</h3>
    @else
<img src="{{url($complaint->getList->picture)}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
    @endif
    <hr>

   @if(!is_null($complaint->getList->getSubCategory))
    <td style="text-align: center">{{$complaint->getList->getSubCategory->sub_category_name}}</td>
    @else
    <td style="text-align: center">ไม่มีหัวข้อย่อย</td>
    @endif

    @if($complaint->usertype == 0)
   <h1>ประเภทผู้ร้องเรียน แอดมินเว้ยยยยยยยยย </h1>
<h2>{{$complaint->getUser->fname }} {{$complaint->getUser->lname}}</h2>
   @elseif($complaint->usertype == 1)
   <h1>ประเภทผู้ร้องเรียน นักศึกษาเว้ยยยยยยยย </h1>
<h2>{{$complaint->getUser->fname }} {{$complaint->getUser->lname}}</h2>
   @elseif($complaint->usertype == 2)
   <h1>ประเภทผู้ร้องเรียน บุคลากรเว้ยยยยยยยยย</h1>
<h2>{{$complaint->getUser->fname }} {{$complaint->getUser->lname}}</h2>
   @elseif($complaint->usertype == 3)
   <h1>ประเภทผู้ร้องเรียน คนนอกเว้ยยยยยยยยย</h1>
<h2>{{$complaint->getGuest->fname}} {{$complaint->getGuest->lname}}</h2>
   @else
   <h1>บัคแล้วไอ้เหี้ยยยยยยยยยยยยยยยยยยยยย</h1>
   @endif

</body>
</html>
