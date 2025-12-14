// routes/admin.php
<?php
// ... (use statements)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);

