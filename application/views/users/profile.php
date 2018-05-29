<script src="<?= $this->config->base_url(JSPATH . 'home.js') ?>"></script>

<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/basic.css') ?>" />		
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/dropzone.css') ?>" />		

<!--<script src="<?= $this->config->base_url(JSPATH . 'home.js?') . time(); ?>"></script>-->

<div class="row">
    <!-- MENU LATERAL PERFIL-->
    <div class="col-md-4 col-lg-3">

        <section class="panel" >
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img id="image_user" src="<?= $this->user['image'] ?>" class="rounded img-responsive" alt="<?= $this->user['name'] ?>">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?= $this->user['name'] ?></span>
                        <span class="thumb-info-type"><?= lang($this->user['type']) ?></span>
                    </div>
                </div>

                <div class="widget-toggle-expand mb-md">
                    <div class="widget-header">
                        <h6><?= lang('profile_completion') ?></h6>
                    </div>
                    <div class="widget-content-collapsed">
                        <div class="progress progress-xs light" style="height: 21px">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-expanded">
                        <ul class="simple-todo-list">
                            <li id="li_personal_information"><?= lang('personal_information') ?></li>
                            <li id="li_formation_information"><?= lang('formation') ?></li>
                            <li id="li_contact_information"><?= lang('contact_information') ?></li>
<!--                            <li id="socioeconomic_questionnaries"><?= lang('socioeconomic_questionnaries') ?></li>-->
                            <li id="description"><?= lang('description') ?></li>
                            <li id="li_user_image"><?= lang('user_image') ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            </br>
            <ul class="simple-card-list mb-xlg">
                <li class="primary">
                    <h3><?= $number_relationship_disciplines ?></h3>
                    <p><?= lang('relationship_disciplines') ?></p>
                </li>
                <li class="primary">
                    <h3><?= $number_contents_studied ?></h3>
                    <p><?= lang('contents_studied') ?></p>
                </li>
            </ul>
        </section>
    </div>
    <div class="col-md-8 col-lg-9">

        <!-- LISTA DE ABAS-->
        <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
                <li class="active">
                    <a href="#my_profile" data-toggle="tab"><?= lang('my_profile') ?></a>
                </li>
                <li>
                    <a href="#formation" data-toggle="tab"><?= lang('formation') ?></a>
                </li>
                <li>
                    <a href="#addresses" data-toggle="tab"><?= lang('addresses') ?></a>
                </li>
                <li>
                    <a href="#contacts" data-toggle="tab"><?= lang('contacts') ?></a>
                </li> 
