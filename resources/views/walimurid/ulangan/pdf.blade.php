<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ulangan</title>

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
    }
    .footer{
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
        TAHUN PELAJARAN
        {{ $data->tahunAkademik->tahun_ajaran }} 
        @endforeach
        <br>SLB AUTIS BINA ANGGITA BANGUNTAPAN BANTUL YOGYAKARTA
    </p><br>
  </div>

  <div class="header-data">
    @foreach ($dataUlangan->take(1) as $data)
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
            <th rowspan="2" style="width: 2%;">No</th>
            <th rowspan="2" style="width: 8%;">Mata Pelajaran</th>
            <th colspan="21" align="center" style="width: 60%;">UH</th>
            <th rowspan="2" align="center" style="width: 5%;">UTS / TUGAS</th>
            <th rowspan="2" align="center" style="width: 5%;">UAS / UKK</th>
            <th rowspan="2" align="center" style="width: 10%;">Nilai Rata-Rata</th>
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
          @foreach ($hasil as $data)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $data['mapel']->nama_mapel }}</td>
              @for ($i = 0; $i <20 ; $i++)
                <td>{{ $data['nilai'][$i] or '-' }}</td>
              @endfor
            <td>{{ number_format($data['rata-rata'], 2)  }}</td>
            <td>{{ $data['uts'] or '-' }}</td>
            <td>{{ $data['uas'] or '-' }}</td>
            <td>{{ number_format($data['total']), 2 }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
  
  <div class="footer">
    <div class="footer-kepala">
      <p>
          Mengetahui <br> 
          Kepala Sekolah <br>
      </p>
      <p style="margin-top: 50px;">
          {{ $dataguru->nama }} <br>
          NIP. {{ $dataguru->nip }}
      </p>
    </div>
    <div class="footer-guru">
      <p>
          Bantul, <br>
          Guru Kelas <br>
      </p>
      <p style="margin-top: 50px;">
          @foreach ($dataUlangan->take(1) as $data)
          {{ $data->guru->nama }}<br>
          NIP. {{ $data->guru->nip }}
          @endforeach <br> 
      </p>
    </div>
  </div>
  
</body>
</html>