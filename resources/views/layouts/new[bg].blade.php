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
            <i class="material-icons float-left">phone</i>0 2555 2000 ต่อ 2207
        <div class="float-right">
            @guest
            <span><a style="color: black;" href="{{route('login')}}">เข้าสู่ระบบ</a> </span>/<span><a style="color: black;" href="{{route('register')}}"> สมัครสมาชิก</a></span>
            @else
          <!---->  <div class="dropdown">
          <a class="member" href="{{url('profile')}}" style="color: black">
          {{ Auth::user()->fname ." ".Auth::user()->lname }}</a>{{" "}}<a class="member" data-toggle="dropdown"><span class="material-icons">arrow_drop_down</i></span></a>
            <!----><div class="dropdown-menu">
                    @if(Auth::user()->position_id != -1 || Auth::user()->usertype == 0)
                    <a class="dropdown-item" href="{{url('admin/setting') }}">&nbsp;&nbsp;Admin Panel</a>
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
        <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px">
                <div class="container">
                  <h1 class="display-5">Fluid jumbotron</h1>
                  <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item" id="home_list">
                    <a class="nav-link" href="{{url('/')}}">หน้าแรก</a>
                </li>
            <li class="nav-item" id="about_list">
                    <a class="nav-link" href="{{url('/about')}}">เกี่ยวกับ</a>
                </li>
            <li class="nav-item dropdown" id="service_list">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">งานบริการ
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/student')}}">สำหรับนักศึกษา</a>
                    <a class="dropdown-item" href="{{url('/insider')}}">สำหรับบุคลากรของมหาวิทยาลัย</a>
                    <a class="dropdown-item" href="{{url('/outsider')}}">สำหรับบุคคลทั่วไป</a>
              </div>
            </li>
            <li class="nav-item" id="report_list">
                    <a class="nav-link" href="{{url('/report')}}">รายงานปัญหาการใช้งาน</a>
            </li>
            <li class="nav-item" id="search_list">
                    <a class="nav-link" href="{{url('/search')}}">ค้นหาการร้องเรียน</a>
            </li>
            <li class="nav-item" id="it_list">
                    <a class="nav-link" href="{{url('/itclinic')}}">IT Clinic</a>
                  </li>
                  <li class="nav-item" id="faq_list">
                        <a class="nav-link" href="{{url('/faq')}}">FAQ</a>
                    </li>
                          <li class="nav-item" id="contact_list">
                                <a class="nav-link" href="{{url('/contact')}}">ติดต่อ</a>
                            </li>
          </ul>
        </div>
      </nav>
    <!-- Navbar -->

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
    </div>
<!-- Script -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- Footer -->
<footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
          <a href="https://sputt.me/"> BOHATMAN</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->
    @yield('script')
  </body>
</html>
