@extends('layouts.masteradmin')
@section('title', 'Reject complaint page')

@section('content')


            <div class="form-group">
                    <label for="issues_id">หมายเลขการร้องเรียน: </label>
            <input type="text" class="form-control" name="issues_id" value="{{$complaint->issues_id}}" readonly>
            </div>
            <div class="form-group">
                    <label for="email">หัวข้อการร้องเรียน: </label>
            <input type="text" class="form-control" name="category_name" value="{{$complaint->getList->getCategory->category_name}}" readonly>
            </div>
            <div class="form-group">
                    <label for="email">หัวข้อย่อยการร้องเรียน: </label>
                @if(!is_null($complaint->getList->getSubCategory))
            <input type="text" class="form-control" name="sub_category_name" value="{{$complaint->getList->getSubCategory->sub_category_name}}" readonly>
                @else
                <input type="text" class="form-control" name="sub_category_name" value="ไม่มีหัวข้อย่อย" readonly>
                @endif
            </div>
            <div class="form-group">
                    <label for="issues_id">ชื่อผู้ร้องเรียน: </label>
                    @if($complaint->usertype == 3)
                    <input type="text" class="form-control" name="name" value="{{$complaint->getGuest->fname.' '.$complaint->getGuest->lname}}" readonly>
                    @else
                    <input type="text" class="form-control" name="name" value="{{$complaint->getUser->fname.' '.$complaint->getUser->lname}}" readonly>
                    @endif
            </div>
            <div class="form-group">
                    <label for="email">วันที่แจ้งเรื่อง: </label>
            <input type="text" class="form-control" name="start_date" value="{{$complaint->created_at}}" readonly>
            </div>
            <div class="form-group">
                    <label for="email">วันที่ดำเนินการล่าสุด: </label>
            <input type="text" class="form-control" name="update_date" value="{{$complaint->updated_at}}" readonly>
            </div>
            <form method="post" class="form-group" action="{{url('set/statusreject')}}">
                {{ csrf_field() }}
            <div class="form-group">
            <input type="hidden" name="issues_id" value="{{$complaint->issues_id}}">
            <input type="hidden" name="RP_ID" value="{{Auth::user()->UID}}">
                    <label for="textarea">เหตุผลในการปฎิเสธ: </label>
                    <textarea class="form-control" name="report"></textarea>
            </div>
            <div style="text-align: center">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">บันทึก</button>
            <button type ="button" class="btn btn-warning" onclick="history.back();">ย้อนกลับ </button>
            </div>
</form>
@endsection

@section('script')
<script>
        $(window).ready(function(){
        });
</script>
@endsection
