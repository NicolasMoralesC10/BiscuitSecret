@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">

            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Ingresos</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $reportes['totalVentas'] }} pesos
              </h5>
            </div>

          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Inventario</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $reportes['productosEnVenta'] }} productos
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @php
  $productos = $reportes['productosBajoStock'] ?? [];
  $tooltipStock = count($productos)
  ? 'Productos con bajo stock:<br>' . implode('<br>', $productos)
  : 'No hay productos con bajo stock';
  @endphp

  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Stock Bajo</p>
              <h5 class="font-weight-bolder mb-0">
                {{ count($reportes['productosBajoStock']) }} productos
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
              data-bs-toggle="tooltip"
              title="{!! $tooltipStock !!}">
              <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Resumen diario</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $reportes['cantidadVentas'] }} ventas
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"
              data-bs-toggle="tooltip"
              title="Cantidad de Ventas">
              <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold">Dashboard</p>
              <h5 class="font-weight-bolder">Biscuit Secret</h5>
              <em class="mb-5">
                Este sistema diseñado para optimizar el manejo de tu inventario ofrece funcionalidades clave para controlar el stock, realizar seguimiento de ventas y automatizar procesos administrativos.
              </em>
              <!-- <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a> -->
            </div>
          </div>
          <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
            <div class="bg-gradient-primary border-radius-lg h-100">
              <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
              <div class="position-relative d-flex align-items-center justify-content-center h-100">
                <img class="img-fluid position-relative z-index-2 pt-4" style="max-width: 150px;" src="../assets/img/logo-preview.png" alt="rocket">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row mt-4">
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h4>Ganancias por Producto</h4>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-pie" class="chart-canvas" style="max-height: 300px;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h4>Ventas por Hora</h4>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('dashboard')

<!-- Script plantilla -->
<!-- <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
</script> -->

<!-- Gracifa circular -->
<script>
  fetch('{{ url("/ventas/totales") }}')
    .then(response => response.json()) 
    .then(data => {
      const ctx = document.getElementById("chart-pie").getContext("2d");

      let chartData;
      let chartOptions;

      if (data.length === 0) {
        chartData = {
          labels: ["Sin datos"],
          datasets: [{
            label: "Ventas Totales por Producto",
            data: [1], // 1 para renderizar al menos un segmento
            backgroundColor: ['#C46F00'],
          }]
        };

        chartOptions = {
          responsive: true,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              callbacks: {
                label: function() {
                  return "No hay ventas registradas";
                }
              }
            }
          }
        };
      } else {
        // Datos reales
        const labels = data.map(item => item.nombre_producto);
        const salesData = data.map(item => item.ventas_totales);

        chartData = {
          labels: labels,
          datasets: [{
            label: "Ventas Totales por Producto",
            data: salesData,
            backgroundColor: ['#A0522D', '#CD853F', '#C46F00', '#D2691E'],
          }]
        };

        chartOptions = {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.label + ": $" + tooltipItem.raw;
                }
              }
            }
          }
        };
      }

      new Chart(ctx, {
        type: "pie",
        data: chartData,
        options: chartOptions
      });

    })
    .catch(err => {
      console.error('Error al obtener los datos:', err);
    });
</script>

<!-- Grafica lineal -->
<script>
  fetch('{{ url("/ventas/por-hora") }}')
    .then(response => response.json())
    .then(data => {
      const productos = data.productos || [];
      const horas = data.horas || [];
      const ventas = data.ventas || {};

      const ctx = document.getElementById("chart-line").getContext("2d");

      let datasets = [];

      if (productos.length === 0 || horas.length === 0) {
        datasets = [{
          label: "No hay ventas registradas",
          tension: 0.4,
          borderWidth: 2,
          pointRadius: 0,
          borderColor: "#E0E0E0",
          backgroundColor: "rgba(224, 224, 224, 0.3)",
          fill: true,
          data: [0],
          maxBarThickness: 6
        }];
      } else {
        productos.forEach((producto, index) => {
          const color = getColor(index);
          const gradient = createGradient(ctx, color);

          datasets.push({
            label: producto,
            tension: 0.4,
            borderWidth: 3,
            pointRadius: 0,
            borderColor: color,
            backgroundColor: gradient,
            fill: true,
            data: horas.map(hora => ventas[hora]?.[producto] || 0),
            maxBarThickness: 6,
            pointBackgroundColor: color, // Color del punto en leyenda
            pointBorderColor: color      // Color del borde del punto
          });
        });
      }

      new Chart(ctx, {
        type: "line",
        data: {
          labels: horas.length ? horas : ['No hay ventas registradas'],
          datasets: datasets
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
              labels: {
                usePointStyle: true, // Opcional: puntos en lugar de cuadros
                pointStyle: 'circle' // Opcional: tipo de punto
              }
            }
          },
          interaction: {
            intersect: false,
            mode: 'index'
          },
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                drawBorder: false,
                drawOnChartArea: true,
                borderDash: [5, 5]
              },
              ticks: {
                stepSize: 5
              }
            },
            x: {
              grid: {
                drawBorder: false,
                drawOnChartArea: false
              }
            }
          }
        }
      });

      function getColor(index) {
        const colores = ['#cb0c9f', '#FF8C00', '#00CED1', '#32CD32', '#800080', '#FF1493', '#1E90FF'];
        return colores[index % colores.length];
      }

      function createGradient(ctx, color) {
        const gradient = ctx.createLinearGradient(0, 230, 0, 50);
        gradient.addColorStop(1, hexToRgba(color, 0.2));
        gradient.addColorStop(0.2, hexToRgba(color, 0));
        gradient.addColorStop(0, hexToRgba(color, 0));
        return gradient;
      }

      function hexToRgba(hex, alpha) {
        const bigint = parseInt(hex.replace("#", ""), 16);
        const r = (bigint >> 16) & 255;
        const g = (bigint >> 8) & 255;
        const b = bigint & 255;
        return `rgba(${r},${g},${b},${alpha})`;
      }
    })
    .catch(error => {
      console.error('Error al obtener los datos:', error);
    });
</script>

@endpush