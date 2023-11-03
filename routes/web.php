<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/greeting/{nombre?}/{apellido?}', function (string $nombre = 'johnn', ?string $apellido = "X") {
    return view('home_work', ['nombre' => $nombre, 'apellido' => $apellido]);
})->where(['nombre' => '[a-z]+', 'apellido' => '[a-z]+']);

Route::get('/saludo/{nombre}/{apellido?}', function (string $nombre, ?string $apellido = "X") {
    return 'Hola ' . $nombre . ' ' . $apellido;
})->where(['nombre' => '[a-z]+', 'apellido' => '[a-z]+']);

//se ingresa operacion/n1/n2/suma (operacion elegida)
Route::get('/operacion/{n1}/{n2}/{operacion}', function ($n1, $n2, $operacion) {
    if ($operacion === 'suma') {
        return $n1 + $n2;
    } elseif ($operacion === 'resta') {
        return $n1 - $n2;
    } elseif ($operacion === 'multiplicacion') {
        return $n1 * $n2;
    } elseif ($operacion === 'division') {
        if ($n2 == 0) {
            return 'No se puede dividir por cero';
        } else {
            return $n1 / $n2;
        }
    } else {
        return 'Operación no válida. Las operaciones válidas son: suma, resta, multiplicacion, division.';
    }
})->where(['n1' => '[0-9]+', 'n2' => '[0-9]+', 'operacion' => 'suma|resta|multiplicacion|division']);
