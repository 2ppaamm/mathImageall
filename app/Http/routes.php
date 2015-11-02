<?php


Route::get('/', 'PagesController@home');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/notices', function() {
   return view('pages.notices');
});

Route::resource('questions', 'QuestionController');
Route::post('questions/{id}', 'QuestionController@update');
Route::resource('skills', 'SkillController',['except' => ['update', 'edit', 'show']]);
Route::post('skills/{id}', 'SkillController@update');
Route::resource('difficulties', 'DifficultyController', ['except' => ['update', 'edit', 'show']]);
Route::post('difficulties/{id}', 'DifficultyController@update');
Route::resource('levels', 'LevelController', ['except' => ['update', 'edit', 'show']]);
Route::post('levels/{id}', 'LevelController@update');
Route::resource('tracks', 'TrackController',['except' => ['update', 'edit', 'show']]);
Route::post('tracks/{id}', 'TrackController@update');
Route::resource('images', 'ImageController', ['only' => ['store']]);

Route::get('getTracks', function(){
   return \App\Track::lists('description','id');
});

Route::get('/learn', function(){
   return view('learn.index');
});

Route::get('/quiz', function(){
   return view('quiz.index');
});
Route::post('/quiz/{id}', 'QuizController@update');

Route::get('/quizdata', 'QuizController@index');

// load database
Route::get('/loadall', 'LoadController@loadall');

// learn data
Route::get('/learndata', 'LearnController@index');

