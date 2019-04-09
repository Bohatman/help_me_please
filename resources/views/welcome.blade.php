@extends('layouts.new')
@section('title', 'indexpage')
@section('content2')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
/* Make the image fully responsive */
.carousel-inner img {
    width: 100%;
    height: 100%;
}
</style>
<!--slide img-->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>

  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img alt="img" src="{{ asset('img/kmutnb.jpg') }}"  >
    </div>
    <div class="carousel-item">
        <img alt="img" src="{{ asset('img/Capture1.png') }}"  >
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!--/slide img-->
<br>
<br>

<!--service1-->
<div class="container">
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <br>
      <a href="{{url('/report')}}" style="color:#FF6600;  text-decoration: none ">
      <p style="text-align:center"><i class="fa fa-wrench" style="font-size:100px;color:#FF4500"></i></p>
      <h4 style="text-align:center"><b>รายงานปัญหา</b></h4>
      </a>
      <br>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <br>
        <a href="{{url('/search')}}"style="color:#FF6600;  text-decoration: none ">
        <p style="text-align:center"><i class="fa fa-search" style="font-size:100px; color:#FF4500"></i></p>
        <h4 style="text-align:center"><b>ค้นหาการร้องเรียน</b> </h4>
        </a>
        <br>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <br>
        <a href="{{url('/book')}}" style="color:#FF6600;  text-decoration: none ">
        <p style="text-align:center"><i class="fa fa-desktop" style="font-size:100px;color:#FF4500"></i>
        <h4 style="text-align:center"><b>IT Clinic</b> </h4>
        <br>
        </a>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <br>
        <a href="{{url('/login')}}" style="color:#FF6600;  text-decoration: none ">
        <p style="text-align:center"><i class="fa fa-user-circle" style="font-size:100px;color:#FF4500"></i></p>
        <h4 style="text-align:center"><b>Login</b> </h4>
        </a>
        <br>
    </div>

  </div>

</div>
<!--/service1-->

<br>
<!--service2-->
         <div style="background-color:#9ACD32">
            <br> <br>
            <div class="container">
            <div class="row">
            <div class="col-md-4 col-xs-4 col-sm-4 col-md-4" style="text-align:center">
              <img src="{{ asset('img/azure2.png') }}" alt="" width="50%" height="50%">
              <br>
              <b>Microsoft Azure</b>
              <p style="color:#363636" class="hidden-xs">Cloud Platform ที่เปิดกว้างและมีความยืดหยุ่นสูงเพื่อทำหน้าที่เป็นรากฐานสำหรับการสร้าง
                ติดตั้ง รวมถึงจัดการโซลูชัน รองรับการใช้งานในรูปแบบ Iaas และ Pass
              </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-md-4" style="text-align:center">
              <img src="{{ asset('img/office.png') }}" alt="" width="50%" height="50%">
              <br>
              <b>Microsoft office</b>
              <p style="color:#363636" class="hidden-xs">บริการจาก Microsoft ที่จะให้เราได้ใช้ชุดแอปพลิเคชันต่างๆ ผ่านอินเทอร์เน็ต ไม่ว่าจะเป็น Microsoft Word, Microsoft Excel, Microsoft PowerPoint,
                OneNote รวมถึง OneDrive ที่ให้ใช้ฟรีถึง 5TB
              </p>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-md-4" style="text-align:center">
                <img src="{{ asset('img/visual-studio.png') }}" alt="" width="50%" height="50%">
                <br>
                <b>Microsoft Visual Studio Professional</b>
                <p style="color:#363636" class="hidden-xs" >
                    เครื่องมือที่ช่วยพัฒนาซอฟต์แวร์และระบบต่างๆ ซึ่งสามารถติดต่อสื่อสารพูดคุยกับคอมพิวเตอร์ได้ในระดับหนึ่งแล้ว แต่ยังไม่สามารถพัฒนาเป็นระบบเองได้ เหมาะสมสำหรับภาษา VB และ VB.NET
                </p>
            </div>
            </div>
            <br><br>
          </div>
          </div>
            <!--/service2-->


