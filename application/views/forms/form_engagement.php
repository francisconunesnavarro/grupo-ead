<script type="text/javascript">

    $(document).ready(function () {

        $.getJSON(jQuery("body").data("baseurl") + 'public/js/estados_cidades.json', function (data) {
            var items = [];
            var options = '<option value="">escolha um estado</option>';
            $.each(data, function (key, val) {
                options += '<option value="' + val.nome + '">' + val.nome + '</option>';
            });
            $("#estados").html(options);

            $("#estados").change(function () {

                var options_cidades = '';
                var str = "";

                $("#estados option:selected").each(function () {
                    str += $(this).text();
                });

                $.each(data, function (key, val) {
                    if (val.nome == str) {
                        $.each(val.cidades, function (key_city, val_city) {
                            options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                        });
                    }
                });
                $("#cidades").html(options_cidades);

            }).change();

        });

    });

</script>	
<section class='panel-body'style='width: 900px;margin-left: 150px;'>
    <header class='panel-heading'>
        <p style='text-align:justify; font-size:14px;font-style: italic'> Olá! Você está participando de uma extensão do estudo intitulado “Engagement entre Estudantes do Ensino Superior das Ciências da Saúde”. Antes de preencher o instrumento “Questionário do Bem Estar e Trabalho para Estudantes” (PORTO-MARTINS e BENEVIDES, 2008), gostaríamos de conhecê-lo um pouco melhor. Caso tenha alguma dúvida no preenchimento poderá esclarecer com a pesquisadora. Desde já, agradecemos sua participação nessa pesquisa
        </p>
    </header>
</section>

