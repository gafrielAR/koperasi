<div class="col-lg-4">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Graphic Simpanan di Tahun ini</h5>
            <div id="savingGraphic"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var yearFilter = '2022';

            function fetchData() {
                $.ajax({
                    url: '{{ route("admin.saving.chart") }}'
                    , type: 'GET'
                    , data: {
                        year: yearFilter
                    }
                    , success: function(response) {
                        console.log(response.chart);
                        renderChart(response.chart);
                    }
                });
            }
            fetchData();

            $('#yearFilter').on('change', function() {
                yearFilter = $(this).val();
                fetchData();
            });

            function renderChart(data) {
                // Sort the dates array in ascending order
                data.dates.sort(function(a, b) {
                    return new Date(a) - new Date(b);
                });

                new ApexCharts(document.querySelector("#savingGraphic"), {
                    series: [{
                        name: "Saving"
                        , data: data.prices
                    }]
                    , chart: {
                        type: 'area'
                        , height: 350
                        , zoom: {
                            enabled: false
                        }
                        , toolbar: {
                            show: false
                        }
                    }
                    , dataLabels: {
                        enabled: false
                    }
                    , stroke: {
                        curve: 'straight'
                    }
                    , labels: data.dates
                    , xaxis: {
                        type: 'datetime'
                    }
                    , yaxis: {
                        opposite: false
                    }
                    , legend: {
                        horizontalAlign: 'left'
                    }
                }).render();
            }
        });

    </script>



    <div class="card">
        <div class="card-body pb-0">
            <h5 class="card-title">Riwayat Transaksi</h5>

            <div class="col">
                <div class="info-card income-card transactionHistory p-0">

                    @if (request()->routeIs('admin.saving.*'))
                    @foreach ($savings->take(5) as $saving)
                    <div class="p-0">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-uang-masuk"></i>
                            </div>
                            <div class="ps-3 flex-grow-1">
                                <h6>{{ $saving->member->name }}</h6>
                                <p class="text-disabled p-0 m-0">{{ $saving->date }}</p>
                            </div>
                            <div>
                                <h4>Rp. {{ number_format($saving->principal_saving) }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @elseif (request()->routeIs('admin.loan.*'))
                    @foreach ($loans->take(5) as $loan)
                    <div class="p-0">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-uang-masuk"></i>
                            </div>
                            <div class="ps-3 flex-grow-1">
                                <h6>{{ $loan->member->name }}</h6>
                                <p class="text-disabled p-0 m-0">{{ $loan->date }}</p>
                            </div>
                            <div>
                                <h4>Rp. {{ number_format($loan->loan) }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($installments->take(5) as $installment)
                    <div class="p-0">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-uang-masuk"></i>
                            </div>
                            <div class="ps-3 flex-grow-1">
                                <h6>{{ $installment->loan->member->name }}</h6>
                                <p class="text-disabled p-0 m-0">{{ $installment->date }}</p>
                            </div>
                            <div>
                                <h4>Rp. {{ number_format($installment->ammount) }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif



                </div>
            </div>
        </div>
    </div>

</div>
