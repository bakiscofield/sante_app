<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Face_to_faceController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AddresseController;
use App\Http\Controllers\On_lineController;
use App\Http\Controllers\CancelationPolitiqueController;
use App\Http\Controllers\SheduleController;
use App\Http\Controllers\SpecialityController;

use App\Http\Controllers\UniteController;

use App\Http\Controllers\ChatsController;

use App\Http\Controllers\ImportExportController;


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
// routes/web.php

require __DIR__.'/auth.php';


Route::get('/', [ChatsController::class, 'index']);
Route::get('messages', [ChatsController::class, 'fetchMessages']);
Route::post('messages', [ChatsController::class, 'sendMessage'])->name("sendMessage");



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('chats/create', [ChatController::class, 'createMeeting'])->name('chats.create');
// Route::get('chats/callback', [ChatController::class, 'callback'])->name('chats.callback');
// Route::get('chats', [ChatController::class, 'showConversation'])->name('chats.conversations');
// Route::post('chats', [ChatController::class, 'storeMeeting'])->name('chats.store');
// Route::get('chats/{eventId}', [ChatController::class, 'showMeeting'])->name('chats.show');





// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Route::get('/create_staff', function () {
//     return view('staffs.create');
// });

// Route::get('/create_consultant', [ConsultantController::class, 'profile_confirm']);

// Route::resources([
//     'patients'=> PatientController::class,
//     'consultants' => ConsultantController::class,
//     'tarifs' => TarifController::class,
//     'payement_modes' => PayementController::class,
//     'consultations' => ConsultationController::class,
//     'staffs' => StaffController::class,
//     'events'=> EventController::class,
//     'face_to_faces' => Face_to_faceController::class,
//     'days' => DayController::class,
//     'images' => ImageController::class,
//     'addresses' => AddresseController::class,
//     'on_lines' => On_lineController::class,
//     'cancelation_politiques'=> CancelationPolitiqueController::class,
//     'schedules'=> sheduleController::class,
//     'specialitys' => specialityController::class,
//     'unite' => uniteController::class,
// ]);

// Route::get('/tarif/{$consultant}', [TarifController::class, 'tarif'])->name('consultant.tarif');

// Route::put('/consultations/{consultation}/confirmer', [ConsultationController::class, 'confirmer'])->name('consultations.confirmer');
// Route::put('/consultations/{consultation}/rejeter', [ConsultationController::class, 'rejeter'])->name('consultations.rejeter');

// Route::put('/consultants/{consultant}/confirmer', [ConsultantController::class, 'confirmed_profile'])->name('consultants.profile_confirm');
// Route::put('/consultants/{consultant}/rejeter', [ConsultantController::class, 'rejected_profile'])->name('consultants.rejected_profile');

// Route::put('/consultations/{consultation}/realiser', [ConsultationController::class, 'realiser'])->name('consultations.realiser');
// Route::put('/consultations/{consultation}/manquer', [ConsultationController::class, 'manquer'])->name('consultations.manquer');

// Route::put('/patients/{patient}/activer', [PatientController::class, 'activer'])->name('patients.activer');
// Route::put('/patients/{patient}/desactiver', [PatientController::class, 'desactiver'])->name('patients.desactiver');

// Route::controller(ImportExportController::class)->group(function(){
//     Route::get('import_export', 'importExport');
//     Route::post('import', 'import')->name('import');
//     Route::get('export', 'export')->name('export');
// });

// Route::get('/tarif/{$consultant}', [TarifController::class, 'tarif'])->name('consultant.tarif');