<section class="panel" style='width: 900px;margin-left: 150px;'>
    <header class="panel-heading">
        <h2 class="panel-title">Dados Sóciodemográficos Estudantes</h2>
    </header>
    <div class="panel-body"style='text-align:justify;font-family:Arial;font-size: 12px;'>

        <form class="form-horizontal form-bordered" id='engagement'>


            <div class="col-md-12">
                <div class="panel-title"><h4>Idade:</h4></div>
                <div class="col-md-2"><input name='idade' type='text' class='form-control'> </div>

            </div>

            <div class="col-md-12">
                <div class="col-md-2 panel-title"><h4>Sexo:</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Masculino'  name="sexo">
                        <label for="radioExample3">Masculino</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Feminino'  name="sexo">
                        <label for="radioExample3">Feminino</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Nº de vestibulares para ingresso no atual curso:</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='1' name="n_vest">
                        <label for="radioExample3">1 vestibular</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='2' name="n_vest">
                        <label for="radioExample3">2 vestibulares       </label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='3'  name="n_vest">
                        <label for="radioExample3">3 vestibulares</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='mais_que_tres'  name="n_vest">
                        <label for="radioExample3">Mais que 3 vestibulares</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Assinale o que levou a escolher este curso</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='escolha_propria' name="escolha_curso">
                        <label for="radioExample3">Escolha própria </label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='influencia_pais' name="escolha_curso">
                        <label for="radioExample3">Influência dos pais </label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='outros_familiares'  name="escolha_curso">
                        <label for="radioExample3">Influência de outros familiares </label>
                    </div>
                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio"value='outro'  name="escolha_curso">
                        <label for="radioExample3">Outro</label>
                        <div class="col-md-8" id='div_escolha_curso'hidden ><input name='escolha_curso_outro' type='text' class='form-control'> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-2 panel-title"><h4>Turno:</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Manha' name="turno">
                        <label for="radioExample3">Manhã</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='Tarde' name="turno">
                        <label for="radioExample3">Tarde</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Noite'  name="turno">
                        <label for="radioExample3">Noite</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Integral'  name="turno">
                        <label for="radioExample3">Integral</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-8 panel-title"><h4>Período que está cursando:</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='periodo'>
                        <option value='vazio'></option>
                        <option value="1 periodo">1º período</option>
                        <option value="2 periodo">2º período</option>
                        <option value="3 periodo">3º período</option>
                        <option value="4 periodo">4º período</option>
                        <option value="5 periodo">5º período</option>
                        <option value="6 periodo">6º período</option>
                        <option value="7 periodo">7º período</option>
                        <option value="8 periodo">8º período</option>
                        <option value="9 periodo">9º período</option>
                        <option value="10 periodo">10º período</option>
                        <option value="11 periodo">11º período</option>
                        <option value="12 periodo">12º período</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div clas='row'>
                    <div class="col-md-12 panel-title"><h4>Formato do currículo:</h4></div>
                </div>
                <div class="row radio-custom radio-success">
                    <input type="radio" value='tradicional_sem_metodologia_ativa' name="formato_curriculo">
                    <label for="radioExample3">Tradicional sem uso de Metodologias Ativas</label>
                </div>
                <div class="col-md-4 radio-custom radio-success">
                    <input type="radio"  value='tradicional_com_metodologia_ativa' name="formato_curriculo">
                    <label for="radioExample3">Tradicional com uso de Metodologias Ativas</label>
                </div>
                <div class="col-md-4 radio-custom radio-success">
                    <input type="radio"value='integrado_metodologia_ativa'  name="formato_curriculo">
                    <label for="radioExample3">Currículo Integrado com uso de Metodologias Ativas</label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-8 panel-title"><h4>Com quem reside?</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='reside'>
                        <option value='vazio'></option>
                        <option value="Sozinho(a)">Sozinho(a)</option>
                        <option value='Pais'>Pais</option>
                        <option value="Pais e irmaos">Pais e irmãos </option>
                        <option value="Avos">Avós</option>
                        <option value='Marido/esposa'>Marido/Esposa</option>
                        <option value='Marido/esposa e filhos(s)'>Marido/esposa e filho(s)</option>
                        <option value='Outros'>Outros</option>
                    </select>
                    <div class="col-md-8" id='div_reside' hidden><input name='reside_outros' type='text' class='form-control'placeholder="Citar"> </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-2 panel-title"><h4>Assinale a renda média de sua família</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='1 a 5 salarios' name="renda_media">
                        <label for="radioExample3">1 a 5 salários</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='6 a 10 salarios' name="renda_media">
                        <label for="radioExample3">6 a 10 salários</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='11 a 15 salarios'  name="renda_media">
                        <label for="radioExample3">11 a 15 salários</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='16 salarios ou mais'  name="renda_media">
                        <label for="radioExample3">16 salários ou mais</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-8 panel-title"><h4>Estado Civil:</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='estado_civil'>
                        <option value='vazio'></option>
                        <option value='Casado(a)'>Casado(a)</option>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value='Amasiado(a)'>Amasiado(a) </option>
                        <option value='Viuvo(a)'>Viúvo(a)</option>
                        <option value='Uniao Estavel'>União estável</option>
                        <option value='Separado'>Separado(a)</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12"hidden id='div_uniao' >
                <div class="col-md-8 panel-title" ><h4>Tempo de união:</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='tempo_uniao'>
                        <option value='vazio'></option>
                        <option value='ate 5 anos'>até 5 anos</option>
                        <option value='6 a 10anos'>de 6 a 10 anos</option>
                        <option value='11 a 15anos'>11 anos a 15 anos</option>
                        <option value='16 ou mais'>16 anos ou mais</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Possui filhos(s)?</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Sim' name="filhos">
                        <label for="radioExample3">Sim</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Nao'  name="filhos">
                        <label for="radioExample3">Não</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12"hidden id='div_filhos'>
                <div class="panel-title"><h4>Quantos?</h4></div>
                <div class="col-md-2"><input name='quantidade_filhos' type='text' class='form-control'> </div>

            </div>

            <div class="col-md-12">
                <div class="col-md-8 panel-title" ><h4>Local de sua residência fixa:</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='estados' id='estados'>
                        <option value=""></option>
                    </select>
                    <select class='form-control mb-md'name='cidades' id="cidades">
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Trabalha em paralelo ao curso?</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Sim'  name="trabalha">
                        <label for="radioExample3">Sim</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Nao'  name="trabalha">
                        <label for="radioExample3">Não</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12"id='div_trab' hidden>
                <div class="col-md-8 panel-title" ><h4>Há quanto tempo?</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='tempo_trabalho'>
                        <option value='vazio'></option>
                        <option value='0 a 5 meses'>0 a 5 meses</option>
                        <option value='6 meses a 2anos'>6 meses a 2 anos</option>
                        <option value='3 a 6 anos'>3 a 5 anos</option>
                        <option value='6 a 8 anos'>6 a 8 anos</option>
                        <option value='9 a 11 anos'>9 a 11 anos</option>
                        <option value='12 a 14 anos'>12 a 14 anos</option>
                        <option value='15 ou mais'>15 anos ou mais</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12" id='div_areatrab'hidden>
                <div class="col-md-6 panel-title"><h4>É em área relacionada ao seu curso de graduação?</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Sim'  name="atua_area">
                        <label for="radioExample3">Sim</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='Nao'  name="atua_area">
                        <label for="radioExample3">Não</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-8 panel-title"><h4>Tempo de dedicação aos estudos fora do horário de aula:</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='dedicacao_estudos'>
                        <option value='vazio'></option>
                        <option value='1 a 2 horas/dia'>1 a 2 horas/dia</option>
                        <option value='3 a 4 horas/dia'>3 a 4 horas/dia</option>
                        <option value='5 ou mais'>5 ou mais</option>
                        <option value='Nao dedido horas de estudo fora da instituicao de ensino'>Não dedico horas de estudo fora da instituição de ensino</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Local de estudo</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio" value='biblioteca' name="local_estudo">
                        <label for="radioExample3">Biblioteca </label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='residencia' name="local_estudo">
                        <label for="radioExample3">Residência </label>
                    </div>

                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio"value='outro'  name="local_estudo">
                        <label for="radioExample3">Outro</label>
                        <div class="col-md-8" id='div_local_estudo'hidden ><input name='local_estudo_outro' type='text' class='form-control'> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Tipo de estudo</h4></div>
                <div class="col-md-12">
                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio" value='apenas_individual' name="tipo_estudo">
                        <label for="radioExample3">Apenas individual </label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"  value='apenas_grupo' name="tipo_estudo">
                        <label for="radioExample3">Apenas em grupo </label>
                    </div>
                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio"  value='predominantemente_individual' name="tipo_estudo">
                        <label for="radioExample3">Predominantemente individual </label>
                    </div>
                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio"  value='predominantemente_grupo' name="tipo_estudo">
                        <label for="radioExample3">Predominantemente em grupo </label>
                    </div>

                    <div class="col-md-4 radio-custom radio-success">
                        <input type="radio"value='outro'  name="tipo_estudo">
                        <label for="radioExample3">Outro</label>
                        <div class="col-md-8" id='div_tipo_estudo'hidden ><input name='tipo_estudo_outro' type='text' class='form-control'> </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Pratica alguma atividade de lazer?</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Sim' name="pratica_lazer">
                        <label for="radioExample3">Sim</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Nao'  name="pratica_lazer">
                        <label for="radioExample3">Não</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12"id='div_ativlazer' hidden>
                <div class="col-md-8 panel-title"><h4>Qual?</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='atividade_lazer'>
                        <option value='vazio'></option>
                        <option value='Cinema'>Cinema</option>
                        <option value='Leitura'>Leitura</option>
                        <option value='Musica'>Música</option>
                        <option value='Teatro'>Teatro</option>
                        <option value='TV'>TV</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 panel-title"><h4>Pratica alguma atividade física?</h4></div>
                <div class="col-md-12">
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Sim'  name="pratica_fisica">
                        <label for="radioExample3">Sim</label>
                    </div>
                    <div class="col-md-2 radio-custom radio-success">
                        <input type="radio"value='Nao'  name="pratica_fisica">
                        <label for="radioExample3">Não</label>
                    </div>

                </div>
            </div>

            <div class="col-md-12"id='div_ativfisica'hidden>
                <div class="col-md-8 panel-title"><h4>Qual?</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='atividade_fisica'>
                        <option value='vazio'></option>
                        <option value='Musculacao'>Musculação</option>
                        <option value='Caminhada'>Caminhada</option>
                        <option value='Corrida'>Corrida</option>
                        <option value='Ciclismo'>Ciclismo</option>
                        <option value='Yoga'>Yoga</option>
                        <option value='Natacao'>Natação</option>
                        <option value='Artes_Marciais'>Artes Marciais</option>
                        <option value='Futebol'>Futebol</option>
                        <option value='Outro'>Outro</option>

                    </select>
                </div>
            </div>

            <div class="col-md-12"id='div_ativfisicafreq'hidden>
                <div class="col-md-8 panel-title"><h4>Com que frequência?</h4></div>
                <div class="col-md-6">
                    <select class="form-control mb-md" name='freq_atividade_fisica'>
                        <option value='vazio'></option>
                        <option value='uma vez por semana'>uma vez por semana</option>
                        <option value='duas vezes por semana'>duas vezes por semana</option>
                        <option value='três vezes por semana'>três vezes por semana</option>
                        <option value='quatro vezes por semana'>quatro vezes por semana</option>
                        <option value='mais de quatro vezes por semana'>mais de quatro vezes por semana</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <a href="javascript:void(0)" onClick="save_engagement()" class="btn-lg btn-success"style="float:right"><span class='text-bold'>Enviar</span></a>
            </div>
        </form>
    </div>
