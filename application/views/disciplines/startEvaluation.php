<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>
<section class="panel form-wizard" id="w3">
    <header class="panel-heading">
        <h2 class="panel-title"><?php
            if ($evaluation[0]['type'] == 1): echo lang('daily_pay_test');
            elseif ($evaluation[0]['type'] == 2): echo lang('after_test');
            elseif ($evaluation[0]['type'] == 3): echo lang('evaluation');
            endif;
            ?></h2>
    </header>
    <div class="panel-body">
        <div class="wizard-progress" style="margin-bottom: -30px;">
            <div class="steps-progress">
                <div class="progress-indicator"></div>
            </div>
            <ul>
                <!-- carregando o header com os ids das questoes -->
                <?php foreach ($full_evaluation as $key => $fe): ?>
                    <li <?php if ($key == 0): ?> class="active" <?php endif; ?> >
                        <a href="#wizard-evaluation-<?= $fe[0]['id'] ?>" data-toggle="tab"><span><?= $key ?></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form class="form-horizontal" novalidate="novalidate" id="form_evaluation">
            <div class="tab-content">
                <?php foreach ($full_evaluation as $key => $fe): ?>
                    <div id="wizard-evaluation-<?= $fe[0]['id'] ?>" class="tab-pane <?php if ($key == 0): ?> active <?php endif; ?>">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label" style="margin-bottom: 20px;"><?= $fe[0]['question'] ?></label>
                                <div class="radio-custom radio-primary">
                                    <input name="<?= $fe[0]['id'] ?>" type="radio" value="<?= $fe[0]['reply_id'] ?>" />
                                    <label><?= $fe[0]['reply'] ?></label>
                                </div>
                                <div class="radio-custom radio-primary">
                                    <input name="<?= $fe[0]['id'] ?>" type="radio" value="<?= $fe[1]['reply_id'] ?>" />
                                    <label><?= $fe[1]['reply'] ?></label>
                                </div>
                                <?php if (isset($fe[2]['reply'])): ?>
                                    <div class="radio-custom radio-primary">
                                        <input name="<?= $fe[0]['id'] ?>" type="radio" value="<?= $fe[2]['reply_id'] ?>" />
                                        <label><?= $fe[2]['reply'] ?></label>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($fe[3]['reply'])): ?>
                                    <div class="radio-custom radio-primary">
                                        <input name="<?= $fe[0]['id'] ?>" type="radio" value="<?= $fe[3]['reply_id'] ?>" />
                                        <label><?= $fe[3]['reply'] ?></label>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($fe[4]['reply'])): ?>
                                    <div class="radio-custom radio-primary">
                                        <input name="<?= $fe[0]['id'] ?>" type="radio" value="<?= $fe[4]['reply_id'] ?>" />
                                        <label><?= $fe[4]['reply'] ?></label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <ul class="pager">
            <li class="previous disabled">
                <a><i class="fa fa-angle-left"></i> <?= lang('previous') ?></a>
            </li>
            <li class="finish hidden pull-right">
                <a href="javascript:void(0)" onclick="finish_evaluation(<?= $evaluation[0]['evaluation_id'] ?>)"><?= lang('finish') ?></a>
            </li>
            <li class="next">
                <a><?= lang('next') ?> <i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </div>
</section>
<script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-wizard/jquery.bootstrap.wizard.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'forms/examples.wizard.js') ?>"></script>

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>