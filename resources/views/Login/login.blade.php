@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row loginForm">
            <div class="col-lg-4 col-md-4 col-sm-2 hidden-xs"></div>
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 loginFormDiv" style="background-color: #d6d8db">
                <form action="{{route('log_in') }}" method="post">

                    <div class="row loginFormRow">
                        <div class="title">
                            <h3>ورود به سایت</h3>
                        </div>
                    </div>
                    <div class="row loginFormRow">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--<label for="email">ایمیل</label>--}}
                        <input   type="text" name="email" id="email" class="login_textInput" placeholder="ایمیل خود را وارد نمایید">
                    </div>
                    <div class="row loginFormRow">
                        {{--<label for="password"></label>--}}
                        <input   type="text" name="password" id="password" class="login_textInput" placeholder="رمز عبور خود را وارد نمایید">
                    </div>
                    <div class="row loginFormRow">
                        <div class="col-lg-6 ">
                            {{--<input  type="submit" name="action" id="loginBtn" class="login_btnInput" value="ورود">--}}
                            <button type="submit" name="action" id="loginBtn" class="login_btnInput" value="Login">ورود</button>
                        </div>
                        <div class="col-lg-6">
                            {{--<input  type="submit" name="action" id="signupBtn" class="login_btnInput" value="ثبت نام">--}}
                            <button type="submit" name="action" id="loginBtn" class="login_btnInput" value="SignUpُ">ثبت نام</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2 hidden-xs"></div>
        </div>

    </div>
@endsection
