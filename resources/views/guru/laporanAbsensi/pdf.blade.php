<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Absensi</title>

  <style>
    body{
      font-family: Time New Roman;
      font-size: 12px;
    }
    .header{
      text-align: center;
      font-weight: bold;

    }

    .header-data{
      margin-top: 20px;
      
    }

    table{
      width: 100%;
      margin-top: 30px;
      text-align: center;

    }
    .footer{
      font-weight: bold;
      margin-top: 40px;
      float: left;
    }
  </style>
</head>
<body>
  <div class="header">
    <p>
        ABSENSI SISWA <br>
        SEMESTER 
        @foreach ($dataAbsensi->take(1) as $data)
        {{ $data->tahunAkademik->semester }} 
        TAHUN PELAJARAN
        {{ $data->tahunAkademik->tahun_ajaran }} 
        @endforeach
        <br>SLB AUTIS BINA ANGGITA BANGUNTAPAN BANTUL YOGYAKARTA
    </p><br>
  </div>

  <div class="header-data">
    @foreach ($dataAbsensi->take(1) as $data)
    <label>Nama Siswa</label> 
    <label style="padding-left: 10px;">: {{ $data->siswa->nama }} </label><br>
    <label>Kelas</label>
    <label style="padding-left: 43px;">: {{ $data->kelas->nama_kelas }}</label><br>
    <label>NIS</label>
    <label style="padding-left: 51px;">: {{ $data->siswa->nis }}</label>
    @endforeach

    
  </div>

    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 10%;">No</th>
            <th colspan="4" style="width: 90%;">Jumlah</th>
          </tr>
          <tr>
            <th align="center">Hadir</th>
            <th align="center">Alpa</th>
            <th align="center">Izin</th>
            <th align="center">Sakit</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td>1</td>
            <td>{{ $hadir }}</td>
            <td>{{ $alpa }}</td>
            <td>{{ $izin }}</td>
            <td>{{ $sakit }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  
  
  <div class="footer">
    <p>
        Bantul, <br>
        Guru Kelas <br>
    </p>
    <p style="margin-top: 50px;">
      
        {{ Auth::user()->nama }}<br>
        NIP. {{ Auth::user()->nip }}
        @endforeach <br> 
    </p>
  </div>
  
</body>
</html>