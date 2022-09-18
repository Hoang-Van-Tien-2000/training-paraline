<!doctype html>
<html lang="en">
<head>
    <title>REGISTER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('backend/form_login/css/style.css')}}">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url( {{asset('admin/form_login/images/bg-1.jpg')}});">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#"
                                       class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"></span></a>
                                    <a href="#"
                                       class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="{{route('admin.postRegister')}}" class="signin-form" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Username</label>
                                <input type="text" class="form-control" name="name" placeholder="Username" >
                                @error('name')
                                <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="name">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" >
                                @error('email')
                                <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" >
                                @error('password')
                                <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Confirm password </label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" >
                                @error('password_confirmation')
                                <small class="form-text text-danger " style="font-style: italic;font-size: 15px;">
                                    {{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up
                                </button>
                            </div>
                        </form>
                        <p class="text-center">Already have an account ? <a data-toggle="tab" href="{{route('admin.login')}}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('backend/fom_login/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/fom_login/js/popper.js')}}"></script>
<script src="{{asset('backend/fom_login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/fom_login/js/main.js')}}"></script>

</body>
</html>

