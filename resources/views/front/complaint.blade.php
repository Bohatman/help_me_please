@extends('layouts.new')
@section('title', 'Complaint page')
@section('content')
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<br><br>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home"><b style="color:#4169E1" >รายงานปัญหา</b></a></li>
        <li><a data-toggle="tab" href="#menu1"><b style="color:#00CD00">ตรวจสอบสถานะ</b></a></li>
      </ul>
    <div class="tab-content">
       <!-- report form-->
    <div id="home" class="tab-pane fade in active">

   <div class="container">
      <br><br>
        <div class="col-md-10">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">ชื่อ: </label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="fName" placeholder="ชื่อผู้เเจ้ง" name="fName">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">นามสกุล: </label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="lName" placeholder="นามสกุลผู้เเจ้ง" name="flName">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>
            <br><br>
            <label for ="person" class="control-label col-sm-2" >ประเภท:
            </label>
                <label class="radio-inline">
                    <input type="radio" name="person" value="" checked>บุคคลทั่วไป
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="person" value="">นักศึกษา
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="person" value="">บุคลากรของมหาวิทยาลัย
                  </label>

            <br><br>
            <label for ="select" class="control-label col-sm-2" >ประเภทของปัญหา:
            </label>
            <div class="col-sm-10">
                    <select class="form-control" id="select"  name="problem">
                    <option value="">ปัญหาการใช้งานเครือข่ายแบบไร้สาย (Wireless) </option>
                    <option value="">ปัญหาการใช้งานเครือข่ายแบบใช้สาย (LAN)</option>
                    <option value="">ปัญหาการใช้งาน VPN</option>
                    <option value="">ปัญหาการใช้งาน Dream Spark/Microsoft Imagine X</option>
                    <option value="">ปัญหาการใช้งาน Office 365</option>
                    <option value="">ปัญหาการใช้งานด้านอีเมล์ (E-mail)</option>
                    <option value="">ปัญหาการใช้งานGoogle App for Education</option>
                    <option value="">ระบบประเมินการสอน</option>
                    <option value="">อื่นๆ</option>
                    </select>
            </div>
            <br><br><br>
            <div class="form-group">
                    <label for ="detail" class="control-label col-sm-2" >รายละเอียด:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="detail" rows="4" placeholder="รายละเอียดของปัญหา"></textarea>
                    </div>
            </div>
            <br><br><br><br><br>
            <div class="form-group">
                    <label class="control-label col-sm-2" for="email">อาคาร:</label>
                        <div class="col-sm-5">
                        <input type="email" class="form-control" id="building" placeholder="อาคาร" name="building">
                        </div>
                        <label class="control-label col-sm-1" for="email">ห้อง:</label>
                        <div class="col-sm-4">
                        <input type="email" class="form-control" id="room" placeholder="ห้อง" name="room">
                        </div>
            </div>
            <br><br>
            <label for ="place" class="control-label col-sm-2" >วิทยาเขต:
                </label>
                <div class="col-sm-10">
                        <select class="form-control" id="place"  name="place">
                        <option value="">กรุงเทพฯ </option>
                        <option value="">ระยอง</option>
                        <option value="">ปราจีนบุรี</option>
                        </select>
                </div>
              <br><br><br>
            <div class="form-group">
                    <label class="control-label col-sm-2" for="email">แนบภาพ:</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="photo" type="file" name="photo">
                    </div>
            </div>
            <br><br>
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-10">
                <button type="button" class="btn btn-success "><span class="glyphicon glyphicon-save"></span> บันทึก</button>
              </div>
            </div>

            <br><br>
        </div>
        </div>

        <div class="col-md-1"></div>
   </div>
   <!-- /report form-->

   <!-- search form-->
    <div id="menu1" class="tab-pane fade">
        <div class="container">
            <br><br>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">รหัสปัญหา:</label>
                    <div class="col-md-8">
                    <input type="email" class="form-control" id="problemId" placeholder="รหัสของปัญหาที่เเจ้ง" name="problemId">
                </div>
            </div>

            <br><br>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">QR Code:</label>
                <div class="col-md-8">
                    <input class="form-control" id="photo" type="file" name="photo">
                </div>
        </div>
        <br><br>
          <div class="form-group">
            <label class="control-label col-sm-2"></label>
            <div class="col-sm-10">
              <button type="button" class="btn btn-success "><span class="glyphicon glyphicon-search"></span> ตรวจสอบ</button>
            </div>
          </div>
          <br><br>
        </div>
    </div>
    <!-- /search form-->
  </div>
@endsection
@section('script')
@endsection
