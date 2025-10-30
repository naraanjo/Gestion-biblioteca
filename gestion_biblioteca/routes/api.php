
<?php
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Llama a ApiController
// URI libros
Route::get('/libros',[ApiController::class, 'index']);
Route::post('/libros',[ApiController::class,'store']);
Route::delete('/libros/{id}',[ApiController::class,'destroy']);

?>

