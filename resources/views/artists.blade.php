@extends('layout')
@section('main')
    <div class="container">
        {{-- <========= singers menu =========> --}}
        <div class="row paragraph mx-auto w-75 fs-5 pb-2">
            @foreach ($All_bands as $row)
                <div class="col text-center">
                    <a class="text-nowrap footertext " href="/artists/{{ $row->idbands }}">
                        {{ $row->singer }}</a>
                </div>
            @endforeach
        </div>
        {{-- <========= singer detail =========> --}}
        <div class="paragraph">
            <h2 class="display-5 pt-1 pb-3 text-center">{{ $Selected_Singer->singer }}</h2>
            <div class="row">
                <div class="col-lg">
                    <p class="text-center">
                        <img class="img-fluid clippath w-50" src="../img/singer{{ $Selected_Singer->idbands }}.jpg"
                            alt="">
                    </p>
                    <div class="px-4 pb-3">
                        <div class="embed-container">
                            <div class="mx-5">
                                <iframe src='{{ $Selected_Singer->music }}' title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md px-4 pb-4 w-100">
                    <table class="justify-content-center text-center singerstable mx-auto fs-5 table-responsive">
                        <tr>
                            <td class="outoftbl"></td>
                            <td class="thsing w-25">Members:</td>
                            <td class="w-27">
                                @foreach ($result as $row)
                                @if ($loop->iteration != 1)
                                |
                                @endif
                                    {{ $row->name }}

                                @endforeach
                                <br>
                            </td>
                            <td class="outoftbl "></td>
                        </tr>
                        <tr>
                            <td class="outoftbl"></td>
                            <td class="thsing">Born Date:</td>
                            <td>
                                @foreach ($result as $row)
                                @if ($loop->iteration != 1)
                                |
                                @endif
                                    {{ $row->borndate }}
                                @endforeach
                                <br>
                            </td>
                            <td class="outoftbl"></td>
                        </tr>
                        <tr>
                            <td class="outoftbl"></td>
                            <td class="thsing">Genres:</td>
                            <td>@foreach ($resultgenre as $row)
                                @if ($loop->iteration != 1)
                                |
                                @endif
                                 {{ $row->genre }}
                            @endforeach</td>
                            <td class="outoftbl"></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                {!! $Selected_Singer->bio !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
