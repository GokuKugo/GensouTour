@extends('layout')
@section('main')
    <div class="container">
        <div class="row paragraph mx-auto singerticketli w-75 fs-5 pb-2">
            @foreach ($All_Tours as $row)
                <div class="col text-center">
                    <a id="singersbutton" class="text-nowrap footertext" href="/tours/{{ $row->idlocations}}">

                    {{$row->location}}</a>
                </div>
                @endforeach
        </div>
        <div class="paragraph">
            <div class="container pb-2">
                <h2 class="display-5 pt-4 pb-3 text-center text-white">{{ $Selected_Tours->location }}</h2>
                <div class="row align-items-center">
                    <div class="col-md">
                        <p class="text-center mx-2">
                            <img class="img-fluid ticketimg" src="../img/location{{ $Selected_Tours->idlocations }}.jpg"
                                alt="{{ $Selected_Tours->idlocations }}.jpg" title="{{ $Selected_Tours->location }}">
                        </p>
                    </div>
                    <div class="col-md text-center">
                        <p class="fs-1">
                            {{ $Selected_Tours->date }} <br>
                            {{ $Selected_Tours->stadium }}
                        </p>
                        <span class="text-warning text-center">

                            @if ($Selected_Tours->AvailTicket > 0)
                                @if (Auth::check())
                                    <form method="post">
                                        @csrf
                                        <p><label for="nmbticket">Number of tickets: <br> -max 5 per account </label></p>
                                        <p><input type="number" id="nmbticket" name="nmbticket" value="0" min="1"
                                            @if ($Selected_Tours -> AvailTicket < 5)
                                                max="{{$Selected_Tours->AvailTicket}}"
                                            @else
                                                max="5"
                                            @endif>
                                        </p>
                                        <p><button type="submit" class="btn btn-lg custombtn"
                                                onclick="buyticketf()"><span>BUY TICKET</span></button></p>
                                        @error('nmbticket')
                                            {{ $message }}
                                        @enderror
                                    </form>
                                @else
                                <p>Please login to buy ticket to this location.</p>
                                    <button disabled type="submit" class="btn btn-lg custombtn"
                                        onclick="buyticketf()"><span>BUY TICKET</span></button>
                                    @error('nmbticket')
                                        {{ $message }}
                                    @enderror
                                @endif
                            @else
                                We apologize, tickets are sold out to this location.
                            @endif
                                </span>
                        <p id="ticketleft" class="text-center mt-5 fs-4"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
