<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gshop;
use App\Models\newsletters;
use App\Models\bands;
use App\Models\locations;
use Illuminate\Support\Facades\Auth;


class GensouController extends Controller
{

    public function newsletter(Request $request){
        $request->validate([
            'emails' => 'required|email',
        ]);
            if(newsletters::select('emails')->where('emails','=',$request->emails)->exists())
            {
                return view('success',['sv' => 'You are already subscribed!']);
            }
            else
            {
                $nl = new newsletters();
                $nl->emails = $request->emails;
                if(Auth::check())
                    {
                        $nl -> users_id = Auth::user() -> id;
                    }
                    else
                    {
                        $nl -> users_id = 1;
                    }
                $nl->Save();
                return view('success',['sv' => 'Successfully subscribed to the newsletter!']);
            }
    }
    public function Cindex(){
        return view('index',[
            'All_Gshop' => gshop::all(),
            'All_bands' => bands::all(),
            'All_locations' => locations::all(),
            'y' => 0
        ]
    );

    }
    public function Cartists($idbands){
        return view('artists',[
            'All_bands' => bands::all(),
            'Selected_Singer' => bands::where('idbands',$idbands)->first(),
            'result' => bands::select('persons.name','persons.borndate')
            ->join('persons', 'persons.idbands', '=', 'bands.idbands')
            -> where ('bands.idbands','=',$idbands)
            -> get(),
            'resultgenre' => bands::select('genres.genre')
            ->join('bands_genres', 'bands_genres.idbands', '=', 'bands.idbands')
            ->join('genres','bands_genres.idgenres','=','genres.idgenres')
            -> where ('bands.idbands','=',$idbands)
            -> get(),
        ]);
    }
    public function Ctours($idlocations){
        return view('tours',[
            'All_Tours' => locations::all(),
            'Selected_Tours' => locations::where('idlocations',$idlocations) -> first(),
        ]);
    }

    public function Cshop(){
        return view('shop',[
            'All_Shop' => gshop::all(),
            'LocAvail' => locations::select('gshop.idgshop','locations.stadium')
            ->join('locations_gshop','locations.idlocations','=','locations_gshop.idlocations')
            ->join('gshop','locations_gshop.idgshop','=','gshop.idgshop')
            ->groupBy('idlocations_gshop')
            ->get(),
        ]);
    }

}
