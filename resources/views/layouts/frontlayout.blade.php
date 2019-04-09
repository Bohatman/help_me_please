<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('img/icit_logo_big.png')}}" type="image/x-icon">
    <title>สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ - @yield('title')</title>
    @yield('header')
    <!-- Font awesome -->
    <link rel='stylesheet' href='{{asset('css/Font-awesome.css')}}'>
    <!-- Bootstrap -->
     <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
     <link href="{{asset('css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.simpleLens.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('css/color.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
  <link href="{{asset('css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


    <!-- Google Font -->
  <link href="{{asset('css/fontLato.css')}}" rel='stylesheet' type='text/css'>
  <link href="{{asset('css/fontRaleway.css')}}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/fontKanit.css')}}">

      <!-- jQuery library -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('js/jquery.smartmenus.bootstrap.js')}}"></script>
  <!-- To Slider JS -->

  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{'js/custom.js'}}"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
 <!-- Start header section -->


 <div class="row">
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0 2555 2000 ต่อ 2207 </p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                            <!-- Authentication Links -->
                        @guest
                        <ul class="aa-head-top-nav-right">
                                <li><a href="{{route('login')}}">เข้าสู่ระบบ</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                        </ul>
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname ." ".Auth::user()->lname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->position_id != -1 || Auth::user()->usertype == 0)
                                        <a class="dropdown-item" href="{{url('admin/setting') }}">&nbsp;&nbsp;Admin Panel</a>
                                        <br />
                                    @endif
                                    <a class="dropdown-item" href="#">&nbsp;&nbsp;การจัดการบัญชีผู้ใช้</a>
                                    <br >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        &nbsp;&nbsp;{{__('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-1 hidden-xs">
          <a href="{{url('/')}}">
                    <img src="{{asset('img/icit_logo_big.png')}}" class="rounded float-left " width="150%" height="150%" alt="logo img">
                </a>
          </div>
          <div class="col-md-11">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
              <a href="{{url('/')}}}">
                    <p ><strong >สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</strong><span>Institute of Computer and Information Technology</span></p>
                </a>
              </div>
              <!-- / logo  -->
              <!-- search box -->

              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
</div>
<!-- / header top  -->

  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
            <li><a href="{{url('/')}}">หน้าแรก</a></li>
            <li><a href="{{url('/about')}}">เกี่ยวกับ</a></li>
              <li><a href="#">งานบริการ <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/student')}}">สำหรับนักศึกษา</a></li>
                  <li><a href="{{url('/insider')}}">สำหรับบุคลากรของมหาวิทยาลัย</a></li>
                  <li><a href="{{url('/outsider')}}">สำหรับบุคคลทั่วไป</a></li>
                </ul>
              </li>
            <li><a href="{{url('/report')}}">รายงานปัญหาการใช้งาน</a></li>
            <li><a href="{{url('/itclinic')}}">IT Clinic</a></li>
              <li><a href="{{url('/faq')}}">FAQ</a></li>
              <li><a href="{{url('/contact')}}">ติดต่อ</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->

   <!-- catg header banner section
   <section id="aa-catg-head-banner">
    <img src="icitBanner.jpg" >
    <div class="aa-catg-head-banner-area">

   </div><!doctype html>
<html lang="en">
  <head>

    <!-- Google Mat-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
         <!----> <div class="row ">

             <!----> <div class="col-2 border border-secondary" style="vertical-align: middle;display: inline-flex;" >
                    <i class="material-icons">phone</i>0 2555 2000 ต่อ 2207
             <!----> </div>
              <!----> <div class="col-7 border border-secondary">
            <!----> </div>
            <!----> <div class="col-3 border border-secondary" style="text-align: right">
                    @guest
                    <span><a style="color: black;" href="{{route('login')}}">เข้าสู่ระบบ</a> </span>/<span><a style="color: black;" href="{{route('register')}}"> สมัครสมาชิก</a></span>
                    @else
                  <!---->  <div class="dropdown">

                    {{ Auth::user()->fname ." ".Auth::user()->lname }}<a class="member" data-toggle="dropdown"><span class="material-icons">arrow_drop_down</i></span></a>
                    <!----><div class="dropdown-menu">
                            @if(Auth::user()->position_id != -1 || Auth::user()->usertype == 0)
                            <a class="dropdown-item" href="{{url('admin/setting') }}">&nbsp;&nbsp;Admin Panel</a>
                        @endif
                        <a class="dropdown-item" href="#">&nbsp;&nbsp;การจัดการบัญชีผู้ใช้</a>
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
                <!-- row --> </div>
         <!--container--> </div>

        <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px">
                <div class="container">
                  <h1 class="display-5">Fluid jumbotron</h1>
                  <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active" id="home_list">
              <a class="nav-link" href="{{url('/')}}">หน้าแรก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/about')}}">เกี่ยวกับ</a>
            </li>
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                งานบริการ
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('/student')}}">สำหรับนักศึกษา</a>
                <a class="dropdown-item" href="{{url('/insider')}}">สำหรับบุคลากรของมหาวิทยาลัย</a>
                <a class="dropdown-item" href="{{url('/outsider')}}">สำหรับบุคคลทั่วไป</a>
              </div>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{url('/report')}}">รายงานปัญหาการใช้งาน</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{url('/itclinic')}}">IT Clinic</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{url('/faq')}}">FAQ</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">ติดต่อ</a>
            </li>
          </ul>
        </div>
        </div>
      </nav>
    <!-- Navbar -->

