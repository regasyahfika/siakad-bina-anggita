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
      margin-top: 50px;
      float: right;
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

  {{-- <div class="header-data">
    @foreach ($dataAbsensi->take(1) as $data)
    <label>Nama Siswa</label> 
    <label style="padding-left: 10px;">: {{ $data->siswa->nama }} </label><br>
    <label>Kelas</label>
    <label style="padding-left: 43px;">: {{ $data->kelas->nama_kelas }}</label><br>
    <label>NIS</label>
    <label style="padding-left: 51px;">: {{ $data->siswa->nis }}</label>
    @endforeach

    
  </div> --}}

    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 5%;">No</th>
            <th rowspan="2" style="width: 30%;">Nama</th>
            <th rowspan="2" style="width: 20%;">Kelas</th>
            <th colspan="4" style="width: 25%;">Jumlah</th>
          </tr>
          <tr>
            <th align="center">H</th>
            <th align="center">A</th>
            <th align="center">I</th>
            <th align="center">S</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($hasil as $data)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $data['siswa']->nama }}</td>
            <td>{{ $data['kelas']->nama_kelas }}</td>
            <td>{{ $data['hadir'] }}</td>
            <td>{{ $data['alpa'] }}</td>
            <td>{{ $data['izin'] }}</td>
            <td>{{ $data['sakit'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  

  <div class="footer">
    <p>
        Mengetahui <br> 
        Kepala Sekolah <br>
    </p>
    <p style="margin-top: 50px;">
        {{ $dataguru->nama }} <br>
        NIP. {{ $dataguru->nip }}
    </p>
  </div>
  
</body>
</html>