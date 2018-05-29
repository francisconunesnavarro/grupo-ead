<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.css') ?>" />

<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>

<style>

    .wrapper{
        height: 100px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    .wrapper .selection{
        border:1px solid #ccc
    }
</style>

<?php if ($this->user['type'] == 'student'): ?>
    <section role="main"  style="float:left;" >
        <h2><?= lang('discipline_registration') ?></h2>
        <h3><?= lang('put_the_discipline_code') ?></h3>
        <h3><?= lang('professor_give_this_code') ?></h3>
        </br>
        <input type="text" class="form-control" id="discipline_password" placeholder="<?= lang('discipline_password') ?>" value="">
        </br>
        <a class="btn btn-success mb-md ml-xs mr-xs" href="javascript:void(0)" onclick="save_discipline_registration()"><?= lang('save') ?></a>
    </section>
<?php else: ?>
    <section role="main"  style="float: left;overflow-y:scroll;width:100%;overflow-x:hidden;">
        <h2><?= lang('discipline_registration') ?></h2>
        <h3><?= lang('choose_discipline_set_student_email') ?></h3>
        <h3><?= lang('student_email_need_be_equal_registration') ?></h3>    
        </br>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label"><?= lang('disciplines') ?></label><br>
                    <select class="form-control form_discipline selection"  size="15" multiple="multiple" id="discipline_id" data-plugin-multiselect data-plugin-options='{ "includeSelectAllOption": true }'>
                        <?php foreach ($disciplines as $d): ?>
                            <?php if ($d['active'] == 1): ?>
                                <option value="<?= $d['disc_id'] ?>" ><?= $d['disc_name'] ?></option>

                            <?php endif; ?>
                        <?php endforeach; ?>    
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label"><?= lang('student_email') ?></label>
                    <input type="text" class="form-control" id="student_email" placeholder="<?= lang('student_email') ?>" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-6">
<!--                    <div class="radio-custom radio-primary">
                        <input name="direct_registration" type="radio" value="2" />
                        <label>Não enviar email</label>
                    </div>-->
                    <div class="radio-custom radio-primary">
                        <input name="direct_registration" type="radio" value="1" checked="true" />
                        <label><?= lang('register_student_discipline') ?> (Aluno recebe email com orientações de acesso) </label>
                    </div>
<!--                    <div class="radio-custom radio-primary">
                        <input name="direct_registration" type="radio" value="0" />
                        <label><?= lang('register_invitation') ?> (Aluno recebe email de convite e precisa confirmar)</label>
                    </div>-->
<!--                    <div class="radio-custom radio-primary">
                        <input name="direct_registration" type="radio" value="3" />
                        <label>Matrícula com link privado(Gerar link da disciplina)</label>
                    </div>
                    <div class="col-md-12" hidden id="div_discipline_link">
                        <input type="text" class="col-md-8" id="discipline_link" disabled="" value="">
                        <a class="btn btn-success mb-md ml-xs mr-xs" href="javascript:void(0)" onclick="copyToClipboard('discipline_link')">COPIAR LINK</a>
                    </div>-->
                </div>
            </div>
        </div>

        </br>
        <a class="btn btn-success mb-md ml-xs mr-xs" href="javascript:void(0)" onclick="send_discipline_registration()"><?= lang('send') ?></a>
    </section>
<?php endif; ?>

<script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.js') ?>"></script>

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>



<script>    
            jQuery('input[name="direct_registration"]').change(function () {
                    
                var val = $(this).val();
                //  console.log(val);
                if (val === '3') {
                    jQuery('#div_discipline_link').show();
                } else {
                    jQuery('#div_discipline_link').hide();
                }
            });    
</script>