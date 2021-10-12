<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\WelcomeController;
use App\Http\controllers\UserController;
use App\Http\controllers\ContactController;
use App\Http\controllers\PhotoController;
use App\Http\controllers\RgpdController;




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








Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::get('/rgpd/', [RgpdController::class, 'index']);

Route::get('home', [WelcomeController::class, 'index']);

Route::get('contact', [ContactController::class, 'create']); 

Route::post('contact', [ContactController::class, 'confirm']); 

Route::get('photos', [PhotoController::class, 'upload']);

Route::post('photos', [PhotoController::class, 'store']);

Route::fallback(function() {
    return view('404'); // la vue 404.blade.php
 });


    




    












//passage numero
Route::get('article/{n}', function ($n) {
    return view('article')->with('numero', $n);
})->where('n', '[1-9]+');

Route::get("article/{n}", function ($n) {
    return view('article', ['numero'=>$n])->with('numero', $n);
})->where('n', '[1-9]+');

// //lancer telechargement (type mim)
// Route::get('roger', function () {
//     return response('roger', 206)->header('content-type', 'application/octet-stream');
// });

// //renvois du tableau donc en json 
// Route::get('marcel', function () {
//     return ['un', 'deux', 'trois'];
// });


// route sans vue
// Route::get('{p}', function ($p) {
//     return "je suis la page $p";
// });

//contraindre type de la donnée dans l'url (regex)
// Route::get('{p}', function ($p=99) {
//     return "je suis la page $p";
// })->where('p', '(1-3)');

// //nommer une route
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
//appel de la route home ---> route(home)

//contraindre type de la donnée dans l'url avec seulement des nombres
// Route::get('{n}', function ($n) {
//     return "je suis la page $n";   
// })->where('n', '[1-9]+');

// Route::get('contact', function () {
//     return "je suis la page $n"; 
// });

