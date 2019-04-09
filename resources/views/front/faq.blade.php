@extends('layouts.new')
@section('title', 'FAQ page')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <h2 class="modal-title" style="color:#00CD00"><b> FAQs</b></h2>
    <hr>

    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#home"> <h5>นักศึกษา</h5> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#menu1"><h5>บุคลากร</h5> </a>
          </li>
    
        </ul> 
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <h3>Email</h3>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ไม่สามารถใช้งาน E-mail ได้</b> <br> <br>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ลืมรหัสผ่าน E-mail ควรทำอย่างไร</b> <br> <br>
            <h3>Internet</h3>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal3">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> เปลี่ยนหรือลืมรหัสผ่าน @KMUTNB by AIS หรือ @KMUTNB </b> <br> <br>
            <h3>ระบบสารสนเทศ</h3>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal4">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ลืมรหัสผ่านเข้าใช้งาน ICIT Account ควรทำอย่างไร </b> <br> <br>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> เข้าใช้งานระบบเพื่องานทะเบียนนักศึกษาไม่ได้ </b> <br> <br>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal6">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ลืมรหัสผ่านหรือไม่สามารถเข้าระบบการประเมินการสอนได้ต้องทำอย่างไร </b> <br> <br>
            <h3>ห้องบริการคอมพิวเตอร์ชั้น 3 มจพ.กรุงเทพ</h3>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal7">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ขั้นตอนการเข้าใช้งานเครื่องคอมพิวเตอร์ในห้องบริการ</b> <br> <br>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal8">
    <i class="fa fa-plus" style="font-size:25px"></i>
  </button><b> ขั้นตอนการใช้บริการงานพิมพ์ในห้องบริการ </b> <br> <br> <br>
  
 

  <!-- The Modal1 -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ไม่สามารถใช้งาน E-mail ได้</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p> มจพ. กรุงเทพ - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 3</p> 
           <p> มจพ. ระยอง - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 7 </p>
           <p> มจพ. ปราจีนบุรี - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารสิรินธร ชั้น 6</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- The Modal2 -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ลืมรหัสผ่าน E-mail ควรทำอย่างไร</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p> มจพ. กรุงเทพ - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 3</p> 
           <p> มจพ. ระยอง - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 7 </p>
           <p> มจพ. ปราจีนบุรี - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารสิรินธร ชั้น 6</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    <!-- The Modal3 -->
    <div class="modal fade" id="myModal3">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">เปลี่ยนหรือลืมรหัสผ่าน @KMUTNB by AIS หรือ @KMUTNB</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
               <p>ลืมรหัสผ่าน : ดำเนินการได้ที่ ICIT Acconut  <a href="https://account.kmutnb.ac.th/web/recovery/index">คลิก! </a> </p> 
               <p>เปลี่ยนรหัสผ่าน : ดำเนินการได้ที่ ICIT Acconut  <a href="https://account.kmutnb.ac.th/web/user/login">คลิก!</a> </p>
              
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
       <!-- The Modal4 -->
    <div class="modal fade" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ลืมรหัสผ่านเข้าใช้งาน ICIT Account ควรทำอย่างไร</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <p> สามารถดำเนินการกู้รหัสผ่านคืนได้ที่ <a href="https://account.kmutnb.ac.th/web/recovery/index">คลิก!</a></p> 
           
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
    </div>
    <!-- The Modal5 -->
    <div class="modal fade" id="myModal5">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">เข้าใช้งานระบบเพื่องานทะเบียนนักศึกษาไม่ได้ </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
               <p>ติดต่อเจ้าหน้าที่กองบริการนักศึกษา ชั้น 2 อาคาร TGGS</p> 
               
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
        </div>
        <!-- The Modal6 -->
    <div class="modal fade" id="myModal6">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">ลืมรหัสผ่านหรือไม่สามารถเข้าระบบการประเมินการสอนได้ต้องทำอย่างไร </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p> มจพ. กรุงเทพ - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 3</p> 
                <p> มจพ. ระยอง - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารอเนกประสงค์ ชั้น 7 </p>
                <p> มจพ. ปราจีนบุรี - ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่อาคารสิรินธร ชั้น 6</p>
               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
        </div>
        <!-- The Modal7 -->
    <div class="modal fade" id="myModal7">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">ขั้นตอนการเข้าใช้งานเครื่องคอมพิวเตอร์ในห้องบริการ </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <p>1. ตรวจสอบรหัสเข้าใช้งาน Wi-fi จากระบบสารสนเทศเพื่องานทะเบียนนักศึกษา <a href="http://klogic.kmutnb.ac.th:8080/kris/index.jsp">คลิก!</a></p>
                <p>2. นำรหัสดังกล่าวมาใช้ในการ login เข้าใช้งานเครื่องคอมพิวเตอร์ในห้องบริการคอมพิวเตอร์</p>
               
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
        </div>
        <!-- The Modal8 -->
    <div class="modal fade" id="myModal8">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">ขั้นตอนการใช้บริการงานพิมพ์ในห้องบริการ </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <p>1. Login เข้าใช้งานเครื่องคอมพิวเตอร์ในห้องบริการคอมพิวเตอร์</p>
                <p>2. ในการใช้บริการงานพิมพ์ครั้งแรกให้นำบัตรนักศึกษาติดต่อเจ้าหน้าที่ ณ จุดบริการ เพื่อลงทะเบียนบัตรเพื่อใช้งาน</p>
                <p>3. สั่งพิมพ์งานจากเครื่องคอมพิวเตอร์ที่ได้ login ไว้</p>
                <p>4. นำบัตรนักศึกษาที่ผ่านการลงทะเบียนบัตรแล้ว ไปรับงานพิมพ์ที่เครื่องพิมพ์</p>
               
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
        </div>

          </div>

 <!----------------------------------------------MENU1/---------------------------------------------->
          <div id="menu1" class="container tab-pane fade"><br>
            <h3>Email</h3>
            <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal9">
                <i class="fa fa-plus" style="font-size:25px"></i>
                </button><b> การขอใช้งานEmailครั้งแรก ลืมหรือแก้ไขรหัสผ่าน ควรทำอย่างไร</b> <br> <br>
            <h3>Internet</h3>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal10">
                  <i class="fa fa-plus" style="font-size:25px"></i>
                </button><b> เปลี่ยนหรือลืมรหัสผ่าน @KMUTNB by AIS หรือ @KMUTNB </b> <br> <br>
            <h3>ระบบสารสนเทศ</h3>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal11">
                  <i class="fa fa-plus" style="font-size:25px"></i>
                </button><b> ลืมรหัสผ่านเข้าใช้งาน ICIT Account  ควรทำอย่างไร </b> <br> <br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal12">
                    <i class="fa fa-plus" style="font-size:25px"></i>
                  </button><b> มีปัญหาการใช้งานระบบส่งเกรดออนไลน์ </b> <br> <br>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal13">
                    <i class="fa fa-plus" style="font-size:25px"></i>
                  </button><b> มีปัญหาการใช้งานระบบ 3 มิติ ควรทำอย่างไร </b> <br> <br>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal14">
                    <i class="fa fa-plus" style="font-size:25px"></i>
                  </button><b> จะติดตั้งระบบ 3 มิติ ควรทำอย่างไร </b> <br> <br>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal15">
                    <i class="fa fa-plus" style="font-size:25px"></i>
                  </button><b> เครื่องคอมพิวเตอร์มีปัญหา และขอติดตั้งโปรแกรมต่างๆ </b> <br> <br>
            <h3>ห้องบริการคอมพิวเตอร์ชั้้น 4 มจพ.กรุงเทพ</h3>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal16">
                    <i class="fa fa-plus" style="font-size:25px"></i>
                  </button><b> ต้องการใช้ห้องอบรมมีขั้นตอนอย่างไรบ้าง</b> <br> <br> <br>

                
                <!-- The Modal9 -->
                <div class="modal fade" id="myModal9">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">การขอใช้งานEmailครั้งแรก ลืมหรือแก้ไขรหัสผ่าน ควรทำอย่างไร</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div> 
                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>1. Email xxx@รหัสหน่วยงาน.kmutnb.ac.hth : ติดต่อเจ้าหน้าที่ที่ดูแลระบบของหน่วยงานตนเอง</p>
                            <p>2. Email xxx@kmutnb.ac.th : ดาวน์โหลดเอกสาร <a href="http://icit.kmutnb.ac.th/main/wp-content/uploads/2016/08/form_user_account_20150216.pdf">คลิก!</a> 
                                กรอกข้อมูลให้เรียบร้อยและนำส่งเอกสารตามวิทยาเขต</p>
                            <p>&nbsp;&nbsp;<strong> มจพ. กรุงเทพฯ :</strong> งานสารบรรณ สำนักคอมพิวเตอร์ฯ อาคารเนกประสงค์ ชั้น 5</p>
                            <p>&nbsp;&nbsp;<strong> มจพ. ปราจีนบุรี :</strong>  สำนักคอมพิวเตอร์ฯ อาคารสิรินธร ชั้น 6</p>
                            <p>&nbsp;&nbsp;<strong> มจพ. ระยอง :</strong> สำนักคอมพิวเตอร์ อาคารอเนกประสงค์ ชั้น 7</p>
                           
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                    </div>
                    <!-- The Modal10 -->
        <div class="modal fade" id="myModal10">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">เปลี่ยนหรือลืมรหัสผ่าน @KMUTNB by AIS หรือ @KMUTNB</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
               <p>ลืมรหัสผ่าน : ดำเนินการได้ที่ ICIT Acconut  <a href="https://account.kmutnb.ac.th/web/recovery/index">คลิก! </a> </p> 
               <p>เปลี่ยนรหัสผ่าน : ดำเนินการได้ที่ ICIT Acconut  <a href="https://account.kmutnb.ac.th/web/user/login">คลิก!</a> </p>
              
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
                 <!-- The Modal11 -->
    <div class="modal fade" id="myModal11">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">ลืมรหัสผ่านเข้าใช้งาน ICIT Account ควรทำอย่างไร</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
               <p> สามารถดำเนินการกู้รหัสผ่านคืนได้ที่ <a href="https://account.kmutnb.ac.th/web/recovery/index">คลิก!</a></p> 
               
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> 
          </div>
        </div>
        </div>
 <!-- The Modal12 -->
 <div class="modal fade" id="myModal12">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">มีปัญหาการใช้งานระบบส่งเกรดออนไลน์</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
           <p> ติดต่อคุณไข่มุก สรรพวุธ โทร 2213</p>     
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
         <!-- The Modal13 -->
 <div class="modal fade" id="myModal13">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> มีปัญหาการใช้งานระบบ 3 มิติ ควรทำอย่างไร</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
           <p>ดาวน์โหลดแบบฟอร์มแบบบันทึกรายการแก้ไขข้อมูล/โปรแกรม 3 มิติ <a href="https://goo.gl/t3PTN8">คลิก!</a> 
            โดยทำการกรอกข้อมูลให้เรียบร้อย และนำส่งเอกสารตามวิทยาเขต</p>    
            <p>&nbsp;&nbsp;<strong> มจพ. กรุงเทพฯ :</strong> งานสารบรรณ สำนักคอมพิวเตอร์ฯ อาคารเนกประสงค์ ชั้น 5</p>
            <p>&nbsp;&nbsp;<strong> มจพ. ปราจีนบุรี :</strong>  สำนักคอมพิวเตอร์ฯ อาคารสิรินธร ชั้น 6</p>
            <p>&nbsp;&nbsp;<strong> มจพ. ระยอง :</strong> สำนักคอมพิวเตอร์ อาคารอเนกประสงค์ ชั้น 7</p>
 
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <!-- The Modal14 -->
 <div class="modal fade" id="myModal14">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> จะติดตั้งระบบ 3 มิติ ควรทำอย่างไร</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <p><strong> มจพ. กรุงเทพฯ :</strong> ติดต่อ คุณพีรธัช หนูชู โทร 2209</p>
            <p><strong>มจพ. ปราจีนบุรี :</strong> ติดต่อเจ้าหน้าที่สำนักคอมพิวเตอร์ฯ ได้ที่ชั้น 6 อาคารสิรินธร โทร. 7324</p>
            <p><strong> มจพ. ระยอง :</strong>  ติดต่อคุณพนพล วรนุช หรือ คุณนิภัทร์ สุวรรณ ได้ที่สำนักคอมพิวเตอร์ฯ อาคารอเนกประสงค์ ชั้น 7</p>
 
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
        <!-- The Modal15 -->
 <div class="modal fade" id="myModal15">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> เครื่องคอมพิวเตอร์มีปัญหหา และขอติดตั้งโปรแกรมต่างๆ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <p><strong> มจพ. กรุงเทพฯ :</strong>สำนักงานอธิการบดี  โทรแจ้งปัญหาได้ที่เบอร์ 2210 โดยไม่มีค่าใช้จ่าย (ไม่ใช่เครื่องส่วนตัว) หากเป็นหน่วยงานอื่นติดต่อได้ที่หน่วยงานของตัวเอง สำหรับบุคลากรที่มีคอมพิวเตอร์ส่วนตัวสามารถใช้บริการของ IT Clinic ที่อาคารอเนกประสงค์ ชั้น 3  โดยมีค่าใช้จ่าย</p>
            <p><strong>มจพ. ปราจีนบุรี :</strong>สำนักงานอธิการบดี สามารถติดต่อได้ที่อาคารสิรินธร ชั้น 6  โทร. 7324 </p>
            <p><strong> มจพ. ระยอง :</strong>ติดต่อคุณพนพล วรนุช หรือ คุณนิภัทร์ สุวรรณ ได้ที่สำนักคอมพิวเตอร์ฯ อาคารอเนกประสงค์ ชั้น 7</p>
 
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
            <!-- The Modal16 -->
 <div class="modal fade" id="myModal16">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> ต้องการใช้ห้องอบรมมีขั้นตอนอย่างไรบ้าง</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <p>1. ตรวจสอบสถานะห้องอบรม <a href="http://e-room.icit.kmutnb.ac.th/reserv/">คลิก!</a></p>
            <p>2. ทำบันทึกเพื่อขอใช้ห้องเพื่อจัดอบรม มายังสำนักคอมพิวเตอร์</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>

            

          </div>    
        </div>
      </div>

  
</div>


  
  <script>
  $(document).ready(function(){
    $(".nav-tabs a").click(function(){
      $(this).tab('show');
    });
  });
  </script>


@endsection
@section('script')

@endsection
