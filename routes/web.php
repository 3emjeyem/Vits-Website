<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('login');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/merchandise', function () {
    return view('merchandise');
});

Route::get('/ceit', function () {
    return view('ceit');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/main', function () {
    return view('main');
});


Route::post('/signup', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|max:50|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    // Create user (password will be hashed by cast or we can use bcrypt)
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role' => 'User',
    ]);

    return redirect('/login');
});

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'identifier' => 'required|string',
        'password' => 'required|string',
    ]);

    // Try to find user by email first, then by name
    $user = User::where('email', $data['identifier'])->orWhere('name', $data['identifier'])->first();

    if ($user && Hash::check($data['password'], $user->password)) {
        Auth::login($user);
        // Update last login timestamp
        $user->lastlogindate = now();
        $user->save();

        return redirect('/main');
    }

    return redirect('/login')->withErrors(['login' => 'Invalid credentials']);
});



// Admin login (static credentials)
Route::get('/admin-login', function () {
    return view('admin-login');
});

Route::post('/admin-login', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'password' => 'required|string',
    ]);

    $name = $data['name'];
    $password = $data['password'];

    // Static credential pairs
    $validPairs = [
        'admin' => 'awsd123',
        'SAdmin' => 'qwer1234',
    ];

    if (array_key_exists($name, $validPairs) && $validPairs[$name] === $password) {
        // Mark session as admin authenticated and store role
        session(['admin_authenticated' => true, 'admin_name' => $name]);
        return redirect('/main');
    }

    return redirect('/admin-login')->withErrors(['admin' => 'Invalid admin credentials']);
});




