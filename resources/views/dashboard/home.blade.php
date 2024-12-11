@extends('layouts.app')
@section('title_page')
    Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Peticiones</h5>
                <h2 class="mb-4 text-dark font-weight-bold">{{ number_format($overview['tot_pet']) }}</h2>
                <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                    <img src="{{ asset('assets/img/icons/unicons/chart.png') }}" class="absolute-center" style="width: 40px;height: 40px;border-radius: 2003px;top:47% !important;" />
                </div>
                <p class="mt-4 mb-0">Porcentaje</p>
                <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $overview['porcent_pet'] }}%</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Positivas</h5>
            <h2 class="mb-4 text-dark font-weight-bold">{{ $overview['pos_pet'] }}</h2>
            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" class="absolute-center text-dark" style="width: 40px;height: 40px;border-radius: 2003px;top:47% !important;"  />
            </div>
            <p class="mt-4 mb-0">Porcentaje</p>
            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $overview['porcen_pet_pos'] }}%</h3>
        </div>
        </div>
    </div>

    <div class="col-xl-4  col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Reporte general</h5>
            <h2 class="mb-4 text-dark font-weight-bold">{{ date('Y-d-m') }}</h2>
            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                <i class="mdi mdi-eye icon-md absolute-center text-dark"></i>
            </div>
            <p class="mt-4 mb-0">Porcentaje</p>
            <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{ $overview['porcent_pet'] }}%</h3>
            <h3 class="mb-0">{{ number_format($overview['pos_pet']) }} / {{ number_format($overview['tot_files']) }}</h3>
        </div>
        </div>
    </div> 
</div>
 
@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script>
/**
 * Analytics
*/

'use strict';