@endsection
@section('content')
<!-- Start slider -->



          <br><br>
          <!--news-->
          <div class="container">
            <div class="row">
          <div class="col-md-6">
              <div class="upcoming-events">
                  <div class="section-heading">
                      <h2 class="entry-title">News</h2>
                  </div><!-- .section-heading -->
                  <div class="event-wrap d-flex flex-wrap justify-content-between">
                  <table class="table" style="font-size:90%">
                      <tr>
                          <td>
                           <a href="https://www.khaosod.co.th/pr-news/news_2094137"> อธิการบดี มจพ. ปลื้ม! ขึ้นแท่นอันดับ 1 ของประเทศ ผลประเมินคุณภาพงานวิจัยด้านวิทยาศาสตร์และเทคโนโลยี </td></a>

                        </tr>
                        <tr class="warning">
                          <br>
                           <td>
                             <a href="https://www.khaosod.co.th/pr-news/news_2058133">มจพ. ขอเชิญร่วมงานวันคล้ายวันสถาปนามหาวิทยาลัย ครบรอบ “60 ปี มจพ. แห่งการสร้างสรรค์ประดิษฐกรรมสู่นวัตกรรม” 20 กุมภาพันธ์ 2562</a>
                            </td>
                        </tr>
                        <tr>
                          <td>
                             <a href="https://www.khaosod.co.th/pr-news/news_2058924"> ม.พระจอมเกล้าพระนครเหนือ ลงพื้นที่ภาคใต้ช่วยเหลือผู้ประสบภัยพิบัติ พายุโซนร้อน “ปาบึก”</a>
                          </td>
                        </tr>
                        <tr class="warning">
                            <td>
                               <a href="https://www.dailynews.co.th/education/686464?fbclid=IwAR2g9539S9eAMTB7CqyIfaTi9JXd1x_ewLurcSABPPUJxPth4NCtYz3saqY"> มจพ.ลงพื้นที่ช่วยผู้ประสบภัยจาก "ปาบึก" </a>
                            </td>
                        </tr>
                        <tr>
                          <td>
                              <a href="https://www.dek-d.com/tcas/51724/?fbclid=IwAR1Wg2mOVSmC5bNNYkroKiyeezSxtE34aimgOPP1XsLwnvU3baFgfb0GK00"> TCAS 62 รอบ 2 : โครงการรับตรงสอบข้อเขียน ม.พระจอมเกล้าพระนครเหนือ </a>
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                               <a href="https://www.posttoday.com/economy/574443"> "เศรษฐพงค์" ชู "ดาวเทียม"ดวงแรกโดยคนไทยฝีมือพระจอมเกล้าพระนครเหนือ </a>
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="http://news.ch3thailand.com/local/83806?fbclid=IwAR2YJb7niW26io-hLPTfUu1q2yi5pgL7BNJ-JYS8B4i97UZAGr7X9nxbrnI">ความสำเร็จดาวเทียมไทยสู่วงโคจรอวกาศ</a>
                          </td>
                        </tr>
                        <tr class="warning">
                            <td>
                               <a href="https://www.dailynews.co.th/education/683203?fbclid=IwAR1uOTVoXt2qzR1FwboHZJ_rIaYxNpRdMSDVsDnb0X5HnAwRevmQFavKk98"> สัญญาณดาวเทียมแนคแซทเริ่มปฎิบัติการแล้ว</a>
                            </td>
                        </tr>

                    </table>
                  </div>
              </div><!-- .upcoming-events -->
          </div>
          <div class="col-md-6">
              <div class="featured-cause">
                  <div class="section-heading">
                      <h2 class="entry-title">Video</h2>
                  </div><!-- .section-heading -->

                  <div class="cause-wrap d-flex flex-wrap justify-content-between">
                      <iframe width="100%" height="315px" src="https://www.youtube.com/embed/2bD4Uuo9Mjo" frameborder="0" allowfullscreen></iframe>
                  </div><!-- .cause-wrap -->
              </div><!-- .featured-cause -->
          </div>
          </div>
        </div>
          <!--/news-->
          <br><br>
@endsection
@section('script')

@endsection
