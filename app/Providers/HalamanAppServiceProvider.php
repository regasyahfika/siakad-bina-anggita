<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if (Request::segment(2)== 'home') {
            $halaman = 'home';
        }
        if (Request::segment(2)== 'profil') {
            $halaman = 'profil';
        }

        // data konten
        if (Request::segment(2)== 'kategori') {
            $halaman = 'kategori';
        }
        if (Request::segment(2)== 'post') {
            $halaman = 'post';
        }
        if (Request::segment(2)== 'prestasi') {
            $halaman = 'prestasi';
        }
        if (Request::segment(2)== 'ekskul') {
            $halaman = 'ekskul';
        }

        // Guru
        if (Request::segment(2)== 'guru') {
            $halaman = 'guru';
        }

        // Siswa
        if (Request::segment(2)== 'siswa') {
            $halaman = 'siswa';
        }

        // Wali Murid
        if (Request::segment(2)== 'walimurid') {
            $halaman = 'walimurid';
        }

        // Galeri
        if (Request::segment(2)== 'album') {
            $halaman = 'album';
        }
        if (Request::segment(2)== 'galeri') {
            $halaman = 'galeri';
        }

        // data master
        if (Request::segment(2)== 'kelas') {
            $halaman = 'kelas';
        }
        if (Request::segment(2)== 'programkelas') {
            $halaman = 'programkelas';
        }
        if (Request::segment(2)== 'ruang') {
            $halaman = 'ruang';
        }
        if (Request::segment(2)== 'matapelajaran') {
            $halaman = 'matapelajaran';
        }
        if (Request::segment(2)== 'tahunakademik') {
            $halaman = 'tahunakademik';
        }
        if (Request::segment(2)== 'pembagiankelas') {
            $halaman = 'pembagiankelas';
        }
        //end data master        
       
        // Absensi
        if (Request::segment(2)== 'absensi') {
            $halaman = 'absensi';
        }

        // Ulangan harian
        if (Request::segment(2)== 'ulangan') {
            $halaman = 'ulangan';
        }

        // Laporan
        if (Request::segment(2)== 'laporan_absensi') {
            $halaman = 'laporan_absensi';
        } 
        if (Request::segment(2)== 'laporan_ulangan') {
            $halaman = 'laporan_ulangan';
        }


        // Halaman Guru
        if (Request::segment(2)== 'tampil_siswa') {
            $halaman = 'tampil_siswa';
        }
        if (Request::segment(2)== 'ubahpassword') {
            $halaman = 'ubahpassword';
        }


        // Halaman Wali Murid
        if (Request::segment(2)== 'profil_wali') {
            $halaman = 'profil_wali';
        }
        if (Request::segment(2)== 'perkembangan') {
            $halaman = 'perkembangan';
        }
        


        view()->share('halaman',$halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
