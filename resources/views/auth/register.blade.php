@extends('admin.layout.main')
@section('main-content')
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('backend/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('admin.postRegister')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Tên ">
                                    @error('name')
                                    <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email </label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                           placeholder="Email">
                                    @error('email')
                                    <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                           placeholder="Mật khẩu ">
                                    @error('password')
                                    <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Xác Nhận Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation"
                                           placeholder="Xác nhận mật khẩu ">
                                    @error('password_confirmation')
                                    <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng Ký</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Đăng ký với FaceBook
                                        </button>
                                        <button class="au-btn au-btn--block au-btn--blue2">Đăng ký với Google</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Đã có tài khoản ?
                                    <a href="{{route('admin.login')}}">Đăng nhập</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection