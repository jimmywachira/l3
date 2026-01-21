<?php

use App\Livewire\Search;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Livewire\ShowArticle;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\Dashboard;
use App\Livewire\CreateArticle;
use App\Livewire\EditArticle;
use App\Livewire\Login;
use Illuminate\Support\Facades\Auth;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', Login::class)->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Route::get('/register', Register::class)->name('register');

#Route::get('/search', Search::class)->name('search');
#Route::get('/articles', ShowArticle::class)->name('articles.index');

Route::get('/articles/{article}', ShowArticle::class)->name('articles.show');
Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/dashboard/articles', ArticleList::class)->name('dashboard.articles')->middleware('auth');
Route::get('/dashboard/articles/create', CreateArticle::class)->name('dashboard.articles.create')->middleware('auth');
Route::get('/dashboard/articles/{article}/edit', EditArticle::class)->name('dashboard.articles.edit')->middleware('auth');
Route::get('/', ArticleIndex::class)->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('profile.edit');
//     Route::get('settings/password', Password::class)->name('user-password.edit');
//     Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

//     Route::get('settings/two-factor', TwoFactor::class)
//         ->middleware(
//             when(
//                 Features::canManageTwoFactorAuthentication()
//                     && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
//                 ['password.confirm'],
//                 [],
//             ),
//         )
//         ->name('two-factor.show');
// });
