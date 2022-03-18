<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\masterControlle;
use App\Http\Controllers\partyController;
use App\Http\Controllers\challanController;
use App\Http\Controllers\jobcardController;
use App\Http\Controllers\inhouseController;
use App\Http\Controllers\outhouseController;
use App\Http\Controllers\threadcuttingController;
use App\Http\Controllers\stitchingController;

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

// Challan
Route::get('/challan-display',[challanController::class,'challanDisplay']);
Route::get('/challan-create-view',[challanController::class,'challanCreateView']);
Route::post('/challan-create',[challanController::class,'challanCreate']);
Route::get('/challan-update-view/{id}',[challanController::class,'challanUpdateView']);
Route::post('/challan-update',[challanController::class,'challanUpdate']);
Route::get('/challan-delete/{id}',[challanController::class,'challanDelete']);

// Jobcard
Route::get('/jobcard-display',[jobcardController::class,'jobcardDisplay']);
Route::get('/jobcard-create-view',[jobcardController::class,'jobcardCreateView']);
Route::post('/jobcard-create',[jobcardController::class,'jobcardCreate']);
Route::get('/jobcard-update-view/{id}',[jobcardController::class,'jobcardUpdateView']);
Route::post('/jobcard-update',[jobcardController::class,'jobcardUpdate']);
Route::get('/jobcard-delete/{id}',[jobcardController::class,'jobcardDelete']);
Route::get('/jobcard-preview/{id}',[jobcardController::class,'jobcardPreview']);

// InHouse
Route::get('/inhouse-display',[inhouseController::class,'inhouseDisplay']);
Route::get('/inhouse-insert-view/{id}',[inhouseController::class,'inhouseInsertView']);
Route::post('/inhouse-insert',[inhouseController::class,'inhouseInsert']);
Route::get('/inhouse-update-view/{id}',[inhouseController::class,'inhouseUpdateView']);
Route::post('/inhouse-update',[inhouseController::class,'inhouseUpdate']);
Route::get('/inhouse-done/{id}',[inhouseController::class,'inhouseDone']);

// OutHouse
Route::get('/outhouse-display',[outhouseController::class,'outhouseDisplay']);
Route::get('/outhouse-insert-view/{id}',[outhouseController::class,'outhouseInsertView']);
Route::post('/outhouse-insert',[outhouseController::class,'outhouseInsert']);
Route::get('/outhouse-update-view/{id}',[outhouseController::class,'outhouseUpdateView']);
Route::post('/outhouse-update',[outhouseController::class,'outhouseUpdate']);
Route::get('/outhouse-done/{id}',[outhouseController::class,'outhouseDone']);

// ThreadCutting
Route::get('/threadcutting-display',[threadcuttingController::class,'threadcuttingDisplay']);
Route::get('/threadcutting-insert-view/{id}',[threadcuttingController::class,'threadcuttingInsertView']);
Route::post('/threadcutting-insert',[threadcuttingController::class,'threadcuttingInsert']);
Route::get('/threadcutting-update-view/{id}',[threadcuttingController::class,'threadcuttingUpdateView']);
Route::post('/threadcutting-update',[threadcuttingController::class,'threadcuttingUpdate']);
Route::get('/threadcutting-done-view/{id}',[threadcuttingController::class,'threadcuttingDoneView']);
Route::post('/threadcutting-done',[threadcuttingController::class,'threadcuttingDone']);

