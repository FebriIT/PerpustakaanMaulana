@extends('layouts.master')

@section('content')

<div class="card">
    {{-- <div class="card-header">
        <h4>Laporan Pendaftaran</h4>
    </div> --}}
    <div class="card-body">
        <div class="row">
            {{-- <div class="col-12">
                <canvas id="myChart"></canvas>
            </div> --}}
            <div class="col-12">
                <div id="grafik"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('template/assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('js/highcharts.js') }}"></script>
<script>
    // alert('ok');
    var bulan=<?php echo "$bulan"?>;
    var total_guru=<?php echo "$total_guru"?>;
    var total_siswa=<?php echo "$total_siswa"?>;


    // alert(bulan);
    Highcharts.chart('grafik', {

        title: {
            text: 'Laporan Pendaftaran',
            align: 'left'
        },

        

        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
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
            data: total_guru

        }, {
            name: 'Siswa',
            data: total_siswa
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


