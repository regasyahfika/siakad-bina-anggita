@extends('walimurid.layouts.app')

@section('title', 'Perkembangan Siswa')


@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diagram Perkembangan Anak
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('walimurid.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Perkembangan Anak</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body box-success">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-bordered">
                      <tr>
                        <td style="width: 20%">Tahun Ajaran</td>
                        <td>{{ $tahunAkademik->tahun_ajaran }}</td>
                      </tr>
                      <tr>
                        <td style="width: 20%">Semester</td>
                        <td>{{ $tahunAkademik->semester }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                
                <h3 class="box-title">Perkembangan Anak</h3>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="lineChart" style="height:250px"></canvas>
                </div>
              </div>
              <!-- /.box -->
            <div class="col-md-2">
              <div class="box-footer">
                @foreach ($hasil as $dataHasil)
                  <div class="progress-group">
                    <span class="progress-text">{{ $dataHasil['nama_mapel'] }}</span>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%;background: {{ $dataHasil['warna'] }}"></div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
      </div>
    </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footer')
<!-- ChartJS -->
<script src="{{ asset('adminlte/bower_components/Chart.js/Chart.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#lineChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : {!! json_encode($dataTanggal) !!},
      datasets: [
      @foreach ($hasil as $dataHasil)
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : '{{ $dataHasil['warna'] }}',
          pointColor          : '{{ $dataHasil['warna'] }}',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : {!! json_encode($dataHasil['nilai']) !!}
        },
        
      @endforeach
        // {
        //   label               : 'Digital Goods',
        //   fillColor           : 'rgba(60,141,188,0.9)',
        //   strokeColor         : 'rgba(60,141,188,0.8)',
        //   pointColor          : '#3b8bba',
        //   pointStrokeColor    : 'rgba(60,141,188,1)',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(60,141,188,1)',
        //   data                : [28, 48, 40, 19, 86, 27, 90]
        // }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      // scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      // pointDot                : true,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

  })
</script>


@endsection
