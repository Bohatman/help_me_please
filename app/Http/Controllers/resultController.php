<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\complaint;
use DB;
use Illuminate\Support\Facades\Auth;

class resultController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $admin = false;
            if($user->usertype == 0){
                $admin = true;
            }
            if($user->position_id==-1 && !$admin ){
                return redirect()->route('login');
            }
            //
            if($user->usertype==0){
                // ดักแอดมิน
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where('status','=',3)->orWhere('status','=',4)->paginate(15);
            return view('admin.list.resultheader',['complaint' => $complaint]);
        }
        else{
        $position = DB::table('positions')->where('position_id','=',$user->position_id)->get();
            if($position[0]->priority_level == 2){
                //หนักงาน
                $where = [
                    ['PIC_ID','=',$user->UID],
                    ['status','=',3],
            ];
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->orWhere('status','=',4)->paginate(15);
            return view('admin.list.resultstaff',['complaint' => $complaint]);
            }elseif($position[0]->priority_level == 1){
                // หัวหน้า
                $where = [
                    ['RH_ID','=',$user->UID],
                    ['status','=',3],
            ];
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->orWhere('status','=',4)->paginate(15);
            return view('admin.list.resultheader',['complaint' => $complaint]);
            }else{
                return redirect()->route('login');
            }
        }


        }
    }
    public function show($id){
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser','getReport','getReport.getRP')->find($id);
        if(is_null($complaint->getReport)){
            return redirect()->route('result.index');
        }
        if(Auth::check()){
            $user = Auth::user();
            $admin = false;
            if($user->usertype == 0){
                $admin = true;
            }
            if($complaint ->PIC_ID != $user->UID  && $complaint ->RH_ID!=$user->UID && !$admin){return redirect()->route('result.index');}
        }else{return redirect()->route('result.index');}
        return view('admin.list.report_info',['complaint' => $complaint]);
    }
}
