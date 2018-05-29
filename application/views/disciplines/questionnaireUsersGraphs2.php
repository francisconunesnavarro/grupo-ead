<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'morris/morris.css') ?>" />

<div class='row' style="text-align: center">
    <a style="margin: 10px; width: 30%" href="<?= $this->config->base_url('disciplines/list_questionnaire_graphs/' . $questionnaire_discipline_id_encoded) ?>" class='btn btn-success'>Voltar para as Perguntas</a>
    <a style="margin: 10px; width: 30%" href="javascript:void(0)" onclick="window.location.reload()" class='btn btn-success'>Atualizar respostas</a>
</div>

<div class='row'>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys2)): ?>
                            <tbody>
                                <?php foreach ($replys2 as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Professor - Geral</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie"></div>
                <script type="text/javascript">
                    var flotPieData = [
<?php foreach ($replys2 as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_med2)): ?>
                            <tbody>
                                <?php foreach ($replys_med2 as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Professor - Médico</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie2"></div>
                <script type="text/javascript">
                    var flotPieData2 = [
<?php foreach ($replys_med2 as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
</div>


<div class='row'>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_enf2)): ?>
                            <tbody>
                                <?php foreach ($replys_enf2 as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Professor - Enfermeiro</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie3"></div>
                <script type="text/javascript">
                    var flotPieData3 = [
<?php foreach ($replys_enf2 as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
    <div class="col-md-6">

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_con2)): ?>
                            <tbody>
                                <?php foreach ($replys_con2 as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Professor - Farmacêutico</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie4"></div>
                <script type="text/javascript">
                    var flotPieData4 = [
<?php foreach ($replys_con2 as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
</div>

<div class='row'>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys)): ?>
                            <tbody>
                                <?php foreach ($replys as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Geral</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie5"></div>
                <script type="text/javascript">
                    var flotPieData5 = [
<?php foreach ($replys as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
    <div class="col-md-6">

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_med)): ?>
                            <tbody>
                                <?php foreach ($replys_med as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Médico</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie6"></div>
                <script type="text/javascript">
                    var flotPieData6 = [
<?php foreach ($replys_med as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
</div>


<div class='row'>
    <div class="col-md-6">

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_enf)): ?>
                            <tbody>
                                <?php foreach ($replys_enf as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Enfermeiro</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie7"></div>
                <script type="text/javascript">
                    var flotPieData7 = [
<?php foreach ($replys_enf as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
    <div class="col-md-6">

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><?= $replys[0]['question'] ?></h2>
                <small></small>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>n</th>
                                <th>%</th>
                                <th>Respostas</th>
                            </tr>
                        </thead>

                        <?php if (!empty($replys_con)): ?>
                            <tbody>
                                <?php foreach ($replys_con as $r): ?>
                                    <tr>
                                        <td><?= $r['sum'] ?></td>
                                        <td><?= $r['percent'] ?></td>
                                        <td><?= $r['reply'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Farmacêutico</h2>
            </header>
            <div class="panel-body">
                <div class="chart chart-md" id="flotPie8"></div>
                <script type="text/javascript">
                    var flotPieData8 = [
<?php foreach ($replys_con as $r): ?>
                        {
                        label: "<?= $r['reply'] ?>",
                                data: [
                                [1, <?= $r['percent'] ?>]
                                ],
                                color: '#<?= str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT); ?>'
                        },
<?php endforeach; ?>
                    ];
                </script>
            </div>
        </section>
    </div>
</div>

<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-easypiechart/jquery.easypiechart.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'flot/jquery.flot.pie.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
<script>
                    var plot = $.plot('#flotPie', flotPieData, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie2', flotPieData2, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie3', flotPieData3, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie4', flotPieData4, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    
                    var plot = $.plot('#flotPie5', flotPieData5, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie6', flotPieData6, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie7', flotPieData7, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    var plot = $.plot('#flotPie8', flotPieData8, {
                    series: {
                    pie: {
                    show: true,
                            combine: {
                            color: '#999',
                                    threshold: 0.1
                            }
                    }
                    },
                            legend: {
                            show: false
                            },
                            grid: {
                            hoverable: true,
                                    clickable: true
                            }
                    });
                    
                    
                    
                    
                    
                    jQuery('.nav.nav-main li').removeClass('nav-active');
</script>