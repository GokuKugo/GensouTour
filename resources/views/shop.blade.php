@extends('layout')
@section('main')
    <div class="container concolor text-white pt-3 pb-3">
        <div class="paragraph">
            <div class="text-white text-center pt-3">
                <h2>Goods</h2>
                <h4>Goods can be bought on locations on the day of the concerts <br> Clothes sizes varites from XS to
                    XXL</h4>
                <h3>Sleeveless shirts</h3>
            </div>
            {{-- <========= sleeveless goods =========> --}}
            <div id="sleeveless">
                <div class="row row-cols-2 row-cols-md-4  row-cols-sm-3 text-center justify-content-center">
                    @foreach ($All_Shop as $row)
                        @if ($row->type == 'sleeveless')
                            <div class="col shopback">
                                <img src="../img/shop{{ $row->idgshop }}.jpg" alt="{{$row -> name}}" class="img-fluid mt-3">
                                <p class="text-white pt-3">
                                    <span class="text-center fs-5">{{ $row->name }}</span><br>
                                    <span class="float-start"><b>Material:</b></span>
                                    <span class="float-end">{{ $row->material }}</span> <br>
                                    <span class="float-start"><b>Price:</b></span>
                                    <span class="float-end">${{ $row->price }}</span> <br>
                                    <span class="float-start"><b>Locations:</b></span>
                                    @foreach ($LocAvail as $colrow)
                                        @if ($colrow->idgshop == $row->idgshop)
                                            <span class="float-end">{{ $colrow->stadium }} </span><br>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- <========= shirt goods =========> --}}
            <div id="shirt">
                <h2 class="text-white text-center pt-3">T-shirts</h2>
                <div class="row shoprow row-cols-2 row-cols-md-4 row-cols-sm-3 text-center justify-content-center">
                    @foreach ($All_Shop as $row)
                        @if ($row->type == 'shirt')
                            <div class="col shopback">
                                <img src="../img/shop{{ $row->idgshop }}.jpg" alt="{{$row -> name}}" class="img-fluid mt-3">
                                <p class="text-white pt-3">
                                    <span class="text-center fs-5">{{ $row->name }}</span><br>
                                    <span class="float-start"><b>Material:</b></span><span
                                        class="float-end">{{ $row->material }}</span> <br>
                                    <span class="float-start"><b>Price:</b></span> <span
                                        class="float-end">${{ $row->price }}</span> <br>
                                    <span class="float-start"><b>Locations:</b></span>
                                    @foreach ($LocAvail as $Locrow)
                                        @if ($Locrow->idgshop == $row->idgshop)
                                            <span class="float-end">{{ $Locrow->stadium }}</span><br>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- <========= plush goods =========> --}}
            <div id="plush">
                <h2 class="text-white text-center pt-3">Plushies</h2>
                <div class="row shoprow row-cols-2 row-cols-md-4 row-cols-sm-3  text-center justify-content-center">
                    @foreach ($All_Shop as $row)
                        @if ($row->type == 'plush')
                            <div class="col shopback">
                                <img src="../img/shop{{ $row->idgshop }}.jpg" alt="{{$row -> name}}" class="img-fluid mt-3">
                                <p class="text-white pt-3">
                                    <span class="text-center fs-5">{{ $row->name }}</span><br>
                                    <span class="float-start"><b>Material:</b></span><span
                                        class="float-end">{{ $row->material }}</span> <br>
                                    <span class="float-start"><b>Price:</b></span> <span
                                        class="float-end">${{ $row->price }}</span> <br>
                                    <span class="float-start"><b>Locations:</b></span>
                                    @foreach ($LocAvail as $colrow)
                                        @if ($colrow->idgshop == $row->idgshop)
                                            <span class="float-end">{{ $colrow->stadium }} </span><br>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
