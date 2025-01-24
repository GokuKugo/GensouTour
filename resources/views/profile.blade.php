@extends('layout')
@section('main')

    <main class="text-white text-center py-3">
        <div class="paragraph py-3 fs-5 p-5 mx-auto container-sm profilebox">
            <h1 class="display-6 py-3">Welcome, {{ $name }}</h1>
            @if (Auth::check() && Auth::user()->admin == true)
            <p><a class="text-danger footertext" href="/download/GensouTool.zip"><span>ADMIN TOOL</span></a></p>
            @endif
           <span class="float-start">Name:</span> <span class="float-end">{{ $name }}</span>
            <br>
            <span class="float-start">Email:</span> <span class="float-end">{{ $email }}</span>
            <br>
             <span class="float-start">Phone Number:</span> <span class="float-end">+{{ $phone }}</span>
             <br>
             <a href="/reset-password" class="footertext float-end text-warning"><span>Change password</span></a>
             <br>

             @guest
             @else
             @if (Auth::user() -> admin == false)
             <a href="/delete" class="footertext float-end text-warning"><span>Delete account</span></a>
             @endif
             @endguest
             <br>
             <span class="float-start">Joined:</span> <span class="float-end">{{ $date }}</span>
             <br>
             <span class="float-start">Tickets Bought:</span>

                @foreach ($TicketsBought as $row)<span class="float-end">{{$row->location}} - {{$row -> stadium}} - {{$row -> ticketpcs}} pcs</span> <br>
                @endforeach
            <p class="pt-5"><a href="/logout" class="btn custombtn "><span>Logout</span></a></p>
        </div>
    </main>
@endsection
