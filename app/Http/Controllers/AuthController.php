<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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

            // Attempt to find a user by Google ID
            $findUser = User::where('google_id', $user->id)->first();

            // If user found by Google ID, log them in
            if ($findUser) {
                Auth::login($findUser);
                $role = $findUser->roles()->first();

                // Redirect based on role
                if ($role) {
                    switch ($role->name) {
                        case 'admin':
                            return redirect('/admin')->with('success', 'Login Successful');
                        case 'volunteer':
                            return redirect('/dashboard/volunteer')->with('success', 'Login Successful');
                        default:
                            return redirect('/user')->with('success', 'Login Successful');
                    }
                }
            }

            // If user not found by Google ID, check by email
            $dbUser = User::where('email', $user->email)->first();

            if (!$dbUser) {
                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('password'), // Consider using a better default password handling
                    'username' => '@mus_' . strtolower(Str::random(10)),
                    'avatar' => $user->avatar,
                    'role' => 'user',
                    'cover' => asset('images/placeholder.jpg'),
                    'bio' => '',
                    'admin_approved' => true,
                    'google_id' => $user->id,
                    'email_verified_at' => now(), // Use Carbon for a more precise timestamp
                ]);

                // Attach the default role
                $role = Role::where('name', 'user')->first();
                if ($role) {
                    $newUser->roles()->attach($role);
                }

                // Send Welcome Email (implement the email sending logic)
                Auth::login($newUser);
                return redirect(route('home'))->with('success', 'Login Successful');
            } else {
                $dbUser->google_id = $user->id;
                Auth::login($dbUser);
                $role = $dbUser->roles()->first();
                if ($role) {
                    switch ($role->name) {
                        case 'admin':
                            return redirect('/admin')->with('success', 'Login Successful');
                        case 'volunteer':
                            return redirect('/dashboard/volunteer')->with('success', 'Login Successful');
                        default:
                            return redirect('/user')->with('success', 'Login Successful');
                    }
                }
            }

            // If no user is found, consider handling the case (optional)
            return redirect()->back()->withErrors(['email' => 'No user found.']);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect(route("register"))->with('error', "Google Authentication Failed");
        }
    }
}
