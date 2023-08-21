@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Laporan Pendaftaran</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-12">
                <div id="grafik"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('template/assets/modules/chart.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    // alert('ok');
    var bulan=<?php echo "$bulan"?>;
    // alert(bulan);
    Highcharts.chart('grafik', {

        title: {
            text: 'U.S Solar Employment Growth',
            align: 'left'
        },

        subtitle: {
            text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            categories:bulan
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                allowPointSelect:true
            }
        },

        series: [ {
            name: 'Guru',
            data: [5,6]
        }, {
            name: 'Siswa',
            data: [2, 3]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

</script>


@endsection