(function () {
    let value_porcent_pet = 0+".{{ $overview['porcent_pet'] }}"; 

    if ($(".dashboard-progress-1").length) {
        $('.dashboard-progress-1').circleProgress({
            value:value_porcent_pet,
            size: 125,
            thickness: 7,
            startAngle: 80,
            fill: {
                gradient: ["#7922e5", "#1579ff"]
            }
        });
    }
    if ($(".dashboard-progress-1-dark").length) {
        $('.dashboard-progress-1-dark').circleProgress({
            value:value_porcent_pet,
            size: 125,
            thickness: 7,
            startAngle: 10,
            emptyFill: '#eef0fa',
            fill: {
                gradient: ["#7922e5", "#1579ff"]
            }
        });
    }

    let value_porcen_pet_pos = 0+".{{ $overview['porcen_pet_pos'] }}"; 
    if ($(".dashboard-progress-2").length) {
        $('.dashboard-progress-2').circleProgress({
            value: value_porcen_pet_pos,
            size: 125,
            thickness: 7,
            startAngle: 10,
            fill: {
                gradient: ["#429321", "#b4ec51"]
            }
        });
    }
    if ($(".dashboard-progress-2-dark").length) {
        $('.dashboard-progress-2-dark').circleProgress({
            value: value_porcen_pet_pos,
            size: 125,
            thickness: 7,
            startAngle: 10,
            emptyFill: '#eef0fa',
            fill: {
                gradient: ["#429321", "#b4ec51"]
            }
        });
    }
 
    if ($(".dashboard-progress-3").length) {
        $('.dashboard-progress-3').circleProgress({
            value: value_porcent_pet,
            size: 125,
            thickness: 7,
            startAngle: 10,
            fill: {
                gradient: ["#f76b1c", "#fad961"]
            }
        });
    }
    if ($(".dashboard-progress-3-dark").length) {
        $('.dashboard-progress-3-dark').circleProgress({
            value: value_porcent_pet,
            size: 125,
            thickness: 7,
            startAngle: 10,
            emptyFill: '#eef0fa',
            fill: {
                gradient: ["#f76b1c", "#fad961"]
            }
        });
    }

    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;


    // Growth Chart - Radial Bar Chart
    // --------------------------------------------------------------------
    const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
        series: ["{{ $overview['porcen_pet_pos'] }}"],
        labels: ['Positivas'],
        chart: {
        height: 240,
        type: 'radialBar'
        },
        plotOptions: {
        radialBar: {
            size: 150,
            offsetY: 10,
            startAngle: -150,
            endAngle: 150,
            hollow: {
            size: '55%'
            },
            track: {
            background: cardColor,
            strokeWidth: '100%'
            },
            dataLabels: {
            name: {
                offsetY: 15,
                color: headingColor,
                fontSize: '15px',
                fontWeight: '600',
                fontFamily: 'Public Sans'
            },
            value: {
                offsetY: -25,
                color: headingColor,
                fontSize: '22px',
                fontWeight: '500',
                fontFamily: 'Public Sans'
            }
            }
        }
        },
        colors: [config.colors.primary],
        fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            shadeIntensity: 0.5,
            gradientToColors: [config.colors.primary],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 0.6,
            stops: [30, 70, 100]
        }
        },
        stroke: {
        dashArray: 5
        },
        grid: {
        padding: {
            top: -35,
            bottom: -10
        }
        },
        states: {
        hover: {
            filter: {
            type: 'none'
            }
        },
        active: {
            filter: {
            type: 'none'
            }
        }
        }
    };

    if (typeof growthChartEl !== undefined && growthChartEl !== null) {
        const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
        growthChart.render();
    }

    // Total Revenue Report Chart - Bar Chart
    // --------------------------------------------------------------------
    const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
        series: [
        {
            name: 'Realizadas positivas',
            data: [18, 7, 15, 29, 18, 12, 9]
        },
        {
            name: 'Realizas sin información',
            data: [-13, -18, -9, -14, -5, -17, -15]
        }
        ],
        chart: {
        height: 300,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
        },
        plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '33%',
            borderRadius: 12,
            startingShape: 'rounded',
            endingShape: 'rounded'
        }
        },
        colors: [config.colors.primary, config.colors.info],
        dataLabels: {
        enabled: false
        },
        stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
        },
        legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
            height: 8,
            width: 8,
            radius: 12,
            offsetX: -3
        },
        labels: {
            colors: axisColor
        },
        itemMargin: {
            horizontal: 10
        }
        },
        grid: {
        borderColor: borderColor,
        padding: {
            top: 0,
            bottom: -8,
            left: 20,
            right: 20
        }
        },
        xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        labels: {
            style: {
            fontSize: '13px',
            colors: axisColor
            }
        },
        axisTicks: {
            show: false
        },
        axisBorder: {
            show: false
        }
        },
        yaxis: {
        labels: {
            style: {
            fontSize: '13px',
            colors: axisColor
            }
        }
        },
        responsive: [
        {
            breakpoint: 1700,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '32%'
                }
            }
            }
        },
        {
            breakpoint: 1580,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '35%'
                }
            }
            }
        },
        {
            breakpoint: 1440,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '42%'
                }
            }
            }
        },
        {
            breakpoint: 1300,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '48%'
                }
            }
            }
        },
        {
            breakpoint: 1200,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '40%'
                }
            }
            }
        },
        {
            breakpoint: 1040,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 11,
                columnWidth: '48%'
                }
            }
            }
        },
        {
            breakpoint: 991,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '30%'
                }
            }
            }
        },
        {
            breakpoint: 840,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '35%'
                }
            }
            }
        },
        {
            breakpoint: 768,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '28%'
                }
            }
            }
        },
        {
            breakpoint: 640,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '32%'
                }
            }
            }
        },
        {
            breakpoint: 576,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '37%'
                }
            }
            }
        },
        {
            breakpoint: 480,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '45%'
                }
            }
            }
        },
        {
            breakpoint: 420,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '52%'
                }
            }
            }
        },
        {
            breakpoint: 380,
            options: {
            plotOptions: {
                bar: {
                borderRadius: 10,
                columnWidth: '60%'
                }
            }
            }
        }
        ],
        states: {
        hover: {
            filter: {
            type: 'none'
            }
        },
        active: {
            filter: {
            type: 'none'
            }
        }
        }
    };

    if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
    }
})();
</script>

{{-- Events TO nodeJS --}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
Pusher.logToConsole = true;

var pusher = new Pusher('f4a78a97ccbeeec457cc', {
    cluster: 'us3'
});

var channel = pusher.subscribe('recap-verif-v1');
channel.bind('global_events', function(data) {
    console.log(JSON.stringify(data));
});
</script>
@endsection