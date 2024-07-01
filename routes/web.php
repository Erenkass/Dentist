<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Admin\AdminContoller;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ToothController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [AdminContoller::class,'anasayfaIndex'])->name('welcome');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Custom Register Route
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   Route::get('/hastalar',[PatientController::class,'index'])->name('patients.index');
   Route::get('/hastalar/ekle',[PatientController::class,'create'])->name('patients.create');

   Route::post('/hastalar/ekle',[PatientController::class,'store'])->name('patients.store');
   Route::get('/hastalar/{id}',[PatientController::class,'edit'])->name('patients.edit');
   Route::post('/hastalar/{id}',[PatientController::class,'update'])->name('patients.update');
   Route::get('/hastalar/sil/{id}',[PatientController::class,'delete'])->name('patients.delete');

   Route::get('/profil',[AdminContoller::class,'profile'])->name('profile');
   Route::get('/profil-düzenle/{id}',[AdminContoller::class,'editProfile'])->name('edit_profile');
   Route::post('/profile/{id}',[AdminContoller::class,'update'])->name('admin.update');

   Route::get('/randevular', [AppointmentController::class,'index'])->name('appointments.index');
   Route::get('/randevular/ekle',[AppointmentController::class,'create'])->name('appointments.create');
   Route::post('randevular/ekle',[AppointmentController::class,'store'])->name('appointments.store');
   Route::get('/randevular/{id}',[AppointmentController::class,'edit'])->name('appointments.edit');
   Route::post('/randevular/{id}',[AppointmentController::class,'update'])->name('appointments.update');
   Route::get('/randevular/sil/{id}',[AppointmentController::class,'delete'])->name('appointments.delete');


   Route::get('/hastalar/{patient}/diş', [PatientController::class, 'showTeeth'])->name('patients.teeth.show');
    Route::post('/hastalar/{patient}/diş/{toothId?}', [PatientController::class, 'storeProcess'])->name('patients.teeth.store');
   Route::get('/hastalar/teeth/{id}/sil', [PatientController::class, 'deleteTeeth'])->name('patients.teeth.delete');

    Route::get('/geçmişRandevular',[AppointmentController::class,'pastAppointment'])->name('past');
    Route::get('/patients/{patient}/teethmap', [ToothController::class, 'index'])->name('patients.teethmap');



});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
