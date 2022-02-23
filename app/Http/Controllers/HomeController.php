<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Support\Redirect;
use Mail;

use App\Mail\AutoMail;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::User();
        return view('home',compact('auth'));
    }

    public function SaveInfo(Request $request){
        //dd($request->firstname);
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|numeric|digits_between:2,3'
        ]);
        

        $user = User::where('id',Auth::User()->id)
                    ->update([
                        'firstname' => $request->firstname,
                        'lastname' => $request->lastname,
                        'age' => $request->age,
                        'address' => $request->address,
                    ]);
        //return $user;
        /**/
        return redirect(route('home'));
    }

    public function ChangePassword(Request $request){
        if($request->newpassword !== $request->confirm_password){
            return redirect()->back()->withErrors(['newpassword' => 'Password not Match']);
        }
        $check = Hash::check($request->oldpassword, Auth::User()->password);
        if(!$check){
            return redirect()->back()->withErrors(['oldpassword' => 'Incorrect Password ' . $check]);
        }
        
        User::where('id',Auth::User()->id)
                        ->update([
                            'password' => Hash::make($request->newpassword)
                        ]);
        
        return redirect()->back()->withErrors(['success' => 'Successfully Changed Password']);

    }

    public function AccountDelete(Request $request){
        $check = Hash::check($request->password, Auth::User()->password);
        if(!$check){
            return redirect()->back()->withErrors(['deletefailed' => 'Incorrect Password ' . $check]);
        }
        
        User::where('id',Auth::User()->id)
                        ->delete();
        
        return redirect('login');

    }

    public function AutoMail(){
        Mail::to('francismickobienes@gmail.com')->send(new AutoMail);
        return 1;
    }
}
