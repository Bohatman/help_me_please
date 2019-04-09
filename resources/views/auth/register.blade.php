@extends('layouts.new')

@section('content')

<section id="" >
    <div class="container">
    <div class="row">
        <div class="col-md-3" >

        </div>
        <div class="col-md-6">
                <h4>Register</h4>
                <hr>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group" row>
                              <label for="usertype" class="col-md-4 col-form-label text-md-right">ผู้ร้องเรียน</label>
                              <div class="form-check-inline">
                                  <label class="form-check-label" for="radio1">
                                      <input type="radio" class="form-check-input" id="student" name="usertype" value="1" checked="checked">นักศึกษา
                                 </label>
                                 &nbsp&nbsp&nbsp
                                 <label class="form-check-label" for="radio2">
                                      <input type="radio" class="form-check-input" id="staff" name="usertype" value="2">บุคลากร
                                      </label>
                              </div>
                          </div>
                      <div class="form-group row">
                              <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('FIRST NAME') }}</label>

                              <div class="col-md-6">
                                  <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                  @if ($errors->has('fname'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('fname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last NAME') }}</label>

                          <div class="col-md-6">
                              <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                              @if ($errors->has('lname'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('lname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right" for="email">แนบภาพ</label>
                          <div class="col-sm-6">
                              <input class="form-control-sm" type="file" name="images" id="filUpload" accept="image/*" >
                          </div>
                      </div>

                      <div class="form-group row">
                              <label for="Phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                              <div class="col-md-6">
                                  <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">

                                  @if ($errors->has('phone'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Register') }}
                              </button>
                          </div>
                      </div>
                  </form>

        </div>
        <div class="col-md-3">

        </div>
    </div>
    </div>
</section>
<br>
@endsection
