<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-appear/jquery.appear.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-easypiechart/jquery.easypiechart.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot-tooltip/jquery.flot.tooltip.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.pie.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.categories.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.resize.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-sparkline/jquery.sparkline.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'raphael/raphael.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'morris/morris.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'gauge/gauge.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'snap-svg/snap.svg.js') ?>"></script>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Respostas corretas</h2>
        <p class="panel-subtitle"></p>
    </header>
    <div class="panel-body">

        <!-- Flot: Bars -->
        <div class="chart chart-md" id="flotBars"></div>
        <script type="text/javascript">

// var flotBarsData = [
//                ["Jan", 28],
//                ["Feb", 42],
//                ["Mar", 25],
//                ["Apr", 23],
//                ["May", 37],
//                ["Jun", 33],
//                ["Jul", 18],
//                ["Aug", 14],
//                ["Sep", 18],
//                ["Oct", 15],
//                ["Nov", 4],
//                ["Dec", 7]
//            ];


            var flotBarsData = <?= $stats ?>;

            // See: assets/javascripts/ui-elements/examples.charts.js for more settings.
            /*
             Flot: Bars
             */
            (function () {
                var plot = $.plot('#flotBars', [flotBarsData], {
                    colors: ['#8CC9E8'],
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.8,
                            align: 'center'
                        }
                    },
                    xaxis: {
                        mode: 'categories',
                        tickLength: 0
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        borderColor: 'rgba(0,0,0,0.1)',
                        borderWidth: 1,
                        labelMargin: 15,
                        backgroundColor: 'transparent'
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%y',
                        shifts: {
                            x: -10,
                            y: 20
                        },
                        defaultTheme: false
                    }
                });
            })();

        </script>

    </div>
</section>