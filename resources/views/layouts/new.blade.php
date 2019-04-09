<!doctype html>
<html lang="en">
  <head>

    <!-- Google Mat-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Logo -->
  <link rel="shortcut icon" href="{{ asset('img/icit_logo_big.png') }}" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
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
    <title>สํานักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ - @yield('title')</title>
  </head>
  <body style="font-family: 'Kanit', sans-serif;">
    <!---->  <div class="container-fluid">
        <i class="material-icons float-left">phone</i>0 2555 2000
        <div class="float-right">
            @guest
            <span><a style="color: black;" href="{{route('login')}}">เข้าสู่ระบบ</a> </span>/<span><a style="color: black;" href="{{route('register')}}"> สมัครสมาชิก</a></span>
            @else
          <!---->  <div class="dropdown">
          <a class="member" href="{{url('profile')}}" style="color: black">
          {{ Auth::user()->fname ." ".Auth::user()->lname }}</a>
        @if(is_null(Auth::user()->email_verified_at))
        <a href="{{url('email/verify')}}" style="color:red">(กรุณายืนยันอีเมล์)</a>
        @endif
        {{" "}}<a class="member" data-toggle="dropdown"><span class="material-icons">arrow_drop_down</i></span></a>
            <!----><div class="dropdown-menu">
                    @if(Auth::user()->position_id != -1 || Auth::user()->usertype == 0)
                    <a class="dropdown-item" href="{{url('admin/index') }}">&nbsp;&nbsp;Admin Panel</a>
                @endif
            <a class="dropdown-item" href="{{url('profile')}}">&nbsp;&nbsp;การจัดการบัญชีผู้ใช้</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                &nbsp;&nbsp;{{__('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                    </form>
            <!--drop--></div>
       <!--drop--> </div>

          <!--menu-->  </div>
            @endguest
            </div>
</div>
</div>
        <div class="container-fluid" style="margin-bottom: 0px">
            <div class="row" style="display: inline-flex">
                <div class="col-1"></div>
                <div class="col-2">
                    <img src="{{ asset('img/icit_logo_big.png') }}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-9">
                    <h2 style="color: darkorange">สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</h2>
                    <h4>Institute of Computer and Information Technology</h4>
                </div>
            </div>
        </div>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item" id="home_list">
                <a class="nav-link" href="{{url('/')}}" style="color:white">หน้าแรก</a>
            </li>
        <li class="nav-item" id="about_list">
                <a class="nav-link" href="{{url('/about')}}" style="color:white">เกี่ยวกับ</a>
            </li>
        <li class="nav-item dropdown" id="service_list">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">งานบริการ
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{url('/student')}}" style="color:#FFA500">สำหรับนักศึกษา</a>
                <a class="dropdown-item" href="{{url('/insider')}}" style="color:#FFA500">สำหรับบุคลากรของมหาวิทยาลัย</a>
                <a class="dropdown-item" href="{{url('/outsider')}}" style="color:#FFA500">สำหรับบุคคลทั่วไป</a>
          </div>
        </li>
        <li class="nav-item" id="report_list">
                <a class="nav-link" href="{{url('/report')}}" style="color:white">รายงานปัญหาการใช้งาน</a>
        </li>
        <li class="nav-item" id="search_list">
                <a class="nav-link" href="{{url('/search')}}" style="color:white">ค้นหาการร้องเรียน</a>
        </li>
        <li class="nav-item" id="it_list">
                <a class="nav-link" href="{{url('/book')}}" style="color:white">IT Clinic</a>
              </li>
              <li class="nav-item" id="faq_list">
                    <a class="nav-link" href="{{url('/faq')}}" style="color:white">FAQ</a>
                </li>
                      <li class="nav-item" id="contact_list">
                            <a class="nav-link" href="{{url('/contact')}}" style="color:white">ติดต่อ</a>
                        </li>
      </ul>
    </div>
  </div>
  </nav>
<!-- Navbar -->
    @yield('content2')
<!-- Main -->
    <div class="container">
        <br>
            @if(\Session::has('success'))
            <br><br>
                <div class="alert alert-success">
                    {{ \Session::get('success') }}
                </div>
            @elseif(\Session::has('Empty'))
            <br>
                <div class="alert alert-danger">
                    {{ \Session::get('Empty') }}
                </div>
                @elseif(\Session::has('error'))
                <br>
                <div class="alert alert-danger">
                        {{ \Session::get('error') }}
                </div>
            @endif
            @if(count($errors) > 0)
            <br><br>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
            @endif
    @yield('content')
    <br><br>
    </div>
<!-- Script -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- Footer -->
<footer>
  <div style="background-color:#657383">
    <br>
    <div class="container">
      <div class="row">
        <div class="col -xs-4 col-sm-4 col-md-4 col-lg-4">
            <h3><b>Main Menu</b></h3>
            <ul style="list-style-type:none; padding: 0%; margin: 0%; ">
            <li><a href="{{url('/')}}" style="color:white;  text-decoration: none ">หน้าเเรก</a></li>
                <li><a href="{{url('/about')}}" style="color:white;  text-decoration: none ">เกี่ยวกับ</a></li>
                <li><a href="{{url('/student')}}" style="color:white;  text-decoration: none ">บริการสำหรับนักศึกษา</a></li>
                <li><a href="{{url('/insider')}}" style="color:white;  text-decoration: none ">บริการสำหรับบุคลากรของมหาวิทยาลัย</a></li>
                <li><a href="{{url('/outsider')}}" style="color:white;  text-decoration: none ">บริการสำหรับบุคคลทั่วไป</a></li>
                <li><a href="{{url('/faq')}}" style="color:white;  text-decoration: none ">FAQ</a></li>
                <li><a href="{{url('/contact')}}" style="color:white;  text-decoration: none ">ติดต่อเรา</a></li>
            </ul>
        </div>
        <div class="col -xs-4 col-sm-4 col-md-4 col-lg-4">
            <h3><b>Useful Links</b></h3>
            <ul style="list-style-type:none; padding: 0%; margin: 0%;">
                <li><a href="{{url('/report')}}" style="color:white;  text-decoration: none ">รายงานปัญหาการใช้งาน</a></li>
                <li><a href="{{url('/book')}}" style="color:white;  text-decoration: none ">IT Clinic</a></li>
                <li><a href="{{url('/contact')}}" style="color:white;  text-decoration: none ">แผนที่</a></li>

        </div>
        <div class="col -xs-4 col-sm-4 col-md-4 col-lg-4">
            <h3><b>Contact Us</b></h3>
            <address>
              <p  style="color: white"> สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ
              ชั้น 5 อาคารอเนกประสงค์ ถนนประชาราษฎร์ 1 แขวงวงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800</p>
              <p  style="color: white"><span class="fa fa-phone"></span> (+662) 555 2000 ต่อ 2205
              <p  style="color: white"><span class="fa fa-fax"></span>  (+662) 585 7945
              <p  style="color: white"><span class="fa fa-envelope"></span> icitadmin@kmutnb.ac.th</p>
            </address>
            <div class="aa-footer-social">
                <a href="http://line.me/ti/p/~@icit_help" style="color:#363636;   "><span class="fa fa-commenting-o" style="font-size:30px ;"></span></a> &nbsp&nbsp&nbsp
              <a href="https://www.facebook.com/ICIT.KMUTNB" style="color:#363636;   "><i class="fa fa-facebook-official" style="font-size:30px;"></i></a> &nbsp&nbsp&nbsp
              <a href="https://www.youtube.com/user/ICITKMUTNB" style="color:#363636;  "><i class="fa fa-youtube-square" style="font-size:30px;"></i></a> &nbsp&nbsp&nbsp
        </div>

      </div>
    </div>
  </div>
  <hr>
  <div class="container">
      <b><p>Designed by ProviderSoftService (BoHat)</p></b>
  </div>
  <br>
  </div>
</footer>
      <!-- Footer -->
    @yield('script')
  </body>
</html>