<!--                <li>
                    <a href="#socioeconomico" data-toggle="tab"><?= lang('socioeconomic_questionnaries') ?></a>
                </li>-->
                <li>
                    <a href="#learning_style" data-toggle="tab">Estilos e Perfis</a>
                </li>
                <li>
                    <a href="#image" data-toggle="tab"><?= lang('image') ?></a>
                </li>
            </ul>
            <div class="tab-content">

                <!-- ABA MEU PERFIL -->
                <div id="my_profile" class="tab-pane active">

                    <form class="form-horizontal profile" method="get">
                        <h4 class="mb-xlg"><?= lang('personal_information') ?></h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('name') ?></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('email') ?></label>
                                <div class="col-md-10">
                                    <input <?php
                                    if (isset($user['email'])): echo 'disabled';
                                    endif;
                                    ?> type="text" class="form-control" id="email" value="<?= $user['email'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?= lang('birthday') ?></label>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input id="birthday" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control"  value="<?= $user['birthday'] ?>">
                                    </div>
                                </div>
                                <label class="col-md-1 control-label"><?= lang('gender') ?></label>
                                <div class="col-md-3">
                                    <select class="form-control" data-plugin-multiselect id="gender">
                                        <option value="male" <?php
                                        if ($user['gender'] == 'male'): echo 'selected';
                                        endif;
                                        ?>><?= lang('male') ?></option>
                                        <option value="female" <?php
                                        if ($user['gender'] == 'female'): echo 'selected';
                                        endif;
                                        ?>><?= lang('female') ?></option>
                                    </select>
                                </div>
                            </div>

                        </fieldset>
                        <!--                        <hr class="dotted tall">
                                                <h4 class="mb-xlg"><?= lang('additional_information') ?></h4>
                                                <fieldset>
                        <?php foreach ($add_information as $info): ?>
                                                                                                                                                                <div class="form-group">
                                                                                                                                                                    <label class="col-md-3 control-label"><?= $info['field'] ?></label>
                                                                                                                                                                    <div class="col-md-6">
                                                                                                                                                                        <input type="text" class="form-control add_info" name="<?= $info['id'] ?>" id="<?= $info['id'] ?>" value="<?php
                            if (isset($user_add_info)): echo $user_add_info[$info['id']]['value'];
                            endif;
                            ?>">
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                        <?php endforeach; ?>
                        
                        
                                                </fieldset>-->

                        <hr class="dotted tall">
                        <h4 class="mb-xlg"><?= lang('change_password') ?></h4>
                        <fieldset class="mb-xl">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?= lang('password') ?></label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?= lang('password_confirmation') ?></label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" id="password_confirmation">
                                </div>
                            </div>
                        </fieldset>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success" style="float:right" href="javascript:void(0)" onclick="save_profile_user()"><?= lang('save') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ABA INFORMAÇÕES DE FORMAÇÃO -->
                <div id="formation" class="tab-pane">

                    <h4 class="mb-xlg"><?= lang('formation') ?></h4>
                    <fieldset class="mb-xl formation">
                    </fieldset>

                    <hr class="dotted tall">

                    <form class="form-horizontal formation" method="get">
                        <h4 class="mb-xlg">Adicionar nova <?= lang('formation') ?></h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Escolaridade</label>
                                <div class="col-md-3">
                                    <select class="form-control mb-md" name='scholarity' id='scholarity'>
                                        <option value="vazio"></option>
                                        <option value="Fundamental">Fundamental</option>
                                        <option value="Médio">Médio</option>
                                        <option value="Médio-Técnico">Médio-Técnico</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Residência">Residência</option>
                                        <option value="Superior">Superior</option>
                                        <option value="Pós-graduação (Lato senso)">Pós-graduação (Lato senso)</option>
                                        <option value="Pós-graduação (Stricto sensu, nível mestrado)">Pós-graduação (Stricto sensu, nível mestrado)</option>
                                        <option value="Pós-graduação (Stricto sensu, nível doutor)">Pós-graduação (Stricto sensu, nível doutor)</option>
                                        <option value="Pós-doutourado">Pós-doutourado</option>
                                    </select>
                                </div>
                                <label class="col-md-2 control-label">Situação</label>
                                <div class="col-md-3">
                                    <select class="form-control mb-md" name='scholarity_status' id='scholarity_status'>
                                        <option value="vazio"></option>
                                        <option value="Cursando">Cursando</option>
                                        <option value="Incompleto">Incompleto</option>
                                        <option value="Completo">Completo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"id="div_student_course_year"hidden>
                                <label class="col-md-2 control-label">Semestre que está cursando</label>
                                <div class="col-md-4">
                                    <input type="number" min="1"max="14" maxlength="2" class="form-control" id="student_course_year" value="">
                                </div>
                            </div>
                            <div class="form-group"id="div_formation_year"hidden>
                                <label class="col-md-2 control-label"><?= lang('formation_year') ?></label>
                                <div class="col-md-4">
                                    <input type="number" min="1950" class="form-control" id="formation_year" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('course') ?></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name='course' id="course" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('institution_name') ?></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name='school'id="school" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('state') ?></label>
                                <div class="col-md-3">
                                    <select class="form-control mb-md" name='state' id='state'>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <label class="col-md-2 control-label"><?= lang('city') ?></label>
                                <div class="col-md-3">
                                    <select class='form-control mb-md'name='cidades' id="city">
                                    </select>
                                </div>
                            </div>                     
                        </fieldset>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success" style="float:right" href="javascript:void(0)" onclick="save_formation_user()"><?= lang('save') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- ABA ENDEREÇO -->
                <div id="addresses" class="tab-pane">

                    <h4 class="mb-xlg"><?= lang('addresses') ?></h4>
                    <fieldset class="mb-xl addresses">
                    </fieldset>

                    <hr class="dotted tall">

                    <form class="form-horizontal addresses" method="get">
                        <h4 class="mb-xlg"><?= lang('personal_information') ?> - <?= lang('new') ?></h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('country') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="country" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('city') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="city" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('state') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="state" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('neighborhood') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="neighborhood" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('zipcode') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="zipcode" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('street') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="street" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('number') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="number" value="">
                                </div>
                            </div>
                        </fieldset>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success" style="float:right" href="javascript:void(0)" onclick="save_address_user()"><?= lang('save') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- ABA CONTATOS -->
                <div id="contacts" class="tab-pane">

                    <h4 class="mb-xlg"><?= lang('contacts') ?></h4>
                    <fieldset class="mb-xl contacts">
                    </fieldset>

                    <hr class="dotted tall">

                    <form class="form-horizontal contacts" method="get">
                        <h4 class="mb-xlg"><?= lang('contact_information') ?> - <?= lang('new') ?></h4>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('number') ?></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"><?= lang('type') ?></label>
                                <div class="col-md-4">
                                    <select class="form-control" data-plugin-multiselect id="type">
                                        <option value="house"><?= lang('house') ?></option>
                                        <option value="work"><?= lang('work') ?></option>
                                        <option value="cellphone"><?= lang('cellphone') ?></option>
                                    </select>                              
                                </div>
                            </div>
                        </fieldset>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-success" style="float:right" href="javascript:void(0)" onclick="save_contact_user()"><?= lang('save') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ABA PARA QUESTIONÁRIO SÓCIOECONOMICO-ENADE -->
                <div id="socioeconomico" class="tab-pane">
                    <fieldset class="mb-xl socioeconomico">
                    </fieldset>
                </div>

                <!-- ABA PARA QUESTIONÁRIO ESTILO DE APRENDIZAGEM e MBTI-->

                <div id="learning_style" class="tab-pane">
                    <?php
                    if ($user['mbti']) {
                        $class1 = 'panel panel-success';
                    } else {
                        $class1 = 'panel';
                    }
                    ?>
                    <section id="section_mbti" class="<?= $class1 ?>">
                        <header class="panel-heading">
                            <a onclick="jQuery('#mbti_minimize').click();" href="javascript:void(0)">
                                <h2 class="panel-title">MBTI</h2>
                                <p class="panel-subtitle">
                                </p>
                                <div class="panel-actions">
                                    <a href="javascript:void(0)" class="fa fa-caret-up" id="mbti_minimize"></a>
                                </div>
                            </a>
                        </header>
                        <div class="panel-body" style="display: none;">
                            <fieldset class="mb-xl">
                                <div class="col-md-12"<?php
                                if (!empty($user['mbti'])): echo 'hidden';
                                endif;
                                ?>>
                                    <a target="_blank" href='http://sgiz.mobi/s3/d1f718bc5c3f' class='mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block'>Clique para começar</a>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Resultado MBTI:</label>
                                        <select data-plugin-selectTwo class="form-control populate input-lg mb-md" id="mbti" name="mbti"
                                        <?php
                                        if (!empty($user['mbti'])): echo 'disabled';
                                        endif;
                                        ?>>
                                            <option value="" <?php
                                            if ($user['mbti'] == ''): echo 'selected';
                                            endif;
                                            ?>></option>
                                            <option value="ENFJ" <?php
                                            if ($user['mbti'] == 'ENFJ'): echo 'selected';
                                            endif;
                                            ?> >ENFJ</option>
                                            <option value="ENFP" <?php
                                            if ($user['mbti'] == 'ENFP'): echo 'selected';
                                            endif;
                                            ?>  >ENFP</option>
                                            <option value="ENTJ" <?php
                                            if ($user['mbti'] == 'ENTJ'): echo 'selected';
                                            endif;
                                            ?> >ENTJ</option>
                                            <option value="ENTP" <?php
                                            if ($user['mbti'] == 'ENTP'): echo 'selected';
                                            endif;
                                            ?>  >ENTP</option>
                                            <option value="ESFJ" <?php
                                            if ($user['mbti'] == 'ESFJ'): echo 'selected';
                                            endif;
                                            ?>  >ESFJ</option>
                                            <option value="ESFP" <?php
                                            if ($user['mbti'] == 'ESFP'): echo 'selected';
                                            endif;
                                            ?>  >ESFP</option>
                                            <option value="ESTJ" <?php
                                            if ($user['mbti'] == 'ESTJ'): echo 'selected';
                                            endif;
                                            ?>  >ESTJ</option>
                                            <option value="ESTP" <?php
                                            if ($user['mbti'] == 'ESTP'): echo 'selected';
                                            endif;
                                            ?>  >ESTP</option>
                                            <option value="ISTJ" <?php
                                            if ($user['mbti'] == 'ISTJ'): echo 'selected';
                                            endif;
                                            ?>  >ISTJ</option>
                                            <option value="ISTP" <?php
                                            if ($user['mbti'] == 'ISTP'): echo 'selected';
                                            endif;
                                            ?>  >ISTP</option>
                                            <option value="INFJ" <?php
                                            if ($user['mbti'] == 'INFJ'): echo 'selected';
                                            endif;
                                            ?>  >INFJ</option>
                                            <option value="INFP" <?php
                                            if ($user['mbti'] == 'INFP'): echo 'selected';
                                            endif;
                                            ?>  >INFP</option>
                                            <option value="INTJ" <?php
                                            if ($user['mbti'] == 'INTJ'): echo 'selected';
                                            endif;
                                            ?>  >INTJ</option>
                                            <option value="INTP" <?php
                                            if ($user['mbti'] == 'INTP'): echo 'selected';
                                            endif;
                                            ?>  >INTP</option>
                                            <option value="ISFJ" <?php
                                            if ($user['mbti'] == 'ISFJ'): echo 'selected';
                                            endif;
                                            ?>  >ISFJ</option>
                                            <option value="ISFP" <?php
                                            if ($user['mbti'] == 'ISFP'): echo 'selected';
                                            endif;
                                            ?>  >ISFP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a class="btn btn-success" style="float: right;" href="javascript:void(0)" id="save_mbti_btn" onclick="save_mbti()"
                                    <?php
                                    if (!empty($user['mbti'])): echo 'disabled';
                                    endif;
                                    ?>><?= lang('save') ?></a>
                                </div>
                            </fieldset>
                        </div>
                    </section>

