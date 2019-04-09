<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('migrate',function(){
    return Artisan::call('migrate');
});
Route::get('qr', function () {

    \QrCode::size(500)

              ->format('png')

              ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));



    return view('qrCode');



  });
//หน้าแรก
Route::get('/', function () {
    return view('welcome');
});
//ระบบสมาชิก
Auth::routes();
Auth::routes(['verify' => true]);
//เกี่ยวกับบ
Route::get('/about',function(){
    return view('front.about');
});
//โปรไฟล์
Route::get('/profile','UsersController@profileLoader');
//บริการนักเรียน
Route::get('/student',function(){
    return view('front.student');
});
//บริการนักเรียน
Route::get('/insider',function(){
    return view('front.insider');
});
//บริการคนภายนอก
Route::get('/outsider',function(){
    return view('front.outsider');
});
//คำถามที่พบบ่อย
Route::get('/faq',function(){
    return view('front.faq');
});
//หน้าติดต่อ
Route::get('/contact',function(){
    return view('front.contact');
});
//แก้ไขการจอง
Route::get('issues/update/{id}','ReportController@viewIssue');
Route::get('book/update/{id}','ServiceController@timeEdit');
//การจอง
Route::resource('/book','ServiceController');
//หน้าอะไรวะ
Route::get('/home', 'HomeController@index')->name('home');
//หน้ารายงาน
Route::resource('report', 'ReportController');
//โหลดหัวข้อย่อย
Route::get('ajax/subcategory','ReportController@action')->name('me.action');
//โหลดเวลา
Route::get('ajax/time','ServiceController@getTime')->name('timelist.action');


//ทดสอบตัวเปลี่ยนภาษา
Route::get('lang',function(){
    return view('langtest');
});
Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return Redirect::back();
});

//ค้นหาหมายเลขร้องเรียน
Route::get('search/',function(){
    return view('front.search');
});
Route::get('search/{id}','SearchController@index');

//ADMIN

Route::get('/admin/index', 'AdminPanelController@indexAdmin')->middleware('AdminPanel'); //Admon & member clasa
Route::resource('/admin/result', 'resultController')->middleware('AdminPanel'); //Admon & member clasa


Route::get('/admin/itclinic/cancel/{id}','AdminITController@delApp')->middleware('AdminPanel');;
Route::resource('/admin/itpanel', 'AdminITController')->middleware('AdminPanel');


Route::resource('/admin/itclinic/service', 'ServiceTypeController')->middleware('AdminCheck');
Route::resource('/admin/itclinic/time', 'ServiceTimeController')->middleware('AdminCheck');


Route::resource('/admin/appointment', 'WorklistController')->middleware('AdminPanel');
Route::resource('/admin/tracking', 'trackingController')->middleware('AdminPanel');



Route::get('/admin/list/{rhid}/issues/{issueid}/picid/{picid}', 'BossListController@Appointment')->middleware('AdminPanel');
Route::resource('/admin/list', 'BossListController')->middleware('AdminPanel');

Route::resource('/admin/category', 'CategoryController')->middleware('AdminCheck');
Route::resource('/admin/user', 'UsersController')->middleware('AdminCheck');
Route::resource('/admin/campus', 'CampusController')->middleware('AdminCheck');
Route::resource('/admin/subcategory', 'SubCategoryController')->middleware('AdminCheck');
Route::resource('/admin/position', 'PositionController')->middleware('AdminCheck');

Route::get('ajax/rit','AdminITController@realList')->name('me.rit')->middleware('AdminPanel');
Route::get('ajax/it','AdminITController@getList')->name('me.it')->middleware('AdminPanel');

Route::get('ajax/delcampus','CampusController@delCampus')->name('campus.del')->middleware('AdminCheck');
Route::get('ajax/editcampus','CampusController@editCampus')->name('campus.edit')->middleware('AdminCheck');

Route::get('ajax/delcategory','CategoryController@delCategory')->name('me.del')->middleware('AdminCheck');
Route::get('ajax/staff','BossListController@staffList')->name('me.staff')->middleware('AdminPanel');

Route::get('ajax/realtime','BossListController@realList')->name('real.list')->middleware('AdminPanel');
Route::get('ajax/realtime2','BossListController@realworkList')->name('real.list2')->middleware('AdminPanel');


Route::get('ajax/position','UsersController@getPosition')->name('me.position')->middleware('AdminCheck');

Route::get('position/edit/{id}', 'PositionController@editElement')->middleware('AdminCheck');
Route::post('edit/position', 'PositionController@editPosition')->name('edit.position')->middleware('AdminCheck');

Route::get('category/edit/{id}', 'CategoryController@editElement')->middleware('AdminCheck');
Route::post('edit/category', 'CategoryController@editCategory')->name('edit.category')->middleware('AdminCheck');
Route::get('user/edit/{id}', 'UsersController@editElement')->middleware('AdminCheck');
Route::post('edit/user', 'UsersController@editUser')->name('edit.user')->middleware('AdminCheck');

Route::post('edit/servicetype', 'ServiceTypeController@editServicetype')->name('edit.user')->middleware('AdminCheck');
Route::get('servicetype/edit/{id}', 'ServiceTypeController@editService')->middleware('AdminCheck');

Route::get('admin/setting','AdminPanelController@index')->middleware('AdminCheck');

Route::get('set/statusonduty/{id}','BossListController@onDuty')->middleware('AdminPanel');
Route::post('set/statusondone','BossListController@onDone')->middleware('AdminPanel');

Route::get('submit/report/{id}','BossListController@reportElement')->middleware('AdminPanel');

Route::get('reject/report/{id}','BossListController@rejectElement')->middleware('AdminPanel');
Route::post('set/statusreject','BossListController@reject')->middleware('AdminPanel');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
