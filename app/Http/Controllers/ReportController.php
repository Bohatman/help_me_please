<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DB;
use Illuminate\Support\Facades\Storage;
use App\complaint;
use App\issue;
use App\guest;
use App\campus;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::select('category_id',"category_name")->where('category_id','!=',0)->get();
        $campus = campus::get();
        //return dd($category);
        return view('report.report',['category'=>$category,
            'campus' => $campus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if($request->get('category')==-1){
            $error = ['ข้อผิดพลาดของระบบ', 'ระบบไม่พร้อมใช้งาน'];
            return redirect()->back()->withErrors($error);
        }
        $IPv4 = $request->get('IPv4');
        $category_id = $request->get('category');
        $sub_category_id = $request->get('subcategory');
        $detail = $request->get('detail');
        $building = $request->get('building');
        if(is_null($building)){
            $building=-1;
        }
        $room = $request->get('room');
        if(is_null($room)){
            $room=-1;
        }
        $usertype = $request->get('usertype');
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $email = $request->get('email');
        $campus_id = $request->get('campus');
        if($usertype==1){
            $image = $request->file('images');
            if(!is_null($image)){
            $belonging ='user/picture/'.$request->get('UID');
            $path = $image->store($belonging,'public');
            $url = Storage::url($path);
            }
            else{
                $url=-1;
            }
            $issue = new issue([
                'category_id'    => $category_id,
                'sub_category_id' => $sub_category_id,
                'detail'          => $detail,
                'picture'         => $url,
                'building'        => $building,
                'room'           => $room,
                'campus_id' => $campus_id

            ]);
            $issue->save();
            $complaint = new complaint([
                'issues_id' => $issue->issues_id,
                'usertype' => 1,
                'UID' => $request->get('UID'),
                'category_id'    => $category_id,
                'IPv4'=> $IPv4,
            ]);
            $complaint->save();
        }
        elseif($usertype==2){
            $image = $request->file('images');
            if(!is_null($image)){
            $belonging ='staff/picture/'.$request->get('UID');
            $path = $image->store($belonging,'public');
            $url = Storage::url($path);
            }
            else{
                $url=-1;
            }
            $issue = new issue([
                'category_id'    => $category_id,
                'sub_category_id' => $sub_category_id,
                'detail'          => $detail,
                'picture'         => $url,
                'room'            => $room,
                'building'        => $building,
                'campus_id' => $campus_id

            ]);
            $issue->save();
            $complaint = new complaint([
                'issues_id' => $issue->issues_id,
                'usertype' => 2,
                'category_id'    => $category_id,
                'UID' => $request->get('UID'),
                'IPv4'=> $IPv4,
            ]);
            $complaint->save();
        }
        elseif($usertype==0){
            $image = $request->file('images');
            if(!is_null($image)){
            $belonging ='staff/picture/'.$request->get('UID');
            $path = $image->store($belonging,'public');
            $url = Storage::url($path);
            }
            else{
                $url=-1;
            }
            $issue = new issue([
                'category_id'    => $category_id,
                'sub_category_id' => $sub_category_id,
                'detail'          => $detail,
                'picture'         => $url,
                'room'            => $room,
                'building'        => $building,
                'campus_id' => $campus_id

            ]);
            $issue->save();
            $complaint = new complaint([
                'issues_id' => $issue->issues_id,
                'usertype' => 0,
                'category_id'    => $category_id,
                'UID' => $request->get('UID'),
                'IPv4'=> $IPv4,
            ]);
            $complaint->save();
        }
        else{
            $guest = new guest([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email
            ]);
            $guest->save();
            $image = $request->file('images');
        if(!is_null($image)){
        $belonging ='guest/picture/'.$guest->guest_id;
        $path = $image->store($belonging,'public');
        $url = Storage::url($path);
        }
        else{
            $url=-1;
        }
            $issue = new issue([
                'category_id'    => $category_id,
                'sub_category_id' => $sub_category_id,
                'detail'          => $detail,
                'picture'         => $url,
                'room'            => $room,
                'building'        => $building,
                'campus_id' => $campus_id

            ]);
            $issue->save();
        $complaint = new complaint([
            'issues_id' => $issue->issues_id,
            'category_id'    => $category_id,
            'usertype' => 3,
            'guest_id' => $guest->guest_id,
            'IPv4'=> $IPv4,
        ]);
        $complaint->save();
        }
        return redirect()->to(url('search/'.$issue->issues_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->get('category')==-1){
            $error = ['ข้อผิดพลาดของระบบ', 'ระบบไม่พร้อมใช้งาน'];
            return redirect()->back()->withErrors($error);
        }
        $IPv4 = $request->get('IPv4');
        $category_id = $request->get('category');
        $sub_category_id = $request->get('subcategory');
        $detail = $request->get('detail');
        $building = $request->get('building');
        if(is_null($building)){
            $building=-1;
        }
        $room = $request->get('room');
        if(is_null($room)){
            $room=-1;
        }
        $image = $request->file('images');
            if(!is_null($image)){
            $belonging ='user/picture/'.$request->get('UID');
            $path = $image->store($belonging,'public');
            $url = Storage::url($path);
            }
            else{
                $url=-1;
            }
        $usertype = $request->get('usertype');
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $email = $request->get('email');
        $campus_id = $request->get('campus');

        $complaints = complaint::find($id);
        $issues = issue::find($id);
        $issues->category_id = $category_id;
        $issues->sub_category_id =$sub_category_id;
        $issues->detail = $detail;
        $issues->campus_id = $campus_id;
        $issues->building = $building;
        $issues->room = $room;
        $issues->picture = $url;
        $complaints->category_id = $category_id;
        $issues->save();
        $complaints->save();
        return redirect()->to(url('/profile'))->with('success','แก้ไขเสร็จสิ้น');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function action(Request $request){
        if($request->ajax()){
            $output='';
            $result=$request->get('query');
            if($result != ''){
                    $data=DB::table('sub_categories')
                            ->where('category_id','=',$result)->get();
            }else{
                $data=DB::table('sub_categories')->get();
            }
            $total_row=$data->count();
            if($total_row>0){
                foreach ($data as $row) {
                        $output.='<option value="'.$row->sub_category_id.'">'.$row->sub_category_name.'</option>';
                }
                $output.='';
             }else{
                $output='<option value="-1">ไม่มีหัวข้อย่อย</option>';
             }
             $data=array('html_1'=>$output ,'total_data'=>$total_row);
             echo json_encode($data);
        }
    }
    public function viewIssue($id){
        if(Auth::check()){
        if(!complaint::where('issues_id','=',$id)->exists()){
            return redirect()->to(url('/profile'))->with('error','ไม่พบหัวข้อ');
        }
        $detail = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser','getReport','getReport.getRP','getPIC','getRH')->find($id);
        if($detail->UID != Auth::user()->UID || Auth::user()->usertype == 0 ){
            return redirect()->to(url('/profile'))->with('error','คุณไม่มีสิทธิในการเข้าถึง');
        }
        if($detail->status != 0){
            return redirect()->to(url('/profile'))->with('error','ไม่สามารถแก้ไขได้');
        }
        $category = category::select('category_id',"category_name")->where('category_id','!=',0)->get();
        $campus = campus::get();
        //return dd($category);
        return view('front.edit.report',['category'=>$category,
            'campus' => $campus,'detail'=>$detail
        ]);
    }else{
        return redirect()->to(url('/login'));
    }
    }

}
