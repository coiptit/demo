<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
        crossorigin="anonymous"
    />
</head>
<body>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center">
            <div class="mt-5 fs-1 text-info">
                Admin Login
            </div>
            @if ($message = Session::get('err'))
                <div class="text-danger mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form method="post" action="{{route('admin.loginConfirm')}}">
                @csrf
                <div class="mt-3">
                    <label class="form-label">Email</label>
                    <input type="email" style="width: 300px" name="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label">Password</label>
                    <input type="password" style="width: 300px" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" class="btn btn-primary" value="Đăng nhập">
                </div>

            </form>

{{--            <div class="mt-4">--}}
{{--                <div class="d-flex justify-content-center links">--}}
{{--                    Don't have an account? <a href="#" class="ml-2">Sign Up</a>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-center links">--}}
{{--                    <a href="#">Forgot your password?</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"
></script>
</body>
</html>
