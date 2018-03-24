<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WaliMurid extends Authenticatable
{
	use Notifiable;

	protected $guard = 'walimurid';

    protected $table = 'wali_murid';

    protected $primaryKey = 'id_walimurid';

    protected $fillable = ['nama', 'pekerjaan', 'agama', 'telp', 'alamat', 'siswa_id',];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function siswa()
    {
    	return $this->belongsTo('App\Model\Admin\Siswa', 'siswa_id', 'id_siswa');
    }

    
}
