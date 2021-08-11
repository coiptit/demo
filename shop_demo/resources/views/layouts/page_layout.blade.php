<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link  href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet"/>
</head>

<body>
    <div class="b-example-divider"></div>

    <div class="container">
        @include('pages.partial.header')
    </div>

    @include('pages.partial.nav')

    @yield('content')

    @include('pages.partial.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<script>
    function addToCart(event){
        event.preventDefault();
        let urlCart= $(this).data('url');
        $.ajax({
            method:"GET",
            url: urlCart,
            dataType:'json',
            success:function (data) {
                if (data.code===200){
                    alert('Success');
                }
            },
            error:function () {

            }
        })

    }

    function updateCart(event) {
        event.preventDefault();
        alert('ABC');
    }
    $(function (){
        $('.addToCart').on('click',addToCart);
        $('.updateCart').on('click',updateCart);
    })
</script>
</html>
