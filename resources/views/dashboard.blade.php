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
  // Realizar una solicitud fetch para obtener los datos de las ventas totales
  fetch('{{ url("/ventas/totales") }}')
    .then(response => response.json()) // Convertir la respuesta a JSON
    .then(data => {
      // Los datos recibidos son un arreglo con nombre de producto y ventas totales
      const labels = data.map(item => item.nombre_producto); // Extraer los nombres de productos
      const salesData = data.map(item => item.ventas_totales); // Extraer las ventas totales

      // Crear el gráfico de pastel (pie chart)
      var ctx = document.getElementById("chart-pie").getContext("2d");

      new Chart(ctx, {
        type: "pie", // Tipo de gráfico (pie)
        data: {
          labels: labels, // Nombres de productos como etiquetas
          datasets: [{
            label: "Ventas Totales por Producto",
            data: salesData, // Datos de ventas totales por producto
            backgroundColor: ['#A0522D', '#CD853F', '#C46F00', '#D2691E'], // Colores de cada producto
          }]
        },
        options: {
          responsive: true, // Asegura que el gráfico sea responsivo
          plugins: {
            legend: {
              position: 'top', // Posición de la leyenda
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  // Personalizar el formato del tooltip
                  return tooltipItem.label + ": $" + tooltipItem.raw;
                }
              }
            }
          }
        }
      });
    })
    .catch(err => {
      console.error('Error al obtener los datos:', err); // Manejo de errores
    });
</script>

<!-- Grafica lineal -->
<script>
  window.onload = function() {
    /* var ctxBars = document.getElementById("chart-bars").getContext("2d");
    console.log(ctxBars)

    new Chart(ctxBars, {
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
    }); */

    // Petición al backend para obtener los datos
    fetch('{{ url("/ventas/por-hora") }}')
      .then(response => response.json())
      .then(data => {
        // Aquí extraemos los datos del formato que nos llegó
        const horas = [];
        const galletaChocolate = [];
        const galletaOreo = [];
        const galletaSnickersYmasmelos = []; 
        const galletaAvenaFresas = [];

        // Creamos un objeto para almacenar las ventas por hora y producto
        const ventasPorHora = {};

        // Procesamos los datos
        data.forEach((item) => {
          // Si no existe la hora, la inicializamos en el objeto
          if (!ventasPorHora[item.hora]) {
            ventasPorHora[item.hora] = {
              'Galleta de Chocolate': 0,
              'Galleta de Oreo': 0,
              'Galleta de Snickers y Masmelos': 0, // Producto combinado
              'Galleta de Avena con Fresas': 0
            };
          }

          // Acumulamos las ventas por hora y producto
          if (item.nombre === 'Galleta de Chocolate') {
            ventasPorHora[item.hora]['Galleta de Chocolate'] += item.cantidad_vendida;
          } else if (item.nombre === 'Galleta de Oreo') {
            ventasPorHora[item.hora]['Galleta de Oreo'] += item.cantidad_vendida;
          } else if (item.nombre === 'Galleta de Snickers y Masmelos') {
            ventasPorHora[item.hora]['Galleta de Snickers y Masmelos'] += item.cantidad_vendida;
          } else if (item.nombre === 'Galleta de Avena con Fresas') {
            ventasPorHora[item.hora]['Galleta de Avena con Fresas'] += item.cantidad_vendida;
          }
        });

        // Ahora pasamos los datos del objeto al formato adecuado para el gráfico
        for (let hora in ventasPorHora) {
          horas.push(hora);
          galletaChocolate.push(ventasPorHora[hora]['Galleta de Chocolate']);
          galletaOreo.push(ventasPorHora[hora]['Galleta de Oreo']);
          galletaSnickersYmasmelos.push(ventasPorHora[hora]['Galleta de Snickers y Masmelos']);
          galletaAvenaFresas.push(ventasPorHora[hora]['Galleta de Avena con Fresas']);
        }

        // Ahora pasamos estos datos al gráfico
        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)');

        var gradientStroke3 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke3.addColorStop(1, 'rgba(255,140,0,0.2)');
        gradientStroke3.addColorStop(0.2, 'rgba(255,140,0,0.0)');
        gradientStroke3.addColorStop(0, 'rgba(255,140,0,0)');

        var gradientStroke4 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke4.addColorStop(1, 'rgba(34,139,34,0.2)');
        gradientStroke4.addColorStop(0.2, 'rgba(34,139,34,0.0)');
        gradientStroke4.addColorStop(0, 'rgba(34,139,34,0)');

        new Chart(ctx2, {
          type: "line",
          data: {
            labels: horas, // Usamos las horas obtenidas
            datasets: [{
                label: "Galleta de Chocolate",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#cb0c9f",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                fill: true,
                data: galletaChocolate, // Datos de Galleta de Chocolate
                maxBarThickness: 6
              },
              {
                label: "Galleta de Oreo",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#FF8C00",
                borderWidth: 3,
                backgroundColor: gradientStroke3,
                fill: true,
                data: galletaOreo, // Datos de Galleta de Oreo
                maxBarThickness: 6
              },
              {
                label: "Galleta de Snickers y Masmelos", // Producto combinado
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#00CED1",
                borderWidth: 3,
                backgroundColor: gradientStroke4,
                fill: true,
                data: galletaSnickersYmasmelos, // Datos combinados de Galleta de Snickers y Masmelos
                maxBarThickness: 6
              },
              {
                label: "Galleta de Avena con Fresas",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#32CD32",
                borderWidth: 3,
                backgroundColor: gradientStroke4,
                fill: true,
                data: galletaAvenaFresas, // Datos de Galleta de Avena con Fresas
                maxBarThickness: 6
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: true
              }
            },
            interaction: {
              intersect: false,
              mode: 'index'
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
                  min: 0,
                  max: 120,
                  stepSize: 5
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false
                },
                ticks: {
                  display: true
                }
              }
            }
          }
        });
      })
      .catch(error => {
        console.error('Error al obtener los datos:', error);
      });
  }
</script>

@endpush