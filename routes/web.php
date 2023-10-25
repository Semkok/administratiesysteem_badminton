<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AddMemberToTournamentController;
use App\Http\Controllers\SearchController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::resources(['members' => MemberController::class, 'tournaments' => TournamentController::class]);
Route::get('/addMembers/{id}', [AddMemberToTournamentController::class, 'displayPage'])->name('addMembers.display');
Route::post('/addMember/{id}', [AddMemberToTournamentController::class, 'addMember'])->name('addMemberToTournament');
Route::post('/deleteMemberTournament/{id}', [AddMemberToTournamentController::class, 'deleteFromTournament'])->name('deleteMemberTournament');
Route::get('/search', [SearchController::class, 'search'])->name('search');



require __DIR__.'/auth.php';

