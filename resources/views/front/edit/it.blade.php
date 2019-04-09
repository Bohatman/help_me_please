@extends('layouts.new')
@section('title', 'Report page')
@section('sider')
@endsection
@section('content')
<br>
<h3 style="color:rgb(12, 252, 63)"><b>แก้ไขการจองเวลา IT-CLINIC</b></h3>
<hr>
<form method="POST" action="{{url('/book/'.$data->book_id)}}">
    @csrf
    <input type="hidden" name="_method" value="put" />
<div class="form-group row">

    <div class="col-2">
        <label for="name">
            เลือกบริการ:
        </label>
    </div>

    <div class="col-10">
        <select class="form-control" name="servicetype" id="servicetype">
            @foreach ($servicetype as $item)
        <option value="{{$item->servicetype_id}}">{{$item->servicetype_name." (".$item->servicetype_price."บาท)"}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">

        <div class="col-2">
            <label for="name">
                เวลาที่ต้องการ:
            </label>
        </div>
        <?php
        $date = strtotime("+1 day");
        ?>
        <div class="col-5">
                <select class="form-control" name="date" id='servicetime_list'>
                    <option value="{{date('Y-m-d')}}">{{date('Y-m-d')}}</option>
                    <option value="{{date('Y-m-d',strtotime("+1 day"))}}">{{date('Y-m-d',strtotime("+1 day"))}}</option>
                    <option value="{{date('Y-m-d',strtotime("+2 day"))}}">{{date('Y-m-d',strtotime("+2 day"))}}</option>
                </select>
        </div>
        <div class="col-5">
            <select class="form-control" name="servicetime" id="time_list">
                    <option style="color:gray" value="{{$data->available_id}}">{{$data->getTime->time_start."-".$data->getTime->time_end}}</option>
                @foreach ($servicetime as $item)

            <option value="{{$item->available_id}}">{{$item->time_start."-".$item->time_end}}</option>

                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
            <div class="form-group col-12">
                    <label for="comment">รายเอียดเพิ่มเติม:</label>
            <textarea class="form-control" rows="5" name="detail" value="{{$data->detail}}"></textarea>
            </div>
    </div>
    <div class="form-group col-12 text-center">
    <button type="submit" class="btn btn-success">จองช่วงเวลา</button>
    </div>
</form>



@endsection
@section('script')
<script>
        $(window).ready(function(){
                $('#it_list').addClass('active');
                setTimeout(function() {
                document.getElementById("servicetime_list").value = "{{$data->date}}";
                document.getElementById("time_list").value = "{{$data->available_id}}";
                document.getElementById("servicetype").value = "{{$data->servicetype_id}}";
            }, 500);
            });
        </script>

<script type="text/javascript">
    $('#servicetime_list').change(function() {
        var query = $(this).val();
        fetch_data(query);
    });
    function fetch_data(query = '')
          {
            $.ajax({
             url:"{{route('timelist.action')}}",
             method:'GET',
             data:{query:query},
             dataType:'json',
             success:function(data)
             {
                $('#time_list').html(data.html_1);
             }
          })
         }
</script>

@endsection
