<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\complaint;
use App\priorityjob;
use DB;
class trackingController extends Controller
{
    public function index(){
        if(Auth::check()) {
            $user = Auth::user();
            $admin = false;
            if($user->usertype == 0){
                $admin = true;
            }
            if($user->position_id == -1 && !$admin){
                return redirect()->route('home');
            }
            if($user->usertype==0){
                $where = [
                    ['status','!=', 0],
                    ['status','!=', 3],
                    ['status','!=', 4],
                ];}
            else{
                $position = DB::table('positions')->where('position_id','=',$user->position_id)->get();
                if($position[0]->priority_level =! 1 && !$admin){
                    return redirect()->route('home');
                }
            $where = [
                ['RH_ID','=',$user->UID],
                ['status','!=', 0],
                ['status','!=', 3],
                ['status','!=', 4],
            ];}
            $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser')->where($where)->orderBy('updated_at', 'ASC')->paginate(15);
            return view('admin.list.tracking',['complaint' => $complaint]);
        }else{
            return redirect()->route('login');
        }
    }
    public function store(Request $request){
        if(!priorityjob::where('issues_id','=',$request->get('issues_id'))->exists()){
        $priorityjob = new priorityjob([
            'issues_id' => $request->get('issues_id'),
        ]);
        $priorityjob->save();
        return redirect()->route('tracking.index')->with('success','อยู่ในรายการเร่งด่วนแล้ว');
        }
        return redirect()->route('tracking.index')->with('error','เกิดข้อผิดพลาด');
    }
}
