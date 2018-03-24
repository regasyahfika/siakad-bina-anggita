<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\GuruResetPasswordNotification;

class Guru extends Authenticatable
{
    use Notifiable;

    protected $guard = 'guru';

    protected $table = 'guru';

    protected $primaryKey = 'id_guru';

    protected $fillable = ['nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'notelp', 'agama', 'pendidikan', 'jabatan', 'alamat', 'foto',];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ekstrakurikuler()
    {
        return $this->hasMany('App\Model\Admin\Ekskul', 'guru_id', 'id_guru');
    }

    public function klsSiswa()
    {
        return $this->belongsToMany('App\Model\Admin\KelasSiswa','kelas_siswa_guru', 'guru_id', 'klsiswa_id');
    }

    public function getFotoUrlAttribute()
	{
		return asset('storage/guru/'. $this->foto);
	}

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new GuruResetPasswordNotification($token));
    }
}
