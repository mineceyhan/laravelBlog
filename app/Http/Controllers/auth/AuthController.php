<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\UserCompany;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email|email',
            'company' => 'required|string',
            'password' => 'required|string|confirmed|min:8'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => 0,
        ]);
        UserCompany::create([
            'user_id' => $user->id,
            'company' => $request->company,
        ]);
        return view('auth/login');
    }

    public function login(Request $request){
        $request->validate([
            'email' =>  'required|string|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            $user = User::find(Auth::id());

            if($user->type == 1){
                return redirect()->intended('admin/dashboard');
            }
            else{
                return redirect()->intended('user/blogs');
            }
        }
        return response([
            'message' =>back()->withErrors([
                'email' => 'Kimlik bilgileri kayıtlarımızla eşleşmiyor.',
            ])->onlyInput('email')
        ], 401); 
    }

    public function logout(Request $request){

        if(Auth::check()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('loginPage');
        }
    }
}
