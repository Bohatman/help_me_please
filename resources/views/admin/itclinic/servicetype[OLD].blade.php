<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
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
            @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
        <br>
    <form method="POST" action="{{url('admin/itclinic/service')}}">
        {{csrf_field()}}
            <br />
                <div class="card">
                        <div class="card-body">
                <div class="form-group">
                        <label for="sname">Service name:</label>
                        <input type="text" class="form-control" id="sname" name="servicetype_name" required>
                      </div>
                          <div class="form-group">
                                <label for="usertype"><b>ผู้มีสิทธิใช้งาน: </b></label>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="student" name="usertype" value="1" checked>นักศึกษา
                                   </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="อัตราค่าบริการ" name="servicetype_price" required>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2">บาท</span>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary float-right">บันทึก</button>
                        </div>
                </div>
        </form>
        <br>
        <table class="table">
                <thead>
                  <tr>
                    <th style="text-align: center;width: 15%">Service ID</th>
                    <th style="text-align: center;width: 30%">Service Name</th>
                    <th style="text-align: center;width: 20%">Service Price</th>
                    <th style="text-align: center;width: 35%">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($servicetype)>0)
                        @foreach ($servicetype as $item)
                        <tr>
                        <td style="text-align: center">{{$item->servicetype_id}}</td>
                        <td style="text-align: center">{{$item->servicetype_name}}</td>
                        <td style="text-align: right">{{$item->servicetype_price." บาท"}}</td>
                        <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-warning">แก้ไข</button>
                            <form method="post" class="delete_form" action="{{action('ServiceTypeController@destroy',$item->servicetype_id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                                </div>
                        </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
    </div>
</body>
</html>
