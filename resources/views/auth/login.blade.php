@extends('layouts.new')
@section('content')
<section id="" >
    <div  class="container">
        <div class="row">
          <div class="col-md-3">

          </div>
          <div class="col-md-6">
              <h4>Login</h4>
              <hr>
               <form method="POST" action="{{ route('login') }}" class="aa-login-form">
                    @csrf
                <div class="form-group">
                <label for="">Email address<span>*</span></label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' inputError' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                 <label for="">Password<span>*</span></label>
                 <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' inputError' : '' }}" name="password" required>


                </div>

                  <p>
                    <button type="submit"  class="btn btn-info">Login</button> &nbsp&nbsp&nbsp
                    <label class="rememberme" for="rememberme"><input class="form-check-input" type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
                    </label>
                  </p>

                  <p class="aa-lost-password"><a href="#">Forget your password?</a></p>
                </form>
          </div>
          <div class="col-md-3">

            </div>
        </div>
    </div>

      </section>
      <br>
@endsection
@section('script')

@endsection
