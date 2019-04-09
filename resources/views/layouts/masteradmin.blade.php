<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


  <link rel="shortcut icon" href="{{asset('img/icit_logo_big.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>Helpdesk - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminpanel/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('css/adminpanel/skin-blue.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!--scrip ของ ปฏิทิน-->

  <!-- Google Font -->
  <link rel="stylesheet"href="{{asset('css/adminpanel/font.css')}}">
  <link rel="stylesheet" href="{{ asset('css/adminpanel/ITclinic.css') }}">
  <script src="{{ asset('js/adminpanel/ITclinic.js') }}"></script>
  <style>
        .member:hover {
                background-color: whitesmoke;
                cursor: pointer;
        }
        .material-icons{
            display: inline-flex;
            vertical-align: middle;
        }
        </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('js/jqueryv3.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<!-- AdminLTE App -->
<script src="{{ asset('js/adminpanel/adminlte.min.js') }}"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
       <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li onclick="window.location.replace('{{url('/profile')}}');">
            <a href="#" data-toggle="control-sidebar"><i class="material-icons">person</i>{{Auth::user()->fname.' '.Auth::user()->lname}}</a>
            </li>
            <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> ออกจากระบบ</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
        </form>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">


    <!-- sidebar: style can be found in sidebar.less -->
  <div style="">
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <ul class="sidebar-menu" data-widget="tree">
      <li id="index_l"><a href="{{url('/admin/index')}}"><i class="material-icons">
            home
            </i><span> หน้าแรก</span></a></li>
      </ul>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
                <li class="treeview" id="listGroup_l">
                <a><i class="material-icons">
                        chrome_reader_mode
                        </i><span> จัดการเรื่องร้องเรียน</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li id="list_l"><a href="{{url('admin/list')}}">รายการเรื่องร้องเรียน</a></li>
                  <?php
                  $admin = false;
                    if(Auth::user()->usertype == 0){
                        $admin = true;
                    }
                  $position = DB::table('positions')->where('position_id','=',Auth::user()->position_id)->get();
                  if(count($position) > 0){
                        if($position[0]->priority_level == 1){
                            $position = true;
                        }
                        else{
                            $position = false;
                        }
                  }else{$position = false;}
                  ?>

                  @if($position || $admin)
                  <li id="tracking_l"><a href="{{url('admin/tracking')}}">ติดตามงาน</a></li>
                  @endif
                  <li id="result_list"><a href="{{url('/admin/result')}}">ผลการทำงาน</a></li>
                </ul>
        </li>
    <li id="IT_list"><a href="{{url('/admin/itpanel')}}"><i class="material-icons">
            important_devices
            </i><span> IT clinic</span></a></li>
        @if(Auth::user()->usertype == 0)
        <li class="treeview" id="controll_l">
                <a><i class="material-icons">
                        settings
                        </i><span> ส่วนควบคุม</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li id="setting_l"><a href="{{url('admin/setting')}}">ตั้งค่า</a></li>
                  <li id="category_l"><a href="{{url('admin/category')}}">จัดการหัวข้อการร้องเรียน</a></li>
                  <li id="campus_l"><a href="{{url('admin/campus')}}">จัดการวิทยาเขต</a></li>
                  <li id="position_l"><a href="{{url('admin/position')}}">จัดการตำแหน่งงาน</a></li>
                  <li id="user_l"><a href="{{url('admin/user')}}">จัดการผู้ใช้</a></li>
                  <li id="servicetype_l"><a href="{{url('admin/itclinic/service')}}">IT-Clinic การจัดการบริการ</a></li>
                  <li id="servicetime_l"><a href="{{url('admin/itclinic/time')}}">IT-Clinic เวลาการให้บริการ</a></li>
                </ul>
        </li>
        @endif
      </ul>
    </section>
</div>


    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <div class="container" style="background: white">
        <br>
        @yield('pagetitle')
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <strong>แจ้งเตือน</strong>{{ \Session::get('success') }}
            </div>
        @elseif(\Session::has('Empty'))
            <div class="alert alert-danger">
                <strong>แจ้งเตือน</strong>{{ \Session::get('Empty') }}
            </div>
         @elseif(\Session::has('error'))
            <div class="alert alert-danger">
                <strong>แจ้งเตือน</strong>{{ \Session::get('error') }}
            </div>
        @endif
            @yield('content')
        <br>
    </div>
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <center><strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.</center>
  </footer>
</div>
<!-- ./wrapper -->
@yield('script')
</body>
</html>
