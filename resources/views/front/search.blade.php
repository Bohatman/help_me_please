@extends('layouts.new')
@section('title', 'Search Page')
@section('content')

<div class="card">
        <div class="card-body">
                <h2>ค้นหาเรื่องร้องเรียน</h1>
                <hr>

                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                                <i class="material-icons">
                                        search
                                        </i>
                          </div>
                        </div>
                        <input type="number" id="input_text" class="form-control">
                      </div>
                      <div class="text-center">
                      <button type="button" class="btn btn-primary" onclick="search()">ค้นหา</button></div>







        </div>
      </div>
      <br>
@endsection

@section('script')
<script>
        $(window).ready(function(){
                $('#search_list').addClass('active');
            });
        </script>
<script>
function search(){
    var text = document.getElementById('input_text').value;
    if(text==''){
        alert('กรุณาใส่หมายเลขการร้องเรียน / เฉพาะตัวเลขเท่านั้น');
    }
    else{
        //window.location.replace("{{url('search/')}}/"+text);
        window.location.href = "{{url('search/')}}/"+text;
    }
}
</script>
@endsection
