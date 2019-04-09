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
        <?php
        $usertype = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
        ?>
    <div class="container">
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                        <th style="text-align: center; width: 5%">No.</th>
                        <th style="text-align: center; width: 15%">Campus</th>
                        <th style="text-align: center; width: 10%">Category</th>
                        <th style="text-align: center; width: 10%">SubCategory</th>
                        <th style="text-align: center; width: 10%">UserType</th>
                        <th style="text-align: center; width: 15%">Name</th>
                        <th style="text-align: center; width: 15%">เจ้าหน้าที่</th>
                        <th style="text-align: center; width: 15%">การจัดการ</th>
                  </tr>
                </thead>
                <tbody>
                        @if(count($complaint)>0)
                        <?php $cout = 0;?>
                        @foreach ($complaint as $item)
                        <tr>
                        <td style="text-align: center">{{$item->issues_id}}</td>
                        <td style="text-align: center">{{$item->getList->getCampus->campus_name}}</td>
                        <td style="text-align: center">{{$item->getList->getCategory->category_name}}</td>
                        <!--Row หัวข้อย่อย-->
                        @if(!is_null($item->getList->getSubCategory))
                        <td style="text-align: center">{{$item->getList->getSubCategory->sub_category_name}}</td>
                        @else
                        <td style="text-align: center">none</td>
                        @endif
                        <td style="text-align: center">{{$usertype[$item->usertype]}}</td>
                        @if($item->usertype == 3)
                        <td style="text-align: center">{{$item->getGuest->fname}}</td>
                        @else
                        <td style="text-align: center">{{$item->getUser->fname }}</td>
                        @endif
                        <td>
                        </td>
                        <td style="text-align:center">
                                <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                           จัดการ
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item">มอบงาน</a>
                                        <a target="_blank" class="dropdown-item">รายละเอียด</a>
                                        </div>
                                      </div>
                        </td>

                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="8">ไม่พบเรื่องร้องเรียน</td>
                            </tr>
                        @endif
        </tbody>
        </table>
            </div>
</body>
</html>
