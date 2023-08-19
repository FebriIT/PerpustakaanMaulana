<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>
    <link rel="stylesheet" href="{{ asset('template/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">


</head>

<body>

    <div class="container">
        <div>
            <h3>
                <center>Laporan Pendaftaran Dari Tanggal {{ $mulai }} sampai {{ $akhir }}</center>
            </h3>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Bar Chart</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="{{ asset('template/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('template/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('template/assets/modules/chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template/assets/js/page/modules-chartjs.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

</body>


</html>

