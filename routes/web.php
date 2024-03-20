<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\voteController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\dashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'loginAuth'])->middleware('guest');
Route::get('/logout', [loginController::class, 'logout'])->middleware('auth');
Route::get('/register', [loginController::class, "register"])->middleware('guest');
Route::post('/register', [loginController::class, "registerProses"])->middleware('guest');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/upload-photo');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/upload-photo', [loginController::class, "uploadPhoto"])->middleware(['auth', 'verified']);
Route::post('/upload-photo', [loginController::class, "postPhoto"])->middleware(['auth', 'verified']);
Route::post('/resend-verification-email', [loginController::class, "resendEmail"])->name('verification.resend')->middleware('auth');


Route::get('/cekakun', [AccountController::class, "cekakun"])->middleware('guest');
Route::post('/cekakun', [AccountController::class, "cekAcc"])->middleware('guest');


Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', [dashboardController::class, 'dashboard']);
    Route::get('/candidates', [CandidateController::class, 'candidates']);
    Route::get('/add-candidate', [CandidateController::class, 'addCandidate']);
    Route::post('/add-candidate', [CandidateController::class, 'postCandidate'])->name('createCandidate');
    Route::get('/edit-candidate/{id}', [CandidateController::class, 'editCandidate']);
    Route::put('/edit-candidate/{id}', [CandidateController::class, 'updateCandidate'])->name('updateCandidate');
    Route::get('/add-vision', [CandidateController::class, 'addCandidateVision']);
    Route::post('/add-vision', [CandidateController::class, 'postCandidateVision'])->name('createVision');
    Route::get('/add-mission', [CandidateController::class, 'addCandidateMission']);
    Route::post('/add-mission', [CandidateController::class, 'postCandidateMission'])->name('createMission');
    Route::get('/list-voters',[voteController::class, "setVote"]);
});


    Route::get('/vote/bem', [voteController::class, "votebem"])->middleware(['bem','auth','verified']);
    Route::get('/vote/blm', [voteController::class, "voteblm"])->middleware(['blm','auth','verified']);
