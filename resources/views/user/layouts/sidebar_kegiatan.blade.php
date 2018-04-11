<div class="col-lg-4">
  <div class="card my-4">
    <h5 class="card-header"> Prestasi</h5>
    <div class="card-body">
      <div class="col-lg-12">
        @foreach ($prestasi as $data)
        <span class="fa fa-user"> {{ $data->nama_peraih }}</span> <br>
        <span class="fa fa-trophy"> Juara {{ $data->peringkat }} - {{ $data->nama_lomba }} - {{ $data->tahun }}</span> <br>
        <span class="fa fa-heart"> Tingkat - {{ $data->tingkat }}</span>
        <hr style="margin-top: 0rem;width: 100%">
        
        @endforeach
      </div>
    </div>
  </div>
</div>