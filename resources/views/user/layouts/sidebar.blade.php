<div class="col-lg-4">
  <div class="card my-4">
    <h5 class="card-header">Kategori</h5>
    <div class="card-body">
      <div class="col-lg-12">
        <ul class="list-unstyled mb-0">
          @foreach ($kategori as $kate)
            <li>
              <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }} <span style="float: right;">{{ $kate->posts()->count() }}</span></a>
              <hr style="margin-top: 0rem;width: 100%">
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>