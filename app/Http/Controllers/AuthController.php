<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            if (!$request->filled(['email', 'password'])) {
                return view('auth.login', [
                    'title' => 'Login Page',
                    'error' => 'Please fill in all fields.'
                ]);
            }

            $credentials = $request->only(['email', 'password']);

            if (auth()->attempt($credentials)) {
                return redirect('/posts');
            } else {
                return view('auth.login', [
                    'title' => 'Login Page',
                    'error' => 'You have entered an invalid email or password.'
                ]);
            }
        }

        return view('auth.login', ['title' => 'Login Page']);
    }

    public function register(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            if (!$request->filled(['username', 'email', 'password', 'confirm-password'])) {
                return view('auth.register', [
                    'title' => 'Register Page',
                    'error' => 'Please fill in all fields'
                ]);
            }

            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            $confirmPassword = $request->input('confirm-password');

            if ($password !== $confirmPassword) {
                $request->flashOnly(['username', 'email']);

                return view('auth.register', [
                    'title' => 'Register Page',
                    'error' => 'Passwords do not match.'
                ]);
            }

            if (User::where('username', $username)->exists()) {
                $request->flashOnly(['username', 'email']);

                return view('auth.register', [
                    'title' => 'Register Page',
                    'error' => 'Username is already taken.'
                ]);
            }

            if (User::where('email', $email)->exists()) {
                $request->flashOnly(['username', 'email']);

                return view('auth.register', [
                    'title' => 'Register Page',
                    'error' => 'Email address is already taken.'
                ]);
            }

            try {
                $user = User::create([
                    'name' => $username,
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($password)
                ]);

                event(new Registered($user));
            } catch (\Exception $e) {
                return view('auth.register', [
                    'title' => 'Register Page',
                    'error' => 'An error occurred. Please try again later.<br />' . $e->getMessage()
                ]);
            }
        }

        return view('auth.register', ['title' => 'Register Page']);
    }

    public function notAuthorized(): View
    {
        return view('auth.not-authorized', ['title' => 'Not Authorized']);
    }

    public function verifyNotice(): View
    {
        return view('auth.verify-email', ['title' => 'Verify Email']);
    }
}
