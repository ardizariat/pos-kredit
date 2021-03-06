@extends('layouts.admin.master')
@section('title')
    Dashboard
@endsection

@push('css')
@endpush

@section('admin-content')
       
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<h3>{{ tanggal(date('Y-m-d')) }}</h3>
</div>
{{-- 
<div class="row animate__animated animate__fadeInLeftBig">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card @if (totalPemasukanKredit() > modal()) border-left-primary @else border-left-danger @endif shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold  @if (totalPemasukanKredit() > modal()) text-primary  @else text-danger @endif text-uppercase mb-1">
              @if (totalPemasukanKredit() > modal())
              Keuntungan Yang Sudah Masuk
              @else
              Belum Balik Modal 
              @endif
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              @if (totalPemasukanKredit() > modal())
              {{ rupiah(totalPemasukanKredit() - modal()) }}
              @else 
              {{ rupiah(modal() - totalPemasukanKredit()) }}
              @endif
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukkan Kredit</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah(totalPemasukanKredit()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laba Bersih</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ rupiah(totalLabaBersih()) }}</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Modal</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ rupiah(modal()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row animate__animated animate__fadeInRightBig">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pelanggan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format(totalPelangganKredit()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Barang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format(totalBarang()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Supplier</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ number_format(totalSupplier()) }}</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Transaksi Pembayaran</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format(totalPembayaranKredit()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="row animate__animated animate__flipInX">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pemasukan Hari Ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ rupiah(pemasukanHariIni()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Hari Ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format(transaksiHariIni()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Minggu Ini</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format(transaksiBulanIni()) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pemasukan Bulan Ini</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ rupiah(pemasukanBulanIni()) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
  
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pemasukan 6 Bulan Terakhir</h6>
    </div>
    <!-- Card Body -->
      <div class="card-body">
      <div class="chart-area">
      <canvas id="myAreaChart"></canvas>
      </div>
      </div>
      </div>
      </div>

    </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary text-center text-uppercase">Status Pelanggan Kredit</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="myPieChart" width="301" height="245" class="chartjs-render-monitor" style="display: block; width: 301px; height: 245px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Belum Lunas
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Sudah Lunas
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>


</div>
<!-- /.container-fluid -->

@endsection

@push('js')
    
  <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
    };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: {!! json_encode($tanggal) !!},
    datasets: [{
    label: "",
    lineTension: 0.3,
    backgroundColor: "rgba(78, 115, 223, 0.05)",
    borderColor: "rgba(78, 115, 223, 1)",
    pointRadius: 3,
    pointBackgroundColor: "rgba(78, 115, 223, 1)",
    pointBorderColor: "rgba(78, 115, 223, 1)",
    pointHoverRadius: 3,
    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
    pointHitRadius: 10,
    pointBorderWidth: 2,
    data: {!! json_encode($bayar) !!},
    }],
    },
    options: {
    maintainAspectRatio: false,
    layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
    },
    scales: {
    xAxes: [{
    time: {
    unit: 'date'
    },
    gridLines: {
    display: false,
    drawBorder: false
    },
    ticks: {
    maxTicksLimit: 7
    }
    }],
    yAxes: [{
    ticks: {
    maxTicksLimit: 5,
    padding: 10,
    // Include a dollar sign in the ticks
    callback: function (value, index, values) {
    return 'Rp' + number_format(value);
    }
    },
    gridLines: {
    color: "rgb(234, 236, 244)",
    zeroLineColor: "rgb(234, 236, 244)",
    drawBorder: false,
    borderDash: [2],
    zeroLineBorderDash: [2]
    }
    }],
    },
    legend: {
    display: false
    },
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    intersect: false,
    mode: 'index',
    caretPadding: 10,
    callbacks: {
    label: function (tooltipItem, chart) {
    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
    return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
    }
    }
    }
    }
    });

  </script>

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels: ["Belum Lunas","Sudah Lunas", ],
    datasets: [{
    data: [{!! json_encode($belum_lunas) !!},{!! json_encode($lunas) !!}],
    backgroundColor: ['#C82E2E', '#1cc88a', '#36b9cc'],
    hoverBackgroundColor: ['#e74a3b', '#17a673', '#2c9faf'],
    hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
    },
    options: {
    maintainAspectRatio: false,
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    },
    legend: {
    display: false
    },
    cutoutPercentage: 80,
    },
    });

  </script>
@endpush