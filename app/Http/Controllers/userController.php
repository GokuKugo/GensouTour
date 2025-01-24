<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\contact;
use Illuminate\Validation\Rules\Password;
use App\Models\locations;
use App\Models\purchases;

class userController extends Controller
{
    /*<===== User's register function ======>*/
    function Cregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|max:15',
            'password' => ['required', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()],
            'password_confirm' => 'required|same:password'
        ]);
        //Insert Into
        $User = new User;
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->admin = false;
        $User->Save();
        $auth = $request->only('name', 'email', 'phone', 'password');
        if (Auth::attempt($auth)) {
            return redirect('profile');
        }
    }
    /*<===== User's Login Function ======>*/
    function Clogin(Request $request)
    {
        $login = $request->input('email');
        $user = User::where('email', $login)->orWhere('phone', $login)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['password' => 'Wrong password or this account not approved yet.']);
        }
        $request->validate([
            'password' => 'required',
            'email' => 'required'
        ]);
        if (
            Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
            Auth::attempt(['phone' => $user->phone, 'password' => $request->password])
        ) {
            Auth::loginUsingId($user->id);
            return redirect('/profile');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'password' => 'Wrong password or this account not approved yet.',
            ]);
        }
    }
    /*<===== User's Profile Function ======>*/
    function Cmypage()
    {
        if (Auth::check()) {
            return view('profile', [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'date' => Auth::user()->created_at,
                'TicketsBought' => locations::select('locations.location', 'locations.stadium', 'purchases.ticketpcs')
                    ->join('purchases', 'locations.idlocations', '=', 'purchases.idlocations')
                    ->orWhere('purchases.users_id', '=', Auth::User()->id)
                    ->get()

            ]);
        } else {
            return redirect('/');
        }
    }
    public function Cresetpasswordprw()
    {
        if (Auth::check()) {
            return view("reset-password");
        } else {
            return redirect("/");
        }
    }
    /*<===== User's password reset function ======>*/
    function Cresetpassword(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'password' => ['required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()],
                'password_confirmation' => 'required|same:password'
            ]);
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect('profile');
        } else {
            return redirect('/');
        }
    }
    /*<===== User's Logout function ======>*/
    function Clogout()
    {
        if (Auth::check()) {
            Session::flush();
            Auth::logout();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function Cdeleteprw()
    {
        if (Auth::check()) {
            return view("delete");
        } else {
            return redirect("/");
        }
    }
    /*<===== User's account delete function ======>*/
    public function Cdelete(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'delete' => 'required|in:DELETE',
            ]);
            User::findOrFail(Auth::user()->id)->delete([ /* or Forcedelete */
                User::all()
            ]);
            return Redirect('/');
        } else {
            return Redirect('/');
        }
    }
    /*<===== Contact to the Database + If theres no User, use the id 1 as a Anonymus/Guest user  ======>*/
    public function Ccontactin()
    {
        return view('contact');
    }

    public function Ccontact(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:15',
            'lastname' => 'required|max:15',
            'contactemail' => auth()->check() ? '' : 'required|email',
            'messages' => 'required|max:255',
        ]);
        $contact = new contact;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        if (Auth::check()) {
            $contact->contactemail = Auth::user()->email;
            $contact->users_id = Auth::user()->id;
        } else {
            $contact->contactemail = $request->contactemail;
            $contact->users_id = 1;
        }
        $contact->messages = $request->messages;
        $contact->Save();
        return view('success', ['sv' => 'Message successfully sent!']);
    }

    /*<=====  Ticket purchase, if theres no user, need to login, if all tickets sold out, user cant buy ======>*/
    public function CTickGet(Request $request, $id)
    {
        $request->validate([
            'nmbticket' => 'required|min:1|max:5',
        ]);
        $tk = locations::where('idlocations', "=", $id)->first();
        $tk->AvailTicket = $tk->AvailTicket - $request->nmbticket;
        $tk->Save();

        $ps = new purchases;
        $ps->idlocations = $tk->idlocations;
        $ps->users_id = Auth::user()->id;
        $ps->ticketpcs = $request->nmbticket;
        $ps->time = now();
        $ps->Save();

        return view('success', ['sv' => 'Succesfully bought ' . $request->nmbticket . ' ticket to the ' . $tk->location . ' - ' . $tk->stadium . '!']);
    }
    public function Cdownload($file_name)
    {
        if(Auth::check()){
            $file_path = public_path($file_name);
            return response() -> download($file_path);
        }
        else{
            return redirect('/');
        }

    }
    public function Csuccess(){
        if(empty($sv)){
            return redirect('/');
        }
        else{
            return view('success');
        }
    }
}
