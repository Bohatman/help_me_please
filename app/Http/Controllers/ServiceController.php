<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicetime;
use App\servicetype;
use App\bookIT;
use Illuminate\Support\Facades\Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        $user=Auth::user();
        $booked = bookIT::select('available_id')->where('date','=',date('Y-m-d'))->get();
        $book =array();
            for($i=0;$i<count($booked);$i++){
                $book[$i] = $booked[$i]['available_id'];
        }
        $servicetime = servicetime::where('time_start','>',date('H:i:s'))->whereNotIn('available_id',$book)->get();
        if($user->usertype == 0){
            $servicetype = servicetype::get();
        }else{
        $servicetype = servicetype::where('usertype','=',$user->usertype)->get();}

        return view('front.it',['user' => $user, 'servicetime'=>$servicetime,'servicetype'=>$servicetype]);
        }else{
            return redirect()->to(url('login'));
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
        if($request->get('servicetype') == -1){
            return redirect()->route('book.index')->with('error','เกิดข้อผิดพลาด');
        }
        if($servicetime = bookIT::select('available_id')->where('date','=',$request->get('date'))->where('available_id','=',$request->get('servicetime'))->exists() || $request->get('servicetime') == -1){
            return redirect()->route('book.index')->with('error','มีการจองช่วงเวลานี้แล้ว');
        }else{
            if(strtotime(date('Y-m-d'))==strtotime($request->get('date')) ){
            if((strtotime(servicetime::find($request->get('servicetime'))->time_start) - strtotime(date('h:i:s') ) <0 ) ){
                return redirect()->route('book.index')->with('error','เกินช่วงเวลาจอง');
            }
        }
            $book= new bookIT([
                'UID' => Auth::user()->UID,
                'available_id' => $request->get('servicetime'),
                'servicetype_id' => $request->get('servicetype'),
                'detail' => $request->get('detail'),
                'date'=> $request->get('date'),
            ]);
            $book->save();
            return redirect()->route('book.index')->with('success','จองเรียบร้อย');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
        if(!bookIT::with('getTime','getType','getUser','getPIC')->where('book_id','=',$id)->exists()){
            return redirect()->route('book.index')->with('error','ไม่พบการจองนี้');
        }
        $book = bookIT::with('getTime','getType','getUser','getPIC')->find($id);
        if($book->UID == Auth::user()->UID || Auth::user()->usertype==0){
        return view('front.itinfo',compact('book'));}
        return redirect()->to(url('/login'));}
        else{
        return redirect()->to(url('/login'));
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
        $book = bookIT::find($id);
        $book->delete();
        return redirect()->to('/profile')->with('success','ยกเลิกการจองเสร็จสิ้น');
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
        if(bookIT::select('available_id')->where('date','=',$request->get('date'))->where('available_id','=',$request->get('servicetime'))->exists() || $request->get('servicetime') == -1){
            return redirect()->route('book.index')->with('error','มีการจองช่วงเวลานี้แล้ว');
        }
        $book = bookIT::find($id);
        $book->available_id = $request->get('servicetime');
        $book->servicetype_id = $request->get('servicetype');
        $book->detail = $request->get('detail');
        $book->date = $request->get('date');
        $book->save();
        return redirect()->to(url('/profile'))->with('success','แก้ไขเรียบร้อย');

    }
    public function timeEdit($id){
        if(Auth::check()){
            $user=Auth::user();
            if( (strtotime(servicetime::find(bookIT::find($id)->available_id)->time_start) - strtotime(date('h:i:s') ) < 3601 && bookIT::find($id)->date == date('Y-m-d') ) ){
                return redirect()->to('/profile')->with('error','เกินช่วงเวลาการแก้ไข');
            }
            $booked = bookIT::select('available_id')->where('date','=',date('Y-m-d'))->get();
            $book =array();
                for($i=0;$i<count($booked);$i++){
                    $book[$i] = $booked[$i]['available_id'];
            }
            $servicetime = servicetime::whereNotIn('available_id',$book)->get();
            if($user->usertype == 0){
                $servicetype = servicetype::get();
            }else{
            $servicetype = servicetype::where('usertype','=',$user->usertype);}
            $data = bookIT::with('getTime')->find($id);
            if($user->UID != $data->UID){
                return redirect()->to(url('profile'));
            }
            return view('front.edit.it',['user' => $user, 'servicetime'=>$servicetime,'servicetype'=>$servicetype,'data' => $data]);
            }else{
                return redirect()->to(url('login'));
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
    public function getTime(Request $request){
        if($request->ajax()){
            $output = $request->get('query');

            if(Auth::check()){
                $user=Auth::user();
                $booked = bookIT::select('available_id')->where('date','=',$output)->get();
                $book =array();
                    for($i=0;$i<count($booked);$i++){
                        $book[$i] = $booked[$i]['available_id'];
                }
                $servicetime = servicetime::where('time_start','>',date('h:i:s'))->whereNotIn('available_id',$book)->get();
                $output = '';
                if(count($servicetime)>0){
                foreach($servicetime as $item){
                    $output .='<option value="'.$item->available_id.'">'.$item->time_start."-".$item->time_end.'</option>';
                }
            }else{
                $output .= '<option value="-1">ไม่พบข้อมูล</option>';
            }

                }else{
                    return redirect()->to(url('login'));
                }



            $data=array('html_1'=>$output);
            echo json_encode($data);
        }
    }
}
