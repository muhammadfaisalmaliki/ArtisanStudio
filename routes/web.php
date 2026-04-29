
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('produk.index');
});

use App\Http\Controllers\ProdukController;
Route::resource('produk', ProdukController::class);
Route::view('/anggota', 'anggota')->name('anggota');
Route::view('/visi-misi', 'visi-misi')->name('visi-misi');
Route::view('/prinsip', 'prinsip')->name('prinsip');
Route::view('/logo-branding', 'logo-branding')->name('logo-branding');
Route::view('/kontak', 'kontak')->name('kontak');
Route::get('/projects', function () {
    return view('project.index');
})->name('projects.index');
