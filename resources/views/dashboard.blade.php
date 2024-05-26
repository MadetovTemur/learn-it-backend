<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="card mt-3">
        <div class="card-content">
          <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                  {{ $counts }}
                  <span class="float-right"><i class="fa fa-shopping-cart"></i></span>
                </h5>
                <div class="progress my-3" style="height: 10px">
                  <div class="progress-bar" style="width: {{ $counts / 10  }}px"></div>
                </div>
                <p class="mb-0 text-white small-font">
                  Total Sertificates
                  <span class="float-right"> 1 000 <i class="zmdi zmdi-long-arrow-up"></i></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                  8323
                  <span class="float-right"><i class="fa fa-usd"></i></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                  Total Revenue
                  <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                  6200
                  <span class="float-right"><i class="fa fa-eye"></i></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                  Visitors
                  <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span>
                </p>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
              <div class="card-body">
                <h5 class="text-white mb-0">
                  5630
                  <span class="float-right"><i class="fa fa-envira"></i></span>
                </h5>
                <div class="progress my-3" style="height: 3px">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mb-0 text-white small-font">
                  Messages
                  <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span>
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>




    <div class="card">
        <div class="card-header">
          Certificate Grafik
          <div class="card-action">
            <div class="dropdown">
              <a
                href="javascript:void();"
                class="dropdown-toggle dropdown-toggle-nocaret"
                data-toggle="dropdown"
              >
                <i class="icon-options"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="javascript:void();"
                  >Action</a
                >
                <a class="dropdown-item" href="javascript:void();"
                  >Another action</a
                >
                <a class="dropdown-item" href="javascript:void();"
                  >Something else here</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void();"
                  >Separated link</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-inline">
            <li class="list-inline-item">
              <i class="fa fa-circle mr-2 text-white"></i>Certificates for 2024
            </li>
           
          </ul>
          <div class="chart-container-1">
            <canvas id="chart1"></canvas>
          </div>
        </div>

        <div class="row m-0 row-group text-center border-top border-light-3">
          <div class="col-12 col-lg-4">
            <div class="p-3">
              <h5 class="mb-0">45.87M</h5>
              <small class="mb-0"
                >Overall Visitor
                <span>
                  <i class="fa fa-arrow-up"></i> {{ $prosetn }}%</span
                ></small
              >
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="p-3">
              <h5 class="mb-0">15:48</h5>
              <small class="mb-0"
                >Visitor Duration
                <span>
                  <i class="fa fa-arrow-up"></i> 12.65%</span
                ></small
              >
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="p-3">
              <h5 class="mb-0">245.65</h5>
              <small class="mb-0"
                >Pages/Visit
                <span>
                  <i class="fa fa-arrow-up"></i> 5.62%</span
                ></small
              >
            </div>
          </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">
        var data_chart = {!! json_encode($chart_1) !!};
          // chart 1

        var ctx = document.getElementById("chart1").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line",
            data: {
              labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
              ],
              datasets: [
                {
                  label: "Certificates for 2024",
                  data: data_chart, //  [3, 3, 8, 5, 7, 4, 6, 4, 6],
                  backgroundColor: "#fff",
                  borderColor: "transparent",
                  pointRadius: "0",
                  borderWidth: 3,
                }
              ],
            },
            options: {
              maintainAspectRatio: false,
              legend: {
                display: false,
                labels: {
                  fontColor: "#ddd",
                  boxWidth: 40,
                },
              },
              tooltips: {
                displayColors: false,
              },
              scales: {
                xAxes: [
                  {
                    ticks: {
                      beginAtZero: true,
                      fontColor: "#ddd",
                    },
                    gridLines: {
                      display: true,
                      color: "rgba(221, 221, 221, 0.08)",
                    },
                  },
                ],
                yAxes: [
                  {
                    ticks: {
                      beginAtZero: true,
                      fontColor: "#ddd",
                    },
                    gridLines: {
                      display: true,
                      color: "rgba(221, 221, 221, 0.08)",
                    },
                  },
                ],
              },
            },
        });
        
        console.log(data_chart);

    </script>
    <!-- Index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>

</x-app-layout>
