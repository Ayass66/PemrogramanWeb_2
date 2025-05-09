<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// http://belajarlaravel.test
Route::get('/', function () {
    return view('welcome');
});
// http://belajarlaravel.test/biodata
Route::get('/biodata', function () {
    return view('biodata');
});

//Ini adalah route untuk menampilkan halaman home
//http://belajarlaravel.test/home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('posts', PostController::class);

//menggunakan metode redirect() dalam routing
Route::get('/redirect', function () {
    return redirect('/home');
});
//menggunakan metode view() dalam routing
Route::get('/welcome', function () {
    return view('welcome');
});

// http://belajarlaravel.test/namasaya
Route::get('/namasaya', function () {
    return ("ayas");
});
// http://belajarlaravel.test/matakuliah
Route::get('/matakuliah', function () {
    return ("Matakuliah : Pemrograman Web 2");
});
// http://belajarlaravel.test/matakuliah/Database
Route::get('/matakuliah/Database', function () {
    return ("Matakuliah : Database");
});
// http://belajarlaravel.test/matakuliah/Jaringan
Route::get('/matakuliah/Jaringan', function () {
    return ("Matakuliah : Jaringan");
});
//http://belajarlaravel.test/matakuliah/B.inggris (mk bisa diisi langsung di urlnya sdh karna mnggunakan parameter)
Route::get('/matakuliah/{mk}', function ($mk) {
    return "Matakuliah : " . $mk;
});

//http://belajarlaravel.test/mahasiswa/Ayass (nma bisa diisi langsung di urlnya sdh karna mnggunakan parameter)
Route::get('/mahasiswa/{mhs}', function ($mhs) {
    return "Tampilkan data mahasiswa bernama " . $mhs;
});
// http://belajarlaravel.test/stok_barang/laptop/Lenovo
Route::get('/stok_barang/{kategori}/{merek}', function ($kategori, $merek) {
    return "Cek sisa stok untuk " . $kategori . " " . $merek;
});
// http://belajarlaravel.test/stok_barang (apabila tidak diisi maka akan menampilkan default)
Route::get('/stok_barang/{kategori?}/{merek?}', function ($kategori = 'smartphone', $merek = 'Redmi') {
    return "Cek sisa stok untuk " . $kategori . " " . $merek;
});
// http://belajarlaravel.test/user/06 (id harus angka)
Route::get('/user/{id}', function ($id) {
    return "Tampilkan user dengan id " . $id;
})->where('id', '[0-9]+');
// http://belajarlaravel.test/user/AA506 (id harus 2 huruf di awal dan diikuti oleh angka)
Route::get('/users/{id}', function ($id) {
    return "Tampilkan user dengan id " . $id;
})->where('id', '^[A-Za-z]{2}[0-9]+$');
 
//http://belajarlaravel.test/profil (menggunakan format json)
route::get('/profil', function () {
    return response()->json([
        'nama' => 'Ayas',
        'nim' => 'SI20230003',
        'prodi' => 'SI',
        'hobi' => ['Belajar', 'Ngoding', 'Tidur']
    ]);
});

//http://belajarlaravel.test/tentang (untuk memanggil metode about di PageController)
route::get('/tentang', [PageController::class, 'about']);

//http://belajarlaravel.test/dashboard (untuk mengarahkan dashboard ke halaman home)
Route::get('/dashboard', function () {
    return redirect('/home');
});
