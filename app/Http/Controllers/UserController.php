<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    //
    public function create()
    {
        return view('user.register');
    }
    public function viewLogin()
    {
        return view('user.login');
    }
    public function register(UserRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $user = User::create($data);
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role->id);
        Auth::login($user);

        // return $user->roles->first()->name;
        return redirect('expense');
    }
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            # code...
            Auth::login($user);
            // if ($user->roles->contains('name', 'admin')) {
            //     # code...
            //     return redirect('adminpanal');
            // }
            return redirect('expense');

        }
        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.'
                ])
            ->withInput($request->only('email','password'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/user/login');


    }
}
