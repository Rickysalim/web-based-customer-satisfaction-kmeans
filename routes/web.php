<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\RespondentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/',[AuthController::class, 'index'])->name('index');
    Route::post('/attempt/login',[AuthController::class, 'attemptLogin'])->name('attempt-login');
});

Route::get('/question',[RespondentController::class, 'index'])->name('question');
Route::post('/save-respondent',[RespondentController::class, 'saveRespondent'])->name('save-respondent');

Route::middleware('auth')->group(function () {
    Route::middleware('auth.session')->group(function () {
        // Route::redirect('/', '/dashboard');
        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/',[HomeController::class, 'index'])->name('index');
        });
        Route::get('/logout',[AuthController::class, 'attemptLogout'])->name('logout');
        Route::get('/analytics',[AnalyticController::class, 'index'])->name('analytics');
        Route::get('/list-respondent',[RespondentController::class, 'get_list_respondent'])->name('list-respondent');
    });
});


