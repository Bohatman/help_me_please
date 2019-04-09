@extends('layouts.new')
@section('title', 'Outsider page')
@section('content')

<div class="container">
        <p  style="color:white">" ---- "</p>
        <h3 style="color:rgb(13, 68, 252)"><b>บริการสำหรับบุคคลทั่วไป</b></h3>
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
              <p><a href="http://icit.kmutnb.ac.th/main/rental-laboratory/"><img alt="img" src="{{ asset('img/rentRoom.jpg') }}" width="100% " height="250px"></a></p>
              <p><strong><a href="http://icit.kmutnb.ac.th/main/rental-laboratory/" style="color:#4F4F4F;  text-decoration: none ">อัตราค่าเช่าเครื่องคอมพิวเตอร์และห้องอบรม</a></strong></p>
            </div>
            <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                <p ><a href="http://icit.kmutnb.ac.th/main/catering-room/"><img alt="img" src="{{ asset('img/cateringRoom.png') }}" width="100% " height="250px"></a></p>
                <p ><strong><a href="http://icit.kmutnb.ac.th/main/catering-room/" style="color:#4F4F4F;  text-decoration: none ">อัตราค่าเช่าห้องจัดเลี้ยง</a></p></strong>
            </div>

    
            
    
          </div>
      </div>
            
    </section>
    <br>

   
@endsection
@section('script')
@endsection
