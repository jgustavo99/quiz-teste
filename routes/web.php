<?php

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

// Tela inicial do Quiz
Route::get('/', 'QuizController@index')->name('quiz.index');

// Etapas do Quiz
Route::get('/bandeiras/{step}', 'StepController@show')->name('quiz.step');
Route::post('/bandeiras/{step}', 'StepController@save')->name('quiz.step.save');

// Resultado do Quiz
Route::get('resultado', 'QuizController@finish')->name('quiz.finish');
