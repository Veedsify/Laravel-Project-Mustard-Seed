<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver("google")->stateless()->redirect();
    }

    public function authCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect(route('home'))->with('success', 'Login Successful');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('password'),
                    'username' => '@mus_' . strtolower(Str::random(10)),
                    'avatar' => $user->avatar,
                    'cover' => asset('images/placeholder.jpg'),
                    'role' => 'user',
                    'bio' => '',
                    'google_id' => $user->id,
                    'email_verified_at' => time()
                ]);

                $role = Role::where('name', 'user')->first();
                $user->attach($role);

                Auth::login($newUser);
                return redirect(route('home'))->with('success', 'Login Successful');
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect(route("register"))->with('error', "Google Authentication Failed");
        }
    }
}
