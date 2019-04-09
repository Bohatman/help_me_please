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
    <div class="container">
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

<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>UID</th>
        <th>Usertype</th>
        <th>Position</th>
        <th>Name</th>
        <th>email</th>
        <th>การจัดการ</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        @if(count($user)>0)
            @foreach ($user as $row)
                <td>{{$row->UID}}</td>
                <td>{{$row->usertype}}</td>
                @if($row->position_id == -1)
                <td>ผู้ใช้ทั่วไป</td>
                @else
                <td>{{$row->getPosition->position_name."(".$row->getPosition->getCategory->category_name.")"}}</td>
                @endif
                <td>{{$row->fname." ".$row->lname}}</td>
                <td>{{$row->email}}</td>
                @if($row->usertype == 0)
                <td><button style="margin-right: 1%;" id="edit-{{$row->UID}}" type="button" class="btn" onclick="editUser({{$row->UID}})" disabled>แก้ไข</button></td>
                @else
                <td><button style="margin-right: 1%;" id="edit-{{$row->UID}}" type="button" class="btn" onclick="editUser({{$row->UID}})">แก้ไข</button></td>
                @endif
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
<!--- Script-->
<script>
    function editUser(id){
        window.location="/user/edit/"+id;
    }
</script>
    </div>
</body>
</html>