<!--                    <section class="panel">
                        <header class="panel-heading">
                            <a onclick="jQuery('#ls_minimize').click();" href="javascript:void(0)">
                                <h2 class="panel-title">Questionário Zerbini</h2>
                                <p class="panel-subtitle">
                                </p>
                                <div class="panel-actions">
                                    <a href="javascript:void(0)" class="fa fa-caret-up" id="ls_minimize"></a>
                                </div>
                            </a>
                        </header>
                        <div class="panel-body learning_style_zerbini" style="display: none;">

                        </div>
                    </section>-->

                    <section id="section_vark" class="panel">
                        <header class="panel-heading">
                            <a onclick="jQuery('#vark_minimize').click();" href="javascript:void(0)">
                                <h2 class="panel-title">Questionário de Vark</h2>
                                <p class="panel-subtitle">
                                </p>
                                <div class="panel-actions">
                                    <a href="javascript:void(0)" class="fa fa-caret-up" id="vark_minimize"></a>
                                </div>
                            </a>
                        </header>
                        <div class="panel-body vark" style="display: none;">

                        </div>
                    </section>

                    <section class="panel" id="section_kts">
                        <header class="panel-heading">
                            <a onclick="jQuery('#kts_minimize').click();" href="javascript:void(0)">
                                <h2 class="panel-title">Questionário de KTS</h2>
                                <p class="panel-subtitle">
                                </p>
                                <div class="panel-actions">
                                    <a href="javascript:void(0)" class="fa fa-caret-up" id="kts_minimize"></a>
                                </div>
                            </a>
                        </header>
                        <div class="panel-body kts" style="display: none;">

                        </div>
                    </section>                    

                </div>
                <!-- ABA PARA ADICIONAR IMAGEM PERFIL -->
                <div id="image" class="tab-pane">
                    <h4 class="mb-xlg"><?= lang('user_image') ?></h4>
                    <!--ADICIONANDO ANEXO-->
                    <div class="panel-body">
                        <form action="<?= $this->config->base_url('users/image_user_receive') ?>" class="dropzone dz-square" id="dropzone"></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Specific Page Vendor -->	
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-autosize/jquery.autosize.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'dropzone/dropzone.js') ?>"></script>		

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

