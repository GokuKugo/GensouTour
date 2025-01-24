@extends('layout')
@section('main')
    <header class="text-center">
        <div class="slider text-nowrap">
            <div class="slider-for">
                <img src="../img/header2.jpg" class="sliderimg" alt="">
                <h1 class="txtmain">GENSOU TOUR</h1>
                <h3 class="txtmain float-end "><span>Ado - Unravel (Cover)</span></h3>
            </div>
            <div class="slider-for">
                <img src="../img/header3.jpg" class="sliderimg" alt="">
                <h1 class="txtmain">GENSOU TOUR</h1>
                <h3 class="txtmain float-end ">Fujii Kaze - Hana</h3>
            </div>
            <div class="slider-for">
                <img src="../img/header4.jpg" class="sliderimg" alt="">
                <h1 class="txtmain">GENSOU TOUR</h1>
                <h3 class="txtmain float-end ">Eve - We're Still Underground</h3>
            </div>
            <div class="slider-for">
                <img src="../img/header5.jpg" class="sliderimg" alt="">
                <h1 class="txtmain">GENSOU TOUR</h1>
                <h3 class="txtmain float-end ">King Gnu - SPECIALZ</h3>
            </div>
            <div class="slider-for">
                <img src="../img/header6.jpg" class="sliderimg" alt="">
                <h1 class="txtmain">GENSOU TOUR</h1>
                <h3 class="txtmain float-end ">Syudou - yattyattawa</h3>
            </div>
        </div>
    </header>



    <main class="w-100">
        <div id="mainp" class="paragraph container fs-5 text-center"></div>
        @if (Auth::check() && Auth::user()-> admin == true)
            <div class="d-flex-inline justify-content-md-end container "><button onclick="maintext()"
                    class="btn text-center adminbtn mt-2"><span id="editbtn">Edit</span></button>
                <br>
                <div id="adminf" style="display:none;">
                    <form method="post">
                        <textarea rows="10" id="inp" class="form-control">
                        </textarea>
                    </form>
                    <br>
                    <button onclick="changetext()" class="btn adminaccept text-center"><span>Accept</span></button>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="row align-items-center pt-5">
                <div class="col-lg my-auto">
                    <h3 class="text-center">TOURS</h3>
                    @foreach ($All_locations as $row)
                        @php
                            $y++;
                        @endphp
                        <div class="row ticket @if ($y == 4) <?php echo 'tickettwo'; ?> @endif">
                            <div class="col fs-5">{{ $row->location }} <br> {{ $row->date }} </div>
                            <div class="col my-auto">
                            <a href="/tours/{{$row-> idlocations}}" class="btn float-end custombtn"><span>buy
                                ticket</span></a>
                            </div>
                        </div>
                        @if ($y == 4)
                        @break
                    @endif
                @endforeach
                <p class="float-end pt-3"><a href="/tours/1" class="footertext">More →</a></p>
            </div>
            <div class="col-lg text-center">
                    <h3>ARTISTS</h3>
                    <div class="artistslider">
                        @foreach ($All_bands as $row)
                            <div class="slider-for">
                                <img src="../img/singer{{ $row->idbands }}.jpg" class="singerimg" alt="">
                                <div class="row mx-4">
                                    <div class="fs-4 pt-3">
                                        <a href="/artists/{{ $row->idbands }}"
                                            class="footertext">{{ $row->singer }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
    <div class="container container-fluid mx-auto text-center pt-5">
        <div class="row shoprow mx-1">
            <h3>GOODS</h3>
            <div class="shopslider">
                @foreach ($All_Gshop as $row)
                    <div class="slider-for slider-for-shop">
                        <div class="col-sm pt-2 paragraph" style="max-width: 300px">
                            <img src="../img/shop{{ $row->idgshop }}.jpg" alt="" class="px-3 img-fluid" >
                            {{ $row->name }} <br> $ {{ $row->price }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="/shop" class=" mt-3 btn text-center custombtn"><span>More</span></a>
    </div>
</main>
<script src="../js/storage.js"></script>
@endsection