<!-- Main -->
    <div class="container">
        <br>
            @if(\Session::has('success'))
            <br><br>
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @elseif(\Session::has('Empty'))
            <br>
                <div class="alert alert-danger">
                    <p>{{ \Session::get('Empty') }}</p>
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
    @yield('script')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

  </section>
   / catg header banner section -->

   <!-- about describe-->
   @yield('sider')
   <div class="container">
            @if(\Session::has('success'))
            <br><br>
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @elseif(\Session::has('Empty'))
            <br>
                <div class="alert alert-danger">
                    <p>{{ \Session::get('Empty') }}</p>
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
   <!-- /about describe-->



  <!-- footer -->
 <footer id="aa-footer" style="">
    <!-- footer bottom -->
    <div class="aa-footer-top">
            <div class="container">
               <div class="row">
               <div class="col-md-12">
                 <div class="aa-footer-top-area">
                   <div class="row">
                     <div class="col-md-4 col-sm-6">
                       <div class="aa-footer-widget">
                         <h3><b>Main Menu</b></h3>
                         <ul class="aa-footer-nav">
                         <li><a href="{{url('/')}}">หน้าเเรก</a></li>
                         <li><a href="{{url('about')}}">เกี่ยวกับ</a></li>
                           <li><a href="{{url('student')}}">บริการสำหรับนักศึกษา</a></li>
                           <li><a href="{{url('insider')}}">บริการสำหรับบุคลากรของมหาวิทยาลัย</a></li>
                           <li><a href="{{url('outsider')}}">บริการสำหรับบุคคลทั่วไป</a></li>
                           <li><a href="{{url('faq')}}">FAQ</a></li>
                           <li><a href="{{url('contact')}}">ติดต่อเรา</a></li>
                         </ul>
                       </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                       <div class="aa-footer-widget">
                         <div class="aa-footer-widget">
                           <h3><b>Useful Links</b></h3>
                           <ul class="aa-footer-nav">
                             <li><a href="#">ค้นหา</a></li>
                             <li><a href="{{url('complaint')}}">รายงานปัญหาการใช้งาน</a></li>
                             <li><a href="{{url('itclinic')}}">IT Clinic</a></li>
                             <li><a href="{{url('contact')}}">แผนที่</a></li>

                           </ul>
                         </div>
                       </div>
                     </div>
                     <div class="col-md-4 col-sm-6">
                       <div class="aa-footer-widget">
                         <div class="aa-footer-widget">
                           <h3><b>Contact Us</b></h3>
                           <address>
                             <p> สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                             <p>ชั้น 5 อาคารอเนกประสงค์ ถนนประชาราษฎร์ 1 แขวงวงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800</p>
                             <p><span class="fa fa-phone"></span>(+662) 555 2000 ต่อ 2205
                             <p><span class="fa fa-fax"></span>(+662) 585 7945
                             <p><span class="fa fa-envelope"></span>icitadmin@kmutnb.ac.th</p>
                           </address>
                           <div class="aa-footer-social">
                               <a href="http://line.me/ti/p/~@icit_help"><span class="far fa-comment-dots"></span></a>
                             <a href="https://www.facebook.com/ICIT.KMUTNB"><span class="fab fa-facebook-square"></span></a>
                             <a href="https://www.youtube.com/user/ICITKMUTNB"><span class="fab fa-youtube"></span></a>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
            </div>
           </div>
           <!-- footer-bottom -->
           <div class="aa-footer-bottom">
             <div class="container">
               <div class="row">
               <div class="col-md-12">
                 <div class="aa-footer-bottom-area">
                   <p>Designed by ProviderSoftService</p>

                 </div>
               </div>
             </div>
             </div>
           </div>
         </footer>
         <!-- / footer -->
  <!-- / footer -->



  @yield('script')
  </body>
  </html>
