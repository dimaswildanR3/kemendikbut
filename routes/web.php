<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GambarController;
use App\Http\Controllers\KategoriAgendaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriDokumenController;
use App\Http\Controllers\KategoriVideoController;
use App\Http\Controllers\KategoriGambarController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\DeskripsiSistemController;
use App\Http\Controllers\BidangController;


/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk login dan logout
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Proteksi semua route di bawah ini dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{agenda}', [AgendaController::class, 'show'])->name('agenda.show');
    Route::get('/agenda/{agenda}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

    // Rute untuk Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Rute untuk Dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{dokumen}', [DokumenController::class, 'show'])->name('dokumen.show');
    Route::get('/dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

    // Rute untuk Gambar
    Route::get('/gambar', [GambarController::class, 'index'])->name('gambar.index');
    Route::get('/gambar/create', [GambarController::class, 'create'])->name('gambar.create');
    Route::post('/gambar', [GambarController::class, 'store'])->name('gambar.store');
    Route::get('/gambar/{gambar}', [GambarController::class, 'show'])->name('gambar.show');
    Route::get('/gambar/{gambar}/edit', [GambarController::class, 'edit'])->name('gambar.edit');
    Route::put('/gambar/{gambar}', [GambarController::class, 'update'])->name('gambar.update');
    Route::delete('/gambar/{gambar}', [GambarController::class, 'destroy'])->name('gambar.destroy');

    // Rute untuk Kategori Agenda
    Route::get('/kategori-agenda', [KategoriAgendaController::class, 'index'])->name('kategori-agenda.index');
    Route::get('/kategori-agenda/create', [KategoriAgendaController::class, 'create'])->name('kategori-agenda.create');
    Route::post('/kategori-agenda', [KategoriAgendaController::class, 'store'])->name('kategori-agenda.store');
    Route::get('/kategori-agenda/{kategoriAgenda}', [KategoriAgendaController::class, 'show'])->name('kategori-agenda.show');
    Route::get('/kategori-agenda/{kategoriAgenda}/edit', [KategoriAgendaController::class, 'edit'])->name('kategori-agenda.edit');
    Route::put('/kategori-agenda/{kategoriAgenda}', [KategoriAgendaController::class, 'update'])->name('kategori-agenda.update');
    Route::delete('/kategori-agenda/{kategoriAgenda}', [KategoriAgendaController::class, 'destroy'])->name('kategori-agenda.destroy');

    // Rute untuk Kategori Berita
    Route::get('/kategori-berita', [KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
    Route::get('/kategori-berita/create', [KategoriBeritaController::class, 'create'])->name('kategori-berita.create');
    Route::post('/kategori-berita', [KategoriBeritaController::class, 'store'])->name('kategori-berita.store');
    Route::get('/kategori-berita/{kategoriBerita}', [KategoriBeritaController::class, 'show'])->name('kategori-berita.show');
    Route::get('/kategori-berita/{kategoriBerita}/edit', [KategoriBeritaController::class, 'edit'])->name('kategori-berita.edit');
    Route::put('/kategori-berita/{kategoriBerita}', [KategoriBeritaController::class, 'update'])->name('kategori-berita.update');
    Route::delete('/kategori-berita/{kategoriBerita}', [KategoriBeritaController::class, 'destroy'])->name('kategori-berita.destroy');

    Route::get('/dokumen-kategori', [KategoriDokumenController::class, 'index'])->name('kategori-dokumen.index');
    Route::get('/kategori-dokumen/create', [KategoriDokumenController::class, 'create'])->name('kategori-dokumen.create');
    Route::post('/kategori-dokumen', [KategoriDokumenController::class, 'store'])->name('kategori-dokumen.store');
    Route::get('/kategori-dokumen/{kategoriDokumen}', [KategoriDokumenController::class, 'show'])->name('kategori-dokumen.show');
    Route::get('/kategori-dokumen/{kategoriDokumen}/edit', [KategoriDokumenController::class, 'edit'])->name('kategori-dokumen.edit');
    Route::put('/kategori-dokumen/{kategoriDokumen}', [KategoriDokumenController::class, 'update'])->name('kategori-dokumen.update');
    Route::delete('/kategori-dokumen/{kategoriDokumen}', [KategoriDokumenController::class, 'destroy'])->name('kategori-dokumen.destroy');


    Route::get('/galeri/video/kategori', [KategoriVideoController::class, 'index'])->name('kategori-video.index');
    Route::get('/kategori-video/create', [KategoriVideoController::class, 'create'])->name('kategori-video.create');
    Route::post('/kategori-video', [KategoriVideoController::class, 'store'])->name('kategori-video.store');
    Route::get('/kategori-video/{kategori}', [KategoriVideoController::class, 'show'])->name('kategori-video.show');
    Route::get('/kategori-video/{kategori}/edit', [KategoriVideoController::class, 'edit'])->name('kategori-video.edit');
    Route::put('/kategori-video/{id}', [KategoriVideoController::class, 'update'])->name('kategori-video.update');
    Route::delete('/kategori-video/{kategori}', [KategoriVideoController::class, 'destroy'])->name('kategori-video.destroy');

    // Rute untuk Kategori Gambar
    Route::get('/kategori-gambar', [KategoriGambarController::class, 'index'])->name('kategori-gambar.index');
    Route::get('/kategori-gambar/create', [KategoriGambarController::class, 'create'])->name('kategori-gambar.create');
    Route::post('/kategori-gambar', [KategoriGambarController::class, 'store'])->name('kategori-gambar.store');
    Route::get('/kategori-gambar/{kategoriGambar}', [KategoriGambarController::class, 'show'])->name('kategori-gambar.show');
    Route::get('/kategori-gambar/{kategoriGambar}/edit', [KategoriGambarController::class, 'edit'])->name('kategori-gambar.edit');
    Route::put('/kategori-gambar/{kategoriGambar}', [KategoriGambarController::class, 'update'])->name('kategori-gambar.update');
    Route::delete('/kategori-gambar/{kategoriGambar}', [KategoriGambarController::class, 'destroy'])->name('kategori-gambar.destroy');

    // Rute untuk Kontak
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/create', [KontakController::class, 'create'])->name('kontak.create');
    Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
    Route::get('/kontak/{kontak}', [KontakController::class, 'show'])->name('kontak.show');
    Route::get('/kontak/{kontak}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{kontak}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak/{kontak}', [KontakController::class, 'destroy'])->name('kontak.destroy');

    // Rute untuk Users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    // Rute untuk Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video/{video}', [VideoController::class, 'show'])->name('video.show');
    Route::get('/video/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video/{video}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('video.destroy');

    

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
Route::get('/profil/{profil}', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/profil/{profil}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');
Route::delete('/profil/{profil}', [ProfilController::class, 'destroy'])->name('profil.destroy');




// Sosial Media Routes
Route::get('/sosial-media', [SosialMediaController::class, 'index'])->name('sosial_media.index');
Route::get('/sosial-media/create', [SosialMediaController::class, 'create'])->name('sosial_media.create');
Route::post('/sosial-media', [SosialMediaController::class, 'store'])->name('sosial_media.store');
Route::get('/sosial-media/{sosialMedia}', [SosialMediaController::class, 'show'])->name('sosial_media.show');
Route::get('/sosial-media/{sosialMedia}/edit', [SosialMediaController::class, 'edit'])->name('sosial_media.edit');
Route::put('/sosial-media/{sosialMedia}', [SosialMediaController::class, 'update'])->name('sosial_media.update');
Route::delete('/sosial-media/{sosialMedia}', [SosialMediaController::class, 'destroy'])->name('sosial_media.destroy');


Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
Route::get('/pesan/create', [PesanController::class, 'create'])->name('pesan.create');
Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');
Route::get('/pesan/{pesan}', [PesanController::class, 'show'])->name('pesan.show');
Route::get('/pesan/{pesan}/edit', [PesanController::class, 'edit'])->name('pesan.edit');
Route::put('/pesan/{pesan}', [PesanController::class, 'update'])->name('pesan.update');
Route::delete('/pesan/{pesan}', [PesanController::class, 'destroy'])->name('pesan.destroy');


Route::get('/deskripsi-sistem', [DeskripsiSistemController::class, 'index'])->name('deskripsi_sistem.index');
Route::get('/deskripsi-sistem/create', [DeskripsiSistemController::class, 'create'])->name('deskripsi_sistem.create');
Route::post('/deskripsi-sistem', [DeskripsiSistemController::class, 'store'])->name('deskripsi_sistem.store');
Route::get('/deskripsi-sistem/{deskripsiSistem}', [DeskripsiSistemController::class, 'show'])->name('deskripsi_sistem.show');
Route::get('/deskripsi-sistem/{deskripsiSistem}/edit', [DeskripsiSistemController::class, 'edit'])->name('deskripsi_sistem.edit');
Route::put('/deskripsi-sistem/{deskripsiSistem}', [DeskripsiSistemController::class, 'update'])->name('deskripsi_sistem.update');
Route::delete('/deskripsi-sistem/{deskripsiSistem}', [DeskripsiSistemController::class, 'destroy'])->name('deskripsi_sistem.destroy');


Route::get('/bidang', [BidangController::class, 'index'])->name('bidang.index');
Route::get('/bidang/create', [BidangController::class, 'create'])->name('bidang.create');
Route::post('/bidang', [BidangController::class, 'store'])->name('bidang.store');
Route::get('/bidang/{bidang}', [BidangController::class, 'show'])->name('bidang.show');
Route::get('/bidang/{bidang}/edit', [BidangController::class, 'edit'])->name('bidang.edit');
Route::put('/bidang/{bidang}', [BidangController::class, 'update'])->name('bidang.update');
Route::delete('/bidang/{bidang}', [BidangController::class, 'destroy'])->name('bidang.destroy');


});
