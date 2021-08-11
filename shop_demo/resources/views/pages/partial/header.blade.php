<header class="
          d-flex
          flex-wrap
          align-items-center
          justify-content-center justify-content-md-between
          py-3
          mb-4
          border-bottom
        ">
    <a href="/" class="
            d-flex
            align-items-center
            col-md-3
            mb-2 mb-md-0
            fs-1
            text-primary text-decoration-none
          ">
        <i class="fab fa-shopify"></i>
        <h1 class="m-1">Mobile Shop</h1>
    </a>
    @if (Route::has('login'))
        <div class="col-md-3 text-end">
            @auth
                Xin chào {{ Auth::user()->name }},
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                this.closest('form').submit();"
                    class="text-decoration-none">
                        Đăng xuất
                    </a>
                </form>
            @else
                <a href="{{route('login')}}" class="btn btn-outline-primary me-2">Đăng nhập</a>
                @if(Route::has('register'))
                    <a href="{{route('register')}}" class="btn btn-primary">Đăng ký</a>
                @endif
            @endauth
        </div>
    @endif
</header>
