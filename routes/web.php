<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\LedgerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('banks', BankController::class)->middleware(['auth']);
Route::put('/banks/{bank}/inactive', [BankController::class, 'inactive'])->middleware(['auth'])->name('bank.inactive');
Route::put('/banks/{bank}/active', [BankController::class, 'active'])->middleware(['auth'])->name('bank.active');

Route::resource('ledgers', LedgerController::class)->middleware(['auth']);
Route::get('/ledger/import', [LedgerController::class, 'ledgerFileImport'])->middleware(['auth'])->name('ledgers.import');
Route::post('/ledger/import-create', [LedgerController::class, 'ledgerExcelImport'])->middleware(['auth'])->name('ledgers.import-create');

require __DIR__ . '/auth.php';