</section>

<script>
    $("input[name='escolha_curso']").change(function () {
        var $val = $(this).val();
        if ($val === 'outro') {
            $('#div_escolha_curso').show();
        } else {
            $('#div_escolha_curso').hide();

        }
    });
    $("input[name='local_estudo']").change(function () {
        var $val = $(this).val();
        if ($val === 'outro') {
            $('#div_local_estudo').show();
        } else {
            $('#div_local_estudo').hide();

        }
    });
    $("input[name='tipo_estudo']").change(function () {
        var $val = $(this).val();
        if ($val === 'outro') {
            $('#div_tipo_estudo').show();
        } else {
            $('#div_tipo_estudo').hide();

        }
    });
    $("select[name='estado_civil']").change(function () {
        var $val = $(this).val();
        if (($val === 'Casado(a)') || ($val === 'Uniao Estavel') || ($val === 'Amasiado(a)')) {
            $('#div_uniao').show();
        } else {
            $('#div_uniao').hide();
        }
    });
    $("input[name='filhos']").change(function () {
        var $val = $(this).val();
        if ($val === 'Sim') {
            $('#div_filhos').show();
            $('#div_idadefilhos').show();

        } else {
            $('#div_filhos').hide();
            $('#div_idadefilhos').hide();

        }
    });
    $("input[name='trabalha']").change(function () {
        var $val = $(this).val();
        if ($val === 'Sim') {
            $('#div_trab').show();
            $('#div_areatrab').show();

        } else {
            $('#div_trab').hide();
            $('#div_areatrab').hide();
        }
    });
    $("input[name='pratica_lazer']").change(function () {
        var $val = $(this).val();
        if ($val === 'Sim') {
            $('#div_ativlazer').show();
        } else {
            $('#div_ativlazer').hide();
        }
    });
    $("input[name='pratica_fisica']").change(function () {
        var $val = $(this).val();
        if ($val === 'Sim') {
            $('#div_ativfisica').show();
            $('#div_ativfisicafreq').show();
        } else {
            $('#div_ativfisica').hide();
            $('#div_ativfisicafreq').hide();

        }
    });
    $("select[name='reside']").change(function () {
        var $val = $(this).val();
        if ($val === 'Outros') {
            $('#div_reside').show();
        } else {
            $('#div_reside').hide();

        }
    });
    $("input[name='tipo_facul']").change(function () {
        var $val = $(this).val();
        if (($val === 'Publica')) {
            $('#div_tipopublica').show();
        } else {
            $('#div_tipopublica').hide();
        }
    });
