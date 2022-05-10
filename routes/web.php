<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportInventoryController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\ReportTransferController;
use App\Http\Controllers\StockController;
use App\Models\Stock;

//Route untuk Login
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);

Route::middleware(['isAdmin'])->group(function(){
Route::get('/home', function () {
    return view('home');
});

//Route untuk Master User (SVCRUD)
Route::resource('masteruser', UsersController::class);

//Route untuk Master Position (SVCRUD)
Route::resource('masterposition',PositionController::class);

//Route untuk Master Brand (SVCRUD)
Route::resource('masterbrands', BrandController::class);

//Route untuk Master Item (SVCRUD)
Route::resource('masteritem', ItemController::class);

Route::resource('transfer', TransferController::class);

Route::resource('reporttransfer', ReportTransferController::class);

Route::resource('reportinventory', ReportInventoryController::class);

// Route::get('/Taken', 'TransferController@Taken', TransferController::class);

Route::get('/Taken', [TransferController::class, 'Taken']);
Route::get('/Return', [TransferController::class, 'Return']);
Route::get('/EditTaken', [TransferController::class, 'EditTaken']);
Route::resource('inventory', StockController::class);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// Route yang dibawah ini ntar bakal aku hapus sementara biar bisa akses halaman aja, nanti mau pakai resource route biar lebih clean
// Route::get('/masteritem', function () {
//     return view('masteritem');
// });

// Route::get('/transfer', function () {
//     return view('transfer');
// });
});
// Route::get('/inventory', function () {
//     return view('inventory');
// });
