<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Mat-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required meta tags -->
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Logo -->
    <style>
    .member:hover {
            background-color: whitesmoke;
            cursor: pointer;
    }
    .material-icons{
        display: inline-flex;
        vertical-align: top;
    }
    </style>
    <title>สํานักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ - ค่าใช้จ่าย</title>
</head>
<body>
    <div class="text-center">
        <h2>รายการชำระเงิน</h2>
        <hr>
        <h4>สํานักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h4><br>
    </div>
    <style>
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}</style>
        <table>
                <thead>
                  <tr>
                    <th>หัวข้อ</th>
                    <th>รายละเอียด</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>หมายเลขการบริการ</td>
                  <td>{{$book->book_id}}</td>
                  </tr>
                  <tr>
                    <td>บริการที่ใช้</td>
                  <td>{{$book->getType->servicetype_name}}</td>
                  </tr>
                  <tr>
                        <td>วันที่ - เวลา</td>
                  <td>{{$book->getTime->time_start.' - '.$book->getTime->time_end}}</td>
                      </tr>
                  <tr>
                    <td>รายละเอียด</td>
                  <td>{{$book->detail}}</td>
                  </tr>
                  <tr>
                        <td>อัตราการใช้บริการ</td>
                        <td>{{$book->getType->servicetype_price}} บาท</td>
                      </tr>
                </tbody>
              </table>
              <div class="row" style="text-align: center">

                  <div>
                        <b>ลงชื่อผู้รับบริการ</b>

                        <br><br>
                        ...........................................................
                        <br>
                        ({{$book->getUser->fname." ".$book->getUser->lname}})
                  </div>

                  <div>
                    <b>ลงชื่อผู้รับผิดชอบ</b>

                    <br><br>
                    ...........................................................
                    <br>
                    ({{$book->getPIC->fname." ".$book->getPIC->lname}})
                  </div>

              </div>
</body>
</html>
