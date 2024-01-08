<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Home del Promotor
Route::get('/promotor/promoterhome', function () {
    return view('promotor.promoterhome');
})->name('promotor.promoterhome')->middleware('isPromotor');

// Sobre Nosotros
Route::get('/tickets/aboutus', function () {
    return view('tickets.aboutus');
})->name('tickets.aboutus');

// Avisos Legales
Route::get('/tickets/legalnotice', function () {
    return view('tickets.legalnotice');
})->name('tickets.legalnotice');

// Mostrar Evento
Route::get('/tickets/showevent/{id}', function () {
    return view('tickets.showevent');
})->name('tickets.showevent');

// Comprar Entradas
Route::get('/tickets/buytickets', function () {
    return view('tickets.buytickets');
})->name('tickets.buytickets');

// Home Administradores
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('ruta.admin')->middleware('isAdmin');;

//Perfil
Route::get('/user/profile', function () {
    return view('user.profile');
})->name('user.profile');


// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

// Mostrar formulario para solicitar restablecimiento de contraseña
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Enviar enlace de restablecimiento de contraseña
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Mostrar formulario para restablecer la contraseña
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Procesar el restablecimiento de contraseña
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

