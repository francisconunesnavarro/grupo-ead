<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'morris/morris.css') ?>" />

<section class="panel">
    <div class="row">
        <?php if (!empty($disciplines)): ?>
            <?php foreach ($disciplines as $d): ?>
                <div class="col-md-4 ">
                    <section class="panel enterleave" id="<?= $d['disc_id'] ?>">
                        <?php if ($d['active'] == 1 || $this->user['type'] == 'professor' || $this->user['type'] == 'admin'): ?>
                            <a href="<?= $this->config->base_url('disciplines/openDiscipline/') . $d['disc_id'] ?>">
                            <?php else: ?>
                                <a class="modal-sizes" href="#modalDiscOff" onclick="jQuery('#active_day').html('<?= $d['start_date_lessons'] ?>')">
                                <?php endif; ?>
                                <div class="item">
                                    <div class="panel-body panel-body-nopadding">
                                        <div class="owl-carousel mb-md" data-plugin-carousel data-plugin-options='{ "items": 1, "autoHeight": true }'>
                                            <?php if (isset($d['disc_acronym'])): ?>
                                                <div class="item" style="text-align: -webkit-center">
                                                    <img alt="<?= $d['disc_name'] ?>" class="img-responsive img-rounded" src="<?= $this->config->base_url(IMGPATH . $d['image']) ?>">
                                                </div>
                                            <?php else: ?>
                                                <div class="item">

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="p-md">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-semibold mt-none"><?php
                                                        if (isset($d['disc_acronym'])): echo $d['disc_acronym'];
                                                            echo " - ";
                                                        endif;
                                                        ?><?= $d['disc_name'] ?></h5>
                                                    <?php
                                                    if ($d['active'] == 0 && $this->user['type'] == 'student'): echo lang('expired');
                                                    endif;
                                                    ?>
                                                </div>
                                                <?php if ($this->user['type'] == 'student'): ?>
                                                    <div class="col-md-4">
                                                        <div class="liquid-meter" style="width: 55px">
                                                            <meter min="0" max="100" value="<?= $d['percent'] ?>" class="meterSales"></meter>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($d['summary_content'] !== '' && $d['summary_content'] !== NULL): ?>
                                                <div class="row" >
                                                    <div class="col-md-12 hidden" id="div-description-<?= $d['disc_id'] ?>">
                                                        <p><?= $d['summary_content'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                </section>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        </section>
                        <?php if (isset($apresentation_video)): ?>
                            <a id="modalVideoButton" class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalVideo" style="position: fixed; bottom: 5px; right: 5px;"><i class="fa fa-play-circle"></i> <?= lang('apresentation_video') ?></a>
                        <?php endif; ?>
                        <div id="modalDiscOff" class="modal-block mfp-hide modal-header-color modal-block-primary" style="max-width: 400px;">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Disciplina inativo</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="modal-wrapper">
                                        <div class="modal-icon">
                                            <i class="fa fa-info-circle" style="color: #34d19f"></i>
                                        </div>
                                        <div class="modal-text">
                                            <h4>Contagem regressiva</h4>
                                            <p>Dia <span id="active_day"></span> essa disciplina estará ativa.</p>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>

                        <div id="modalVideo" class="modal-block mfp-hide" style="max-width: 668px;">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title"><?= lang('apresentation_video') ?></h2>
                                </header>
                                <div class="panel-body">
                                    <embed src="<?php
                                    if (isset($apresentation_video)): echo $this->config->base_url($apresentation_video);
                                    endif;
                                    ?>" width="640" height="390"
                                           autoplay="false" controller="false">
                                    </embed>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                            
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-ui/js/jquery-ui-1.10.4.custom.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-ui-touch-punch/jquery.ui.touch-punch.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-appear/jquery.appear.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.js') ?>"></script>
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
                        <script src="<?= $this->config->base_url(VENDORPATH . 'liquid-meter/liquid.meter.js') ?>"></script>
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/jquery.vmap.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/data/jquery.vmap.sampledata.js') ?>"></script>
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/jquery.vmap.world.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.africa.js') ?>"></script>
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.asia.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.australia.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.europe.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.north-america.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jqvmap/maps/continents/jquery.vmap.south-america.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'dashboard/examples.dashboard.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'ui-elements/examples.modals.js') ?>"></script>
                        <?php if ($open_apresentation == 1) { ?>
                            <script>
                                    jQuery('#modalVideoButton').click();
                            </script>
                        <?php } ?>
                        <input id="liquid_color" value="<?= $this->config->item('liquid_color'); ?>" hidden="">

                        <script>
                            jQuery('.nav.nav-main li').removeClass('nav-active');

                            jQuery(".enterleave")
                                    .mouseenter(function () {
                                        jQuery('#div-description-' + jQuery(this).attr('id')).removeClass('hidden');
                                    })
                                    .mouseleave(function () {
                                        jQuery('#div-description-' + jQuery(this).attr('id')).addClass('hidden');
                                    });

                            jQuery('.meterSales').liquidMeter({
                                shape: 'circle',
                                color: jQuery('#liquid_color').val(),
                                background: '#F9F9F9',
                                fontSize: '36px',
                                fontWeight: '600',
                                stroke: '#F2F2F2',
                                textColor: '#333',
                                liquidOpacity: 0.9,
                                liquidPalette: ['#333'],
                                speed: 3000,
                                animate: !$.browser.mobile
                            });
                        </script>