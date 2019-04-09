<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookIT;
use Illuminate\Support\Facades\Auth;
use PDF;
class AdminITController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->position_id == 0 || Auth::user()->usertype == 0){
        $book = bookIT::with('getTime','getType','getUser','getPIC')->where('date','=',date('Y-m-d'))->get();
        $date = bookIT::select('date')->groupBy('date')->get();
        return view('admin.itclinic.index',['book'=>$book,'date'=>$date,'count'=> bookIT::count()]);
        }
        return redirect()->to(url('login'));
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
        if(Auth::check()){
            if(!bookIT::with('getTime','getType','getUser','getPIC')->where('book_id','=',$id)->exists()){
                return redirect()->route('book.index')->with('error','ไม่พบการจองนี้');
            }
            $book = bookIT::with('getTime','getType','getUser','getPIC')->find($id);
            if(Auth::user()->position_id == 0 || Auth::user()->usertype == 0){
            return view('admin.itclinic.itinfo',compact('book'));}
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
        if(bookIT::where('book_id','=',$id)->exists()){
            $book = bookIT::with('getTime','getType','getUser','getPIC')->find($id);
            if($book->status == 3){
                return redirect()->to(url('admin/itclinic/'))->with('error','ไม่สามารถกระทำได้');
            }
            $book->status = 2;
            $book->PIC_ID = Auth::user()->UID;
            $book->save();
            $book = bookIT::with('getTime','getType','getUser','getPIC')->find($id);
            $view = \View::make('admin.itclinic.pdf',['book'=>$book]);
            $html = $view->render();
            $pdf = new PDF();
            $pdf::SetTitle('Report');
            $pdf::AddPage();
            $pdf::SetFont('thsarabun', '', 14);
            $pdf::writeHTML($html, true, false, true, false, '');
            $pdf::Output('report.pdf');
            return @$pdf->stream();
        }
        return redirect()->route('book.index')->with('error','ไม่พบการจองนี้');
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
    public function realList(Request $request){
        if($request->ajax()){
            $status = array('','จองเวลาเรียบร้อย','เสร็จสิ้น','ยกเลิก');
            $colorstatus = array('','label label-primary','label label-success','label label-danger');
            $output='';
            if($request->get('allcount') < bookIT::count()){
                $item = bookIT::with('getTime','getType','getUser','getPIC')->orderBy('book_id', 'desc')->first();
                $output .='<tr><td style="text-align: center">'.$item->book_id.'</td>'.
                '<td style="text-align: center"><span class="'.$colorstatus[$item->status].'">'.$status[$item->status].'</span></td>'
                .'<td style="text-align: center">'.$item->getTime->time_start." - ".$item->getTime->time_end.'</td>'
                .'<td style="text-align: center">'.$item->getType->servicetype_name.'</td>'
                .'<td style="text-align: center">'.$item->getUser->fname." ".$item->getUser->lname.'</td>'
                .'<td style="text-align: center">'
                .'<div class="btn-group">'
                .'<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">'
                .'จัดการ<span class="caret"></span></button>'
                .'<ul class="dropdown-menu" role="menu">'
                .'<li><a href="'.url('/admin/itpanel/'.$item->book_id).'">ออกใบเสร็จ</a></li>'
                .'<li><a href="'.url('/admin/itclinic/cancel/'.$item->book_id).'">ยกเลิก</a></li>'
                .'</ul></div></td></tr>';
            }else{
            $output="-1";}
        }
        $data=array('html_1'=>$output);
        echo json_encode($data);
    }
    public function getList(Request $request){
        if($request->ajax()){
            $output='';
            $status = array('','จองเวลาเรียบร้อย','เสร็จสิ้น','ยกเลิก');
            $colorstatus = array('','label label-primary','label label-success','label label-danger');
            $book = bookIT::with('getTime','getType','getUser','getPIC')->where('date','=',$request->get('query'))->get();
            if(count($book)>0){
                foreach($book as $item){
                $output .='<tr><td style="text-align: center">'.$item->book_id.'</td>'.
                '<td style="text-align: center"><span class="'.$colorstatus[$item->status].'">'.$status[$item->status].'</span></td>'
                .'<td style="text-align: center">'.$item->getTime->time_start." - ".$item->getTime->time_end.'</td>'
                .'<td style="text-align: center">'.$item->getType->servicetype_name.'</td>'
                .'<td style="text-align: center">'.$item->getUser->fname." ".$item->getUser->lname.'</td>'
                .'<td style="text-align: center">'
                .'<div class="btn-group">'
                .'<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">'
                .'จัดการ<span class="caret"></span></button>'
                .'<ul class="dropdown-menu" role="menu">'
                .'<li><a href="'.url('/admin/itpanel/'.$item->book_id).'">ออกใบเสร็จ</a></li>'
                .'<li><a href="'.url('/admin/itclinic/cancel/'.$item->book_id).'">ยกเลิก</a></li>'
                .'</ul></div></td></tr>';}
            }
            else{$output='<tr><td colspan="5">ไม่พบข้อมูล</td></tr>';}
            $data=array('html_1'=>$output);
            echo json_encode($data);
        }
    }
    public function delApp($id){
        if(bookIT::where('book_id','=',$id)->exists()){
            $book = bookIT::with('getTime','getType','getUser','getPIC')->find($id);
            if($book->status == 3){
                return redirect()->to(url('admin/itclinic/'))->with('error','ไม่สามารถกระทำได้');
            }
            $book->status = 3;
            $book->PIC_ID = Auth::user()->UID;
            $book->save();
            return redirect()->to(url('admin/itclinic/'))->with('success','ยกเลิกเสร็จสิ้น');
        }
    }
}
