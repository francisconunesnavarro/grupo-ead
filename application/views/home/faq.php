<?php if ($this->user['type'] == 'admin'): ?>
    <a href="javascript:void(0)" onclick="add_new_faq()" class="mb-xs mt-xs mr-xs btn btn-primary">Adicionar pergunta frequente</a>
<?php endif; ?>

<div id="div-add-faq" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title"> <?= lang('add') ?> / <?= lang('edit') ?> <?= lang('faq') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-inline">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group" style="width: 90%">
                            <label class="control-label"><?= lang('question') ?></label>
                            <textarea class="form-control" style="width: 100%" rows="2" id="question"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group" style="width: 90%">
                            <label class="control-label"><?= lang('reply') ?></label>
                            <textarea class="form-control" style="width: 100%" rows="2" id="reply"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                        <input type="text" class="form-control hidden" id="faq_id" value="" >
                        <div class="clearfix visible-xs mb-sm"></div>
                        </br>
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_faq()">Salvar</a>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_faq()">Fechar</a>
                    </div>
                </div>

            </form>
        </div>
    </section>
    </br>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="toggle" data-plugin-toggle>
            <?php
            if (!empty($faq)):
                $i = 0;
                ?>
                <section class="toggle active">
                    <label><?= $faq[$i]['question'] ?></label>
                    <p>
                        <?= $faq[$i]['reply'] ?>
                        <?php if ($this->user['type'] == 'admin'): ?>
                            </br>
                            <a href="javascript:void(0)" onclick="load_faq(<?= $faq[$i]['id'] ?>)" class="mb-xs mt-xs mr-xs btn btn-success"><?= lang('edit') ?></a>
                            <a href="javascript:void(0)" onclick="delete_faq(<?= $faq[$i]['id'] ?>)" class="mb-xs mt-xs mr-xs btn btn-danger"><?= lang('delete') ?></a>
                        <?php endif; ?>
                    </p>
                </section>
                <?php
                $i++;
                while ($i < count($faq)):
                    ?>
                    <section class="toggle">
                        <label><?= $faq[$i]['question'] ?></label>
                        <p>
                        <?= $faq[$i]['reply'] ?>
                        <?php if ($this->user['type'] == 'admin'): ?>
                            </br>
                            <a href="javascript:void(0)" onclick="load_faq(<?= $faq[$i]['id'] ?>)" class="mb-xs mt-xs mr-xs btn btn-success"><?= lang('edit') ?></a>
                            <a href="javascript:void(0)" onclick="delete_faq(<?= $faq[$i]['id'] ?>)" class="mb-xs mt-xs mr-xs btn btn-danger"><?= lang('delete') ?></a>
                        <?php endif; ?>
                    </p>
                    </section>
                    <?php
                    $i++;
                endwhile;
            else:
                ?>
                <h2>Nenhuma dúvida cadastrada</h2>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
