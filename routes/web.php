<?php


use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchPlayerController;
use Illuminate\Support\Facades\Route;

Route::resource('teams', TeamController::class);
Route::resource('teams.players', PlayerController::class);
Route::resource('teams.matches', MatchController::class);
Route::resource('match.players', MatchPlayerController::class);

