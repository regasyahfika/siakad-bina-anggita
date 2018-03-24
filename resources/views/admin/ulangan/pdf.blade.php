<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pembagian Kelas</title>

  <style>
    body{
      font-family: Time New Roman;
      font-size: 12px;
    }
    .header{
      text-align: center;
      font-weight: bold;

    }
    table{
      width: 100%;
      margin-top: 10px;
    }
    .footer{
      font-weight: bold;
      margin-top: 50px;
    }
    .footer .footer-kepala{
      float: left;
    }
    .footer .footer-guru{
      float: right;
    }
  </style>
</head>
<body>
  <div class="header">
    <p>
        DAFTAR NILAI SISWA <br>
        SEMESTER 
        @foreach ($dataUlangan->take(1) as $data)
        {{ $data->tahunAkademik->semester }} 
        @endforeach
        TAHUN PELAJARAN
        @foreach ($dataUlangan->take(1) as $data)
        {{ $data->tahunAkademik->tahun_ajaran }} 
        @endforeach
        <br>SLB AUTIS BINA ANGGITA BANGUNTAPAN BANTUL YOGYAKARTA
    </p><br>
  </div>

  <h5>1. KELAS PAGI</h3><br>
    <div class="table">
      <table border="1" cellpadding="10px" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="width: 5px;">No</th>
            <th rowspan="2">Mata Pelajaran</th>
            <th colspan="2" align="center">UH</th>
            <th rowspan="2" align="center">UTS/TUGAS</th>
            <th rowspan="2" align="center">UAS/UKK</th>
            <th rowspan="2" align="center">Nilai Rata-Rata</th>
            <th rowspan="2" align="center">Deskripsi</th>
          </tr>
          <tr>
            <th align="center">1</th>
            <th align="center">2</th>
            <th align="center">3</th>
            <th align="center">4</th>
            <th align="center">5</th>
            <th align="center">6</th>
            <th align="center">7</th>
            <th align="center">8</th>
            <th align="center">9</th>
            <th align="center">10</th>
            <th align="center">11</th>
            <th align="center">12</th>
            <th align="center">13</th>
            <th align="center">14</th>
            <th align="center">15</th>
            <th align="center">16</th>
            <th align="center">17</th>
            <th align="center">18</th>
            <th align="center">19</th>
            <th align="center">20</th>
            <th align="center">Rata-Rata</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach ($pagi as $dataPagi)
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
          @endforeach --}}
        </tbody>
      </table>
    </div>
  
  
  <div class="footer">
    <div class="footer-kepala">
      <p>
          Bantul, @foreach ($dataUlangan->take(1) as $data)
            {{ date('F Y', strtotime($data->tahunAkademik->tahun_awal))  }}
          @endforeach <br> 
          Kepala Sekolah <br>
      </p>
      <p style="margin-top: 50px;">
          {{ $dataguru->nama }} <br>
          NIP. {{ $dataguru->nip }}
      </p>
    </div>
    <div class="footer-guru">
      <p>
          Bantul, @foreach ($dataUlangan->take(1) as $data)
            {{ date('F Y', strtotime($data->tahunAkademik->tahun_awal))  }}
          @endforeach <br> 
          Kepala Sekolah <br>
      </p>
      <p style="margin-top: 50px;">
          {{ Auth::user()->nama }}<br>
          NIP. {{ Auth::user()->nip }}
      </p>
    </div>
  </div>
  
</body>
</html>