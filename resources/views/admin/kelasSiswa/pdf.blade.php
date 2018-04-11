<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pembagian Kelas</title>

  <style>
    body{
      font-family: Cambria;
      font-size: 12px;
    }
    .header{
      text-align: center;
      font-weight: bold;

    }
    table{
      width: 100%;
      margin-top: 30px;
    }
    h4{
      padding-top: 20
    }
    .footer{
      font-weight: bold;
      float: right;
      margin-top: 50px;

    }
  </style>
</head>
<body>
  <div class="header">
    <p>
        PEMBAGIAN KELAS PESERTA DIDIK <br>
        SEMESTER 
        @foreach ($pagi->take(1) as $data)
        {{ $data->tahunAkademik->semester }} 
        @endforeach
        TAHUN PELAJARAN
        @foreach ($pagi->take(1) as $data)
        {{ $data->tahunAkademik->tahun_ajaran }} 
        @endforeach
        <br>SLB AUTIS BINA ANGGITA BANGUNTAPAN BANTUL YOGYAKARTA
    </p><br>
  </div>
  <br>
  <h4>1. KELAS PAGI</h4>
    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 5px;">No</th>
            <th rowspan="2">Nama Siswa</th>
            <th rowspan="2">Nama Guru</th>
            <th colspan="2" align="center">Kelas</th>
            <th rowspan="2">Keterangan</th>
          </tr>
          <tr>
            <th align="center">Jenjang</th>
            <th align="center">Ruangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagi as $dataPagi)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $dataPagi->siswa->nama }}</td>
            <td>
              @foreach ($dataPagi->guruKelas as $guru)
              {{ $guru->nama }} <br>
              @endforeach
            </td>
            <td>{{ $dataPagi->kelas->nama_kelas }}</td>
            <td>{{ $dataPagi->ruang->nama_ruang }}</td>
            <td>{{ $dataPagi->keterangan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  <br>
  <h4>2. KELAS SIANG</h4>
    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 5px;">No</th>
            <th rowspan="2">Nama Siswa</th>
            <th rowspan="2">Nama Guru</th>
            <th colspan="2" align="center">Kelas</th>
            <th rowspan="2">Keterangan</th>
          </tr>
          <tr>
            <th align="center">Jenjang</th>
            <th align="center">Ruangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($siang as $dataSiang)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $dataSiang->siswa->nama }}</td>
            <td>
              @foreach ($dataSiang->guruKelas as $guru)
              {{ $guru->nama }} <br>
              @endforeach
            </td>
            <td>{{ $dataSiang->kelas->nama_kelas }}</td>
            <td>{{ $dataSiang->ruang->nama_ruang }}</td>
            {{-- <td>{{ $dataSiang->program->nama_program }}</td> --}}
            {{-- <td>{{ $dataSiang->tahunAkademik->tahun_ajaran }}</td> --}}
            {{-- <td>{{ $dataSiang->tahunAkademik->semester }}</td> --}}
            <td>{{ $dataSiang->keterangan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
  <br>
  <h4>3. KELAS SORE</h4>
    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 5px;">No</th>
            <th rowspan="2">Nama Siswa</th>
            <th rowspan="2">Nama Guru</th>
            <th colspan="2" align="center">Kelas</th>
            <th rowspan="2">Keterangan</th>
          </tr>
          <tr>
            <th align="center">Jenjang</th>
            <th align="center">Ruangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sore as $dataSore)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $dataSore->siswa->nama }}</td>
            <td>
              @foreach ($dataSore->guruKelas as $guru)
              {{ $guru->nama }} <br>
              @endforeach
            </td>
            <td>{{ $dataSore->kelas->nama_kelas }}</td>
            <td>{{ $dataSore->ruang->nama_ruang }}</td>
            {{-- <td>{{ $dataSore->program->nama_program }}</td> --}}
            {{-- <td>{{ $dataSore->tahunAkademik->tahun_ajaran }}</td> --}}
            {{-- <td>{{ $dataSore->tahunAkademik->semester }}</td> --}}
            <td>{{ $dataSore->keterangan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
  
  
  <div class="footer">
    <p>
        Bantul, <br> 
        Kepala Sekolah <br>
    </p>
    <p style="margin-top: 50px;">
        {{ $dataguru->nama }} <br>
        NIP. {{ $dataguru->nip }}
    </p>
  </div>
  
</body>
</html>