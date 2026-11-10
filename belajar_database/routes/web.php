
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

// Route Halaman Utama
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Route Login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Pengalihan berdasarkan role pengguna
        if ($request->user()->role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        if ($request->user()->role === 'user') {
            return redirect()->route('dashboard.user');
        }

        // Jika role tidak dikenali
        Auth::logout();

        return redirect()->route('login')->withErrors([
            'email' => 'Role pengguna tidak dikenali.',
        ]);
    }

    // Jika email atau password salah
    return back()->withErrors([
        'email' => 'Email atau password tidak sesuai.',
    ])->onlyInput('email');
})->name('login.authenticate');

// Route Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

// Route Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Route Dashboard Admin
    Route::get('/admin/dashboard', function () {
        abort_unless(request()->user()?->role === 'admin', 403);

        return view('dashboards.admin');
    })->name('dashboard.admin');

    // Route Dashboard User
    Route::get('/user/dashboard', function () {
        abort_unless(request()->user()?->role === 'user', 403);

        return view('dashboards.user');
    })->name('dashboard.user');

    // Route Produk
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});