<script>
                                jQuery("fieldset.formation").load(jQuery("body").data("baseurl") + "users/load_formation");
                                jQuery("fieldset.addresses").load(jQuery("body").data("baseurl") + "users/load_addresses");
                                jQuery("fieldset.contacts").load(jQuery("body").data("baseurl") + "users/load_contacts");
//                                jQuery("fieldset.socioeconomico").load(jQuery("body").data("baseurl") + "forms/form_enade");
                                jQuery("div.learning_style_zerbini").load(jQuery("body").data("baseurl") + "forms/learning_style");
                                jQuery("div.vark").load(jQuery("body").data("baseurl") + "forms/form_vark");
                                jQuery("div.kts").load(jQuery("body").data("baseurl") + "forms/form_kts");


                                Dropzone.autoDiscover = false; // otherwise will be initialized twice
                                var myDropzoneOptions = {
                                    maxFiles: 1,
                                    maxFilesize: 500000000000000,
                                    acceptedMimeTypes: 'image/*',
                                    init: function () {
                                        this.on("complete", function (file) {
                                            window.location = jQuery("body").data('baseurl') + 'home/profile';
                                        });
                                    }
                                };
                                var myDropzoneVideo = new Dropzone('#dropzone', myDropzoneOptions);

                                if (jQuery('#name').val() && jQuery('#email').val() && jQuery('#birthday').val()) {
                                    jQuery('#li_personal_information').addClass('completed');
                                    update_percent_profile();
                                } else {
                                    jQuery('#li_personal_information').removeClass('completed');
                                    update_percent_profile();
                                }
                                
                                if (jQuery('#image_user').prop('src') != 'default-user.png' ) {
                                    jQuery('#li_user_image').addClass('completed');
                                    update_percent_profile();
                                } else {
                                    jQuery('#li_user_image').removeClass('completed');
                                    update_percent_profile();
                                }
</script>
