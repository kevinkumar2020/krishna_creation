<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\masterControlle;
use App\Http\Controllers\partyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','login');
Route::post('/login',[userController::class,'login']);

Route::get('/logout',[userController::class,'logout']);

Route::get('/master_dashboard',[masterControlle::class,'dashboard']);

// Route::get('/signup',[userController::class,'display']);

//Master // User
Route::get('/userdisplay',[masterControlle::class,'userDisplay']);
Route::get('/createuserView',[masterControlle::class,'createuserView']);
Route::post('/createNewUser',[masterControlle::class,'createNewUser']);
Route::get('/update-user-view/{id}',[masterControlle::class,'updateUserView']);
Route::post('/userupdate',[masterControlle::class,'userUpdate']);
Route::get('/userdelete/{id}',[masterControlle::class,'userDelete']);
Route::get('/user-profile',[masterControlle::class,'userProfile']);
Route::post('/user-password-update',[masterControlle::class,'userPasswordUpdate']);

// Party
Route::get('/party-display',[partyController::class,'partyDisplay']);
Route::get('/party-create-view',[partyController::class,'partyCreateView']);
Route::post('/party-create',[partyController::class,'partyCreate']);
Route::get('/party-update-view/{id}',[partyController::class,'partyUpdateView']);
Route::post('/party-update',[partyController::class,'partyUpdate']);
Route::get('/party-delete/{id}',[partyController::class,'partyDelete']);