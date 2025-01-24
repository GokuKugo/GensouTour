<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gensou Tour</title>
    <link rel="stylesheet" href="{{ asset('../css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('../slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('../fontawesome-free-6.5.2-web/css/fontawesome.css')}}"  />
    <link rel="stylesheet" href="{{ asset('../fontawesome-free-6.5.2-web/css/brands.css') }}"  />
    <link rel="stylesheet" href="{{ asset('../fontawesome-free-6.5.2-web/css/solid.css') }}"  />
    <script src="{{ asset('../js/bootstrap.bundle.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('../img/logo2.png') }}">



</head>

<body id="top" class="body text-white">
    <div class="text-center">
        <a href="/" class="hover d-inline-grid">
            <figure><img src="{{ asset('../img/logo.png') }}" alt="Shinsekai Group" width="220"
                    class="pt-2"></figure>
        </a>
    </div>
    <nav class="navbar navbar-expand-sm container pb-2 w-75" data-mdb-right="true">
        <div class="container-fluid">
            <button class="navbar-toggler bg-light w-25 mx-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mx-auto navpd">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/artists/1"><span>ARTISTS</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/tours/1"><span>TOURS</span></a>
                    </li>

                    <li class="my-auto mx-auto"><img src="../img/SEP2.png" alt="" width=1 height=11
                            class="mx-3"></li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/shop"><span>GOODS</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/contact"><span>CONTACT</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav navpd login" style="right:0;">
                    <li class="nav-item">
                        @if (Auth::check())
                            <a class="nav-link text-white text-uppercase" href="/profile">
                                <span>
                                    @if (Auth::user()->admin == true)
                                        <span class="adminlabel text-danger text-lowercase profilename">[admin]</span>
                                    @endif
                                    <i class="fa-regular fa-user fa-lg profilepic" style="color: #ffffff;"></i>
                                    <span class="profilename">{{ Auth::user()->name }}</span>
                                </span>
                            </a>
                        @else
                            <a class="nav-link text-white" href="/login"><span>LOGIN</span></a>
                        @endif

                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('main')


    <div class="pt-4">
        <div class="photoslider">
            @for ($i = 1; $i < 12;)
                <div class="slider-for slider-for-photos">
                    <img src="../img/footer{{ $i++ }}.png" alt="{{ $i++ }}" style="width:350px;">
                </div>
            @endfor
        </div>
    </div>

    <footer class="text-white pb-3">
        <div class="container table-responsive">
            <div style="width: 100%;">
                <div class="row mt-1 py-3 ">
                    <div class="col text-center">
                        <a href="https://www.instagram.com/" target="_blank"><img src="../img/sm1.png" alt="Instagram"
                                width="30"></a>
                        <a href="https://www.facebook.com/" target="_blank"><img src="../img/sm2.png" alt="Facebook"
                                width="30"></a>
                        <a href="https://twitter.com/" target="_blank"><img src="../img/sm3.png" alt="Twitter"
                                width="30"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <form action="/" method="post">
                            @csrf
                            <input type="email" name="emails" class="newsletter mb-2"
                                placeholder="Newsletter">
                            <br>
                            <button type="submit" name="btemail" class="btn custombtn"><span>Subscribe</span></button>
                            <br>
                            @error('emails')
                                {{ $message }}
                            @enderror
                            <br>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <br>
                        <a class="footertext" href="/artists/1">Artists</a> |
                        <a class="footertext" href="/tours/1">Tours</a> |
                        <a class="footertext" href="/shop">Goods</a> |
                        <a class="footertext" href="/contact">Contact</a>
                    </div>
                    <div class="col text-center ">
                        <a href="#top"><img src="../img/arrow.png" width="30" alt=""></a>
                    </div>
                    <div class="col text-end"><br> ©2023 Shinsekai</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('../js/myjs.js') }}"></script>
</body>


</html>