</script>

<script>

    function save_engagement() {
        function alertasucesso() {
            var notice = new PNotify({
                title: 'Obrigado!',
                text: 'Avaliação inserida com sucesso',
                addclass: 'stack-topleft'
            });
        }
        function alertafalha(msg) {
            var notice = new PNotify({
                title: 'Atenção!',
                text: 'Preencha o campo : ' + msg,
                addclass: 'stack-topright'
            });
        }

        if (jQuery("input[name='n_vest']:checked").length === 0) {
            alertafalha('Nº de vestibulares para ingresso no atual curso');
            return false;
        }
        if (jQuery("input[name='escolha_curso']:checked").length === 0) {
            alertafalha('Assinale o que levou a escolher este curso');
            return false;
        }
        if (jQuery("input[name='escolha_curso']:checked").val() === 'outro' && jQuery("input[name='escolha_curso_outro']").val() === '') {
            alertafalha('Cite o que levou a escolher este curso');
            return false;
        }
        if (jQuery("input[name='turno']:checked").length === 0) {
            alertafalha('Turno');
            return false;
        }
        if (jQuery("select[name='periodo']").val() === 'vazio') {
            alertafalha('Período que está cursando');
            return false;
        }
        if (jQuery("input[name='idade']").val() === '') {
            alertafalha('Idade');
            return false;
        }
        if (jQuery("input[name='sexo']:checked").length === 0) {
            alertafalha('Sexo');
            return false;
        }
        if (jQuery("select[name='reside']").val() === 'vazio') {
            alertafalha('Com quem reside');
            return false;
        }
        if (jQuery("select[name='estado_civil']").val() === 'vazio') {
            alertafalha('Estado Civil');
            return false;
        }
        if ((jQuery("select[name='estado_civil']").val() === 'Casado(a)' || jQuery("select[name='estado_civil']").val() === 'Amasiado(a)' || jQuery("select[name='estado_civil']").val() === 'Uniao Estavel') && jQuery("select[name='tempo_uniao']").val() === 'vazio') {
            alertafalha('Tempo de União');
            return false;
        }
        if ((jQuery("input[name='filhos']:checked").length === 0)) {
            alertafalha('Possui filhos?');
            return false;
        }
        if ((jQuery("input[name='filhos']:checked").val() === 'Sim' && jQuery("input[name='quantidade_filhos']").val() === '')) {
            alertafalha('Quantidade de filhos');
            return false;
        }
        if (jQuery("#estados").val() === '') {
            alertafalha('Estado que reside');
            return false;
        }
        if (jQuery("input[name='trabalha']:checked").val() === 'Sim' && jQuery("select[name='tempo_trabalho']").val() === 'vazio') {
            alertafalha('Há quanto tempo trabalha');
            return false;
        }
        if (jQuery("input[name='trabalha']:checked").val() === 'Sim' && jQuery("input[name='atua_area']:checked").length === 0) {
            alertafalha('Area de trabalho é relacionada ao curso de graduação');
            return false;
        }
        if (jQuery("select[name='dedicacao_estudos']").val() === 'vazio') {
            alertafalha('Tempo de dedicação aos estudos fora da faculdade:');
            return false;
        }
        if (jQuery("input[name='pratica_lazer']:checked").length === 0) {
            alertafalha('Pratica alguma atividade de lazer?');
            return false;
        }
        if (jQuery("input[name='pratica_lazer']:checked").val() === 'Sim' && jQuery("select[name='atividade_lazer']").val() === 'vazio') {
            alertafalha('Qual atividade de lazer você pratica ');
            return false;
        }
        if (jQuery("input[name='pratica_fisica']").length === 0) {
            alertafalha('Pratica alguma atividade de física?');
            return false;
        }
        if (jQuery("input[name='pratica_lazer']:checked").val() === 'Sim' && jQuery("select[name='atividade_fisica']").val() === 'vazio') {
            alertafalha('Qual atividade física você pratica ');
            return false;
        }
        if (jQuery("input[name='pratica_lazer']:checked").val() === 'Sim' && jQuery("select[name='atividade_fisica']").val() === 'vazio' && jQuery("select[name='freq_atividade_fisica']").val() === 'vazio') {
            alertafalha('Com que frequência você pratica atividade física');
            return false;
        }
        jQuery.ajax({
            url: jQuery("body").data("baseurl") + "forms/save_engagement",
            type: "post",
            dataType: 'json',
            data: {
                reply: jQuery('#engagement').serializeArray(),
                estados: jQuery('#estados').val(),
                cidades: jQuery('#cidades').val(),
            },
            success: function (response) { //verifica a resposta que vem do controller
                if (response.status == "OK") {
                    setTimeout(alertasucesso(), 2000);
                    window.location = jQuery("body").data('baseurl') + 'home/index';
                }
            }
        });
    }
</script>