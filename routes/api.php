<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\CreateNewUser;
use App\Livewire\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


// Route::apiResource('users', User::class);

Route::post('/users', function (Request $request) {
    $user = (new CreateNewUser())->create([
        'name' => $request->name ?? 'Test User',
        'email' => $request->email ?? 'test@example.com',
        'password' => $request->password ?? 'password',
        'remember' => true,
    ]);

    return $user;
});

Route::post('/login', Login::class
//  function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate();

//         return response()->json(['message' => 'Login successful'], 200);
//     }

//     return response()->json(['message' => 'Invalid credentials'], 401);
// }
);

Route::get('/user/{user}', function (User $user) {
    return $user;
});

Route::patch('/user/{user}', function (User $user, Request $request) {
    $user = (new CreateNewUser())->create([
        'id' => $user->id,
        'name' => $request->name,
        'email' => $request->email ,
        'password' => $request->password,
        'remember' => true,
    ]);

    return $user;
});

Route::delete('/user/{user}', function (User $user) {
     $user->delete();
     return response()->json(['message' => 'User deleted successfully']);
});
