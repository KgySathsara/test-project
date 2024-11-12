<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\PrescriptionController;

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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUser'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pharmacy Routes
/*Route::middleware(['auth', 'role:pharmacy'])->group(function () {
    // View prescriptions for pharmacy
    Route::get('/pharmacy/prescriptions', [PharmacyController::class, 'viewPrescriptions'])->name('pharmacy.prescriptions');
    // Create quotation for a prescription
    Route::get('/pharmacy/prescriptions/{id}/quotation', [PharmacyController::class, 'createQuotation'])->name('pharmacy.quotation.create');
    // Store the prepared quotation
    Route::post('/pharmacy/prescriptions/{id}/quotation', [PharmacyController::class, 'storeQuotation'])->name('pharmacy.quotation.store');
});

// Quotation Routes (User Side)
Route::middleware(['auth', 'role:user'])->group(function () {
    // View all quotations for the user
    Route::get('/user/quotations', [QuotationController::class, 'viewQuotations'])->name('user.quotations');
    // Accept a quotation
    Route::post('/user/quotations/{id}/accept', [QuotationController::class, 'acceptQuotation'])->name('user.quotation.accept');
    // Reject a quotation
    Route::post('/user/quotations/{id}/reject', [QuotationController::class, 'rejectQuotation'])->name('user.quotation.reject');
});*/

// Pharmacy Routes
Route::middleware(['auth', 'role:pharmacy'])->group(function () {
    Route::get('/pharmacy/prescriptions', [PharmacyController::class, 'viewPrescriptions'])->name('pharmacy.prescriptions');
    Route::get('/pharmacy/prescriptions/{id}/quotation', [PharmacyController::class, 'createQuotation'])->name('pharmacy.quotation.create');
    Route::post('/pharmacy/prescriptions/{id}/quotation', [PharmacyController::class, 'storeQuotation'])->name('pharmacy.quotation.store');
});

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/quotations', [QuotationController::class, 'viewQuotations'])->name('user.quotations');
    Route::post('/user/quotations/{id}/accept', [QuotationController::class, 'acceptQuotation'])->name('user.quotation.accept');
    Route::post('/user/quotations/{id}/reject', [QuotationController::class, 'rejectQuotation'])->name('user.quotation.reject');
});

// Route for displaying the upload form
Route::get('/prescriptions/upload', [PrescriptionController::class, 'uploadForm'])->name('prescriptions.upload');

// Route for storing the uploaded prescription
Route::post('/prescriptions/store', [PrescriptionController::class, 'store'])->name('prescriptions.store');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

