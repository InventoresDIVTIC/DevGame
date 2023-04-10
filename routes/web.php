<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//buscar perfil
Route::post('/buscar', [PerfilController::class, 'buscar'])->name('perfil.buscar');


//Ruta para el Juego
Route::get('/game-devgame', [GameController::class, 'index'])->name('game.index');
Route::get('/game-devgame/user', [GameController::class, 'userData'])->name('game.user');
Route::get('/game-devgame/davo', [GameController::class, 'davoData']);


//Route::get('/muro', [PostController::class,'index'])->name('posts.index');
Route::get('/{user:username}', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Mostrar preguntas
Route::get('{user:username}/questions', [QuestionController::class, 'index'])->name('question.index');

//Registrar preguntas
Route::get('{user:username}/questions/register', [QuestionController::class, 'store'])->name('question.store');
Route::post('{user:username}/questions/register', [QuestionController::class, 'store'])->name('question.store');

//Editar Preguntas
Route::get('{user:username}/questions/edit/{question}', [QuestionController::class, 'edit'])->name('question.edit');
Route::post('{user:username}/questions/edit/{question}', [QuestionController::class, 'edit'])->name('question.edit');

//Eliminar preguntas
Route::delete('{user:username}/questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');

//Siguiendo usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

//Likes
// Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
// Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');









