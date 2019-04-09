<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\complaint;
use DB;
use Illuminate\Support\Facades\Auth;
class SearchController extends Controller
{
    public function index($id){
        if(is_null(complaint::find($id))){ return redirect()->to(url('/search'))->with('Empty',"ไม่พบข้อมูล");}
        if(!Auth::check()){
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser','getReport','getReport.getRP','getPIC','getRH')->find($id);
            if(is_null($complaint->guest_id)){
                return redirect()->to(url('/search'))->with('error', 'คุณไม่สามารถเข้าถึงข้อมูลนี้ได้');
            }
        return view('front.info',['complaint' => $complaint]);
        }
        $complaint = complaint::with('getList.getCategory','getList.getSubCategory','getList.getCampus','getGuest','getUser','getReport','getReport.getRP','getPIC','getRH')->find($id);
        if(Auth::user()->UID != $complaint->UID){
            if(Auth::user()->usertype==0 ||Auth::user()->position_id != -1 ){
                return view('front.info',['complaint' => $complaint]);
            }
            return redirect()->to(url('/search'))->with('error', 'คุณไม่สามารถเข้าถึงข้อมูลนี้ได้');
        }
        return view('front.info',['complaint' => $complaint]);
    }
}
