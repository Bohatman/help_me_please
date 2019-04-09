<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\complaint;
use DB;
use Illuminate\Support\Facades\Auth;
use App\workreport;
use App\priorityjob;
class BossListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Auth
        if(Auth::check()) {
            $user = Auth::user();
            $admin = false;
            if($user->usertype == 0){
                $admin = true;
            }
            if($user->position_id==-1 && !$admin ){
                return redirect()->route('login');
            }
        if($user->usertype==0){
            $where = [
                ['PIC_ID','=',-1],
                ['RH_ID','=',-1],
            ];}
        else{
            $position = DB::table('positions')->where('position_id','=',$user->position_id)->get();
            if($position[0]->priority_level == 2 && !$admin){
                if(Auth::check()) {
                    $user = Auth::user();
                    $admin = false;
                    if($user->usertype == 0){
                        $admin = true;
                    }
                    if($user->position_id == -1 && !$admin){
                        return redirect()->route('login');
                    }
                    if($user->usertype==0){
                        $where = [
                            ['PIC_ID','!=',-1],
                            ['RH_ID','!=',-1],
                            ['status','!=',3],
                            ['status','!=',4],
                        ];}
                    else{
                        $position = DB::table('positions')->where('position_id','=',$user->position_id)->get();
                        if($position[0]->priority_level =! 2 && !$admin){
                            return redirect()->route('login');
                        }
                    $where = [
                        ['PIC_ID','=',$user->UID],
                        ['status','!=',3],
                        ['status','!=',4],
                    ];}
                    $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->paginate(10);
                    $count = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->count();
                    return view('admin.list.worklist',['complaint' => $complaint,'count' => $count]);
                }else{
                    return redirect()->route('login');
                }
            }
        $where = [
            ['PIC_ID','=',-1],
            ['RH_ID','=',-1],
            ['category_id','=',$position[0]->category_id],
            ['status','!=',3],
            ['status','!=',4],
        ];}
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->paginate(10);
        $count = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->count();
        return view('admin.list.list',['complaint' => $complaint,'count' => $count]);
    }else{
        return redirect()->route('login');
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('issues_id','=',$id)->exists()){
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser','getPIC','getRH')->where('issues_id','=',$id)->first();
        return view('admin.list.info',['complaint' => $complaint]);
        }
        else{
            return view('admin.list.list');
        }
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
        //
    }
    public function Appointment($rhid,$issueid,$picid){
        if(is_null($rhid) || is_null($issueid) || is_null($picid)){
            return redirect()->route('list.index');
        }
        if(complaint::where([['issues_id','=',$issueid],
                                ['PIC_ID','=',-1]
        ])->exists()){
            $complaint = complaint::find($issueid);
            $complaint->RH_ID = $rhid;
            $complaint->PIC_ID = $picid;
            $complaint->status = 1;
            $complaint->save();
            return redirect()->route('list.index')->with('success', 'มอบหมายงานเรียบร้อย');
        }

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
    public function reject(Request $request){
        $validatedData = $request->validate([
            'report' => 'required|max:255',
            'RP_ID' => 'required',
            'issues_id' => 'required',
        ]);
        if(workreport::where('issues_id','=',$request->get('issues_id'))->exists()){
            return redirect()->route('list.index')->with('error', 'การดำเนินการผิดพลาด');
        }
        if(complaint::find($request->get('issues_id'))->exists()){
            $complaint = complaint::find($request->get('issues_id'));
            $complaint->status = 4;
            if($complaint->PIC_ID == -1){
                $complaint->PIC_ID = Auth::user()->UID;
            }
            if($complaint->RH_ID == -1){
                $complaint->RH_ID = Auth::user()->UID;
            }
            $workreport = new workreport([
                'issues_id' => $request->get('issues_id'),
                'report'=> $request->get('report'),
                'RP_ID'=> $request->get('RP_ID'),
            ]);
            $workreport->save();
            $complaint->save();
            if(priorityjob::where('issues_id','=',$request->get('issues_id'))->exists()){
                $priorityjob=priorityjob::find($request->get('issues_id'));
                $priorityjob->delete();
            }
            return redirect()->route('list.index')->with('success', 'ดำเนินการเสร็จสิ้น');
        }
        return redirect()->route('list.index')->with('error', 'หาข้อมูลไม่เจอ');
    }
    public function reportElement($id){
        if(workreport::where('issues_id','=',$id)->exists()){
            return redirect()->route('list.index')->with('error', 'การดำเนินการผิดพลาด');
        }
        if(complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('issues_id','=',$id)->exists()){
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('issues_id','=',$id)->first();
            return view('admin.list.done',['complaint' => $complaint]);
            }
            else{
                return view('admin.list.list')->with('error', 'หาข้อมูลไม่เจอ');
        }
    }
    public function rejectElement($id){
        if(workreport::where('issues_id','=',$id)->exists()){
            return redirect()->route('list.index')->with('error', 'การดำเนินการผิดพลาด');
        }
        if(complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('issues_id','=',$id)->exists()){
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('issues_id','=',$id)->first();
            return view('admin.list.reject',['complaint' => $complaint]);
            }
            else{
                return view('admin.list.list')->with('error', 'หาข้อมูลไม่เจอ');
        }
    }
    public function onDuty($id){
        if(workreport::where('issues_id','=',$id)->exists()){
            return redirect()->route('list.index')->with('error', 'การดำเนินการผิดพลาด');
        }
        if(complaint::find($id)->exists()){
            $complaint = complaint::find($id);
            $complaint->status = 2;
            $complaint->save();
            return redirect()->route('list.index')->with('success', 'เปลี่ยนสถานะการทำงานเสร็จสิ้น');
        }
        return redirect()->route('list.index')->with('error', 'หาข้อมูลไม่เจอ');
    }
    public function onDone(Request $request){
        if(workreport::where('issues_id','=',$request->get('issues_id'))->exists()){
            return redirect()->route('list.index')->with('error', 'การดำเนินการผิดพลาด');
        }
        $validatedData = $request->validate([
            'report' => 'required|max:255',
            'RP_ID' => 'required',
            'issues_id' => 'required',
        ]);
        if(complaint::find($request->get('issues_id'))->exists()){
            $complaint = complaint::find($request->get('issues_id'));
            $complaint->status = 3;
            if($complaint->PIC_ID == -1){
                $complaint->PIC_ID = Auth::user()->UID;
            }
            if($complaint->RH_ID == -1){
                $complaint->RH_ID = Auth::user()->UID;
            }
            $workreport = new workreport([
                'issues_id' => $request->get('issues_id'),
                'report'=> $request->get('report'),
                'RP_ID'=> $request->get('RP_ID'),

            ]);
            $workreport->save();
            $complaint->save();
            if(priorityjob::where('issues_id','=',$request->get('issues_id'))->exists()){
                $priorityjob=priorityjob::find($request->get('issues_id'));
                $priorityjob->delete();
            }
            return redirect()->route('list.index')->with('success', 'ดำเนินการเสร็จสิ้น');
        }
        return redirect()->route('list.index')->with('error', 'หาข้อมูลไม่เจอ');
    }
    public function staffList(Request $request){
        if($request->ajax()){
            $category_id=$request->get('query');
            $output='';
            $getPosition=DB::table('positions')->where([
                ['category_id','=',$category_id],
                ['priority_level','=',2]
                ])->get();
            if(count($getPosition)>0){
                foreach($getPosition as $position){
                    $person = DB::table('users')->where('position_id','=',$position->position_id)->get();
                    if(count($person)>0){
                        foreach($person as $id){
                            $output .= '<option value="'.$id->UID.'">'.$id->fname.'('.$position->position_name.')</option>';
                        }
                    }
                }
            }
            if(empty($output)){
                $output = '<option value="-1">ไม่พบข้อมูล</option>';
            }
            $data=array('html_1'=>$output);
            echo json_encode($data);
        }
    }
    public function realList(Request $request){
        if($request->ajax()){
            $usertype2 = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
            $count=$request->get('allcount');
            $usertype = $request->get('usertype');
            $category_id = $request->get('category_id');
            if($usertype == 0){
                //admin
                $where = [
                    ['PIC_ID','=',-1],
                    ['RH_ID','=',-1],
                ];

            }else{
                //Other
                $where = [
                    ['PIC_ID','=',-1],
                    ['RH_ID','=',-1],
                    ['category_id','=',$category_id],
                    ['status','!=',3],
                    ['status','!=',4],
                ];
            }
            if(complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->count() > $count){
                $item = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->orderBy('issues_id', 'desc')->first();
                $output = '<tr>'
                .'<td style="text-align: center">'.$item->issues_id.'</td>'
                .'<td style="text-align: center">'.$item->getList->getCampus->campus_name.'</td>'
                .'<td style="text-align: center">'.$item->getList->getCategory->category_name.'</td>';
                if(!is_null($item->getList->getSubCategory)){
                    $output .= '<td style="text-align: center">'.$item->getList->getSubCategory->sub_category_name.'</td>';}
                else{
                    $output .= '<td style="text-align: center">none</td>';
                }
                    $output .= '<td style="text-align: center">'.$usertype2[$item->usertype].'</td>';
                    if($item->usertype == 3){
                        $output .= '<td style="text-align: center"'.$item->getGuest->fname.'</td>';}
                        else{
                        $output .= '<td style="text-align: center">'.$item->getUser->fname.'</td>';
                    }
                    $output .= '<td>'
                    .'<div class="form-group">'
                    .'<select class="form-control" name="PIC[]" id="select-'.$item->issues_id.'">'
                    .'<option value = "-1">เลือกผู้ดูแล</option>'
                    .'</select></div></td>'
                    .'<td style="text-align:center">'
                    .'<div class="btn-group">'
                    .'<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">จัดการ <span class="caret"></span></button>'
                    .'<ul class="dropdown-menu" role="menu">'
                    .'<li><a class="dropdown-item" onclick="sentAPP('.$item->issues_id.','.Auth::user()->UID.')">มอบงาน</a></li>'
                    .'<li><a href="'.url('submit/report/'.$item->issues_id).'">ดำเนินการเสร็จสิ้น</a></li>'
                    .'<li><a href="'.url('reject/report/'.$item->issues_id).'">ยกเลิกคำร้องเรียน</a></li>'
                    .'<li><a target="_blank" class="dropdown-item" href="'.url('/admin/list/'.$item->issues_id).'">รายละเอียด</a></li>'
                    .'</ul></div></td></tr>';
                    $issues_id = $item->issues_id;
                    $category_id = $item->getList->category_id;

            }else{
                $output="-1";
                $issues_id = -1;
                $category_id = -1;
            }
            $data=array('html_1'=>$output,'category_id' => $category_id,'issues_id' => $issues_id);
            echo json_encode($data);
        }
    }
    public function realworkList(Request $request){
        if($request->ajax()){
            $usertype2 = array( "ผู้ดูแลระบบ", "นักศึกษา", "บุคลากร","บุคคลภายนอก");
            $status = array( "ยังไม่รับเรื่อง", "รับเรื่องแล้ว","กำลังดำเนินการ", "เสร็จสิ้น","ยกเลิก");
            $color = array( "default", "info",'warning', "success","danger");
            $count=$request->get('allcount');
            $usertype = $request->get('usertype');
            $category_id = $request->get('category_id');
            if($usertype == 0){
                //admin
                $where = [
                    ['PIC_ID','!=',-1],
                    ['RH_ID','!=',-1],
                    ['status','!=',3],
                    ['status','!=',4],
                ];

            }else{
                //Other
                $where = [
                    ['PIC_ID','=',Auth::user()->UID],
                    ['status','!=',3],
                    ['status','!=',4],
                ];
            }
            if(complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->count() > $count){
                $item = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->orderBy('issues_id', 'desc')->first();
                $output = '<tr>'
                .'<td style="text-align: center">'.$item->issues_id.'</td>'
                .'<td style="text-align: center">'.$item->getList->getCampus->campus_name.'</td>'
                .'<td style="text-align: center">'.$item->getList->getCategory->category_name.'</td>';
                if(!is_null($item->getList->getSubCategory)){
                    $output .= '<td style="text-align: center">'.$item->getList->getSubCategory->sub_category_name.'</td>';}
                else{
                    $output .= '<td style="text-align: center">none</td>';
                }
                    $output .= '<td style="text-align: center">'.$usertype2[$item->usertype].'</td>';
                    if($item->usertype == 3){
                        $output .= '<td style="text-align: center"'.$item->getGuest->fname.'</td>';}
                        else{
                        $output .= '<td style="text-align: center">'.$item->getUser->fname.'</td>';
                    }
                    $output .= '<td style="text-align: center">'
                    .'<span class="label label-'.$color[$item->status].'">'.$status[$item->status].'</span>'
                    .'</td>'
                    .'<td style="text-align:center">'
                    .'<div class="btn-group">'
                    .'<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">'
                    .'จัดการ <span class="caret"></span></button>'
                    .'<ul class="dropdown-menu" role="menu">'
                    .'<li><a target="_blank" class="dropdown-item" href="'.url('/admin/list/'.$item->issues_id).'">รายละเอียด</a></li>'
                    .'<li><a href="'. url('set/statusonduty/'.$item->issues_id) .'">กำลังดำเนินการ</a></li>'
                    .'<li><a href="'. url('submit/report/'.$item->issues_id) .'">ดำเนินการเสร็จสิ้น</a></li>'
                    .'<li><a href="'.url('reject/report/'.$item->issues_id).'">ยกเลิกคำร้องเรียน</a></li>'
                    .'</ul></div></td></tr>';
                    $issues_id = $item->issues_id;
                    $category_id = $item->getList->category_id;

            }else{
                $output="-1";
                $issues_id = -1;
                $category_id = -1;
            }
            $data=array('html_1'=>$output,'category_id' => $category_id,'issues_id' => $issues_id);
            echo json_encode($data);
        }
    }
}
