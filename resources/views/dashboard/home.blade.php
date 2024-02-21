@extends('layouts.app')
@section('title_page')
    Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Bienvenido(a) de nuevo! 🎉</h5>
                        <p class="mb-4">
                        Se han creado <span class="fw-bold">{{ $overview['tot_pet'] }}</span> Peticiones al servidor desde tu ultimo ingreso.
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">Ver avance de peticiones</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-8">
                    <h5 class="card-header m-0 me-2 pb-3">Solicitudes en tiempo real</h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                </div>

                <div class="col-md-4">
                    
                    <div id="growthChart"></div>
                    <div class="text-center fw-semibold pt-3 mb-2">{{ $overview['porcent_pet'] }}% Solicitudes realizadas</div>

                    <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="badge bg-label-primary p-2"><i class="bx bx-time-five text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>HOY</small>
                                <h6 class="mb-0">{{ $overview['cobroHoy'] }}</h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="badge bg-label-info p-2"><i class="bx bx-time-five text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>En Proceso</small>
                                <h6 class="mb-0">{{ $overview['in_process'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/chart.png') }}" alt="Peticiones" class="rounded" />
                            </div> 
                        </div>

                        <span class="d-block mb-1">Peticiones</span>
                        <h3 class="card-title text-nowrap mb-2">{{ $overview['tot_pet'] }}</h3>
                        <small class="text-danger fw-semibold"><i class="bx bx-up-arrow-alt"></i> {{ $overview['porcent_pet'] }}%</small>
                    </div>
                </div>
            </div>
            
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" alt="Peticiones" class="rounded" />
                            </div> 
                        </div>
                        <span class="fw-semibold d-block mb-1">Positivas</span>
                        <h3 class="card-title mb-2">{{ $overview['pos_pet'] }}</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> {{ $overview['porcen_pet_pos'] }}%</small>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Reporte general</h5>
                                    <span class="badge bg-label-warning rounded-pill">{{ date('d/m/yyyy') }}</span>
                                </div>
                                <div class="mt-sm-auto">
                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> {{ $overview['porcent_pet'] }}%</small>
                                    <h3 class="mb-0">{{ number_format($overview['pos_pet']) }} / {{ number_format($overview['tot_files']) }}</h3>
                                </div>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
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