@extends('layouts.new')
@section('title', 'Insider page')
@section('content')

<div class="container">
        <p  style="color:white">" ---- "</p>
        <h3 style="color:rgb(13, 68, 252)"><b>บริการสำหรับบุคคลกรภายในมหาวิทยาลัย</b></h3>
        <hr>
    </div>
<section id="">
  <div class="container">
      <div class="row">
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p ><a href="#"><img alt="img" src="{{ asset('img/help.jpg') }}" width="100% " height="250px"></a></p>
          <p ><strong><a href="" style="color:#4F4F4F;  text-decoration: none ">ศูนย์ความความช่วยเหลือด้านเทคโนโลยีสารสนเทศ</a></p></strong>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="#"><img alt="img" src="{{ asset('img/itClinic.jpg') }}" width="100% " height="250px"></a> <br></p>
          <p ><strong><a href="" style="color:#4F4F4F;  text-decoration: none ">IT Clinic</strong></p>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="https://account.kmutnb.ac.th/web/"><img alt="img" src="{{ asset('img/icitAccount.jpg') }}" width="100% " height="250px"></a></p>
          <p><strong><a href="https://account.kmutnb.ac.th/web/" style="color:#4F4F4F;  text-decoration: none ">ICIT ACCOUNT</a></strong></p>
        </div>

        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p ><a href="https://mail.kmutnb.ac.th/"><img alt="img" src="{{ asset('img/gmail.png') }}" width="100% " height="250px"></a></p>
          <p ><strong><a href="https://mail.kmutnb.ac.th/" style="color:#4F4F4F;  text-decoration: none ">@email.kmutnb.ac.th</a></p></strong>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="http://icit.kmutnb.ac.th/main/office365-edu/"><img alt="img" src="{{ asset('img/Office365.jpg') }}" width="100% " height="250px"></a> <br></p>
          <p ><strong><a href="http://icit.kmutnb.ac.th/main/office365-edu/" style="color:#4F4F4F;  text-decoration: none ">Office 365 Education</strong></p>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="http://icit.kmutnb.ac.th/main/microsoft-azure-dev-tools-for-teaching/"><img alt="img" src="{{ asset('img/azure.png') }}" width="100% " height="250px"></a></p>
          <p><strong><a href="http://icit.kmutnb.ac.th/main/microsoft-azure-dev-tools-for-teaching/" style="color:#4F4F4F;  text-decoration: none ">Microsoft Azure Dev Tools for Teaching</a></strong></p>
        </div>

        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p ><a href="http://icit.kmutnb.ac.th/main/software-license/"><img alt="img" src="{{ asset('img/software.jpg') }}" width="100% " height="250px"></a></p>
          <p ><strong><a href="http://icit.kmutnb.ac.th/main/software-license/" style="color:#4F4F4F;  text-decoration: none ">Software ลิขสิทธิ์</a></p></strong>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="https://grade.icit.kmutnb.ac.th/Default.aspx"><img alt="img" src="{{ asset('img/envalute.jpg') }}" width="100% " height="250px"></a> <br></p>
          <p ><strong><a href="https://grade.icit.kmutnb.ac.th/Default.aspx" style="color:#4F4F4F;  text-decoration: none ">ระบบส่งเกรดออนไลน์และประเมินการสอนอาจารย์</strong></p>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="http://authen.eduroam.kmutnb.ac.th/index.php"><img alt="img" src="{{ asset('img/eduroam.png') }}" width="100% " height="250px"></a></p>
          <p><strong><a href="http://authen.eduroam.kmutnb.ac.th/index.php" style="color:#4F4F4F;  text-decoration: none ">เว็บไซต์บริการเครือข่ายโรมมิ่งเพื่อการศึกษาและวิจัยสำหรับนักศึกษาและบุคลากร</a></strong></p>
        </div>

        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p ><a href="http://www.wifi.kmutnb.ac.th/"><img alt="img" src="{{ asset('img/wifi.png') }}" width="100% " height="250px"></a></p>
          <p ><strong><a href="http://www.wifi.kmutnb.ac.th/" style="color:#4F4F4F;  text-decoration: none ">เว็บไซต์เครือข่ายไร้สาย มจพ.</a></p></strong>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="http://it-info.icit.kmutnb.ac.th/"><img alt="img" src="{{ asset('img/databaseWeb.png') }}" width="100% " height="250px"></a> <br></p>
          <p ><strong><a href="http://it-info.icit.kmutnb.ac.th/" style="color:#4F4F4F;  text-decoration: none ">งานบริการระบบฐานข้อมูลทรัพยากรด้านเทคโนโลยีสารสนเทศ</strong></p>
        </div>
        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p><a href="http://icit.kmutnb.ac.th/main/vdo-conference/"><img alt="img" src="{{ asset('img/conference.png') }}" width="100% " height="250px"></a></p>
          <p><strong><a href="http://icit.kmutnb.ac.th/main/vdo-conference/" style="color:#4F4F4F;  text-decoration: none ">ระบบให้บริการประชุมทางไกล (VDO Conference)</a></strong></p>
        </div>

        <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
          <p ><a href="http://icit.kmutnb.ac.th/main/rental-laboratory/"><img alt="img" src="{{ asset('img/rentRoom.jpg') }}" width="100% " height="250px"></a></p>
          <p ><strong><a href="http://icit.kmutnb.ac.th/main/rental-laboratory/" style="color:#4F4F4F;  text-decoration: none ">อัตราค่าเช่าเครื่องคอมพิวเตอร์และห้องอบรม</a></p></strong>
        </div>

      </div>
  </div>
        
      </section>
      <br>
@endsection
@section('script')
@endsection
