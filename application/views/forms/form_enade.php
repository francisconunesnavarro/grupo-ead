<script>
    $('.toggle-legacy-view').on('click', function (event) {
        $('html')
                .toggleClass('csstransforms generatedcontent no-csstransforms no-generatedcontent');
    });

</script>
<script src="<?= $this->config->base_url(JSPATH . 'home.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'forms/examples.wizard.js') ?>"></script>
<!--
<div class="row">
    <div class="col-xs-12">
        <section class="panel form-wizard" id="w5">
            <div class="panel-body">
                <div class="wizard-tabs hidden">
                    <ul class="wizard-steps">
                        <li class="active">
                            <a href="forms-wizard.html#etapa1_enade" data-toggle="tab"><span>1</span></a>
                        </li>
                        <li>
                            <a href='forms-wizard.html#etapa2_enade' data-toggle="tab"><span>2</span></a>
                        </li>
                        <li>
                            <a href="forms-wizard.html#etapa3_enade" data-toggle="tab"><span>3</span></a>
                        </li>
                        <li>
                            <a href="forms-wizard.html#etapa4_enade" data-toggle="tab"><span>4</span></a>
                        </li>

                    </ul>
                </div>
                <div class="progress progress-striped progress-xl m-md light">
                    <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        <span class="sr-only">10%</span>
                    </div>
                </div>

                <form class="form-horizontal" novalidate="novalidate" id='iQSocio'>
                    <div class="tab-content">
                        <div id="etapa1_enade" class="tab-pane active">
                            <p style='text-align:justify;font-family:Arial; font-size:medium'>
                                Caro (a) estudante,<br><br>
                                Este questionário constitui um instrumento importante para compor o perfil socioeconômico e acadêmico,
                                que foi baseado no ENADE. Para os alunos do último ano também oferece uma oportunidade para avaliar diversos aspectos do seu curso e formação.<br>
                                <br>
                                Sua contribuição é extremamente relevante para melhor conhecermos como se constrói a qualidade da educação superior no país.
                                As respostas às questões serão analisadas em conjunto, preservando o sigilo da identidade dos participantes.<br>
                                <br>
                                Para responder, basta clicar sobre a alternativa desejada. No final de cada página, ao pressionar um
                                dos botões “Próximo” ou “Anterior”, o sistema gravará a resposta no banco de dados, que poderá ser
                                modificado a qualquer tempo. O questionário será enviado ao banco de dados apenas quando, na última página, for
                                acionado o botão "Finalizar”, indicando o preenchimento total do questionário. 
                            </p>
                            <p style='text-align:right;font-family:Arial; font-size:medium'>Agradecemos a sua colaboração!</p>


                        </div>
                        <div id="etapa2_enade" class="tab-pane">
                            <div class="form-group">
                                
                               <div class="col-md-6"> 
                                <div class="row">
                                    <div class="col-md-12"><h5> 1. Qual o seu estado civil?<br</h5></div>
                                    <div class="col-md-12 radio-custom radio-success"> 
                                        <input type="radio" name= "estado_civil" id="iSolteiro" value="solteiro"/> 
                                        <label for="iSolteiro">a- Solteiro(a).</label>
                                    </div><br>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "estado_civil" id="iCasado" value="casado"/> 
                                        <label for="iCasado">b- Casado(a). </label>
                                    </div><br>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "estado_civil" id="iSeparado" value="separado"/> 
                                        <label for="iSeparado">c- Separado(a) judicialmente/divorciado(a). </label>
                                    </div><br>
                                    <div class="col-md-12 radio-custom radio-success"> 
                                        <input type="radio" name= "estado_civil" id="iViuvo" value="viuvo"/> 
                                        <label for="iViuvo">d- Viúvo(a). </label>
                                    </div><br>
                                    <div class="col-md-12 radio-custom radio-success"> 
                                        <input type="radio" name= "estado_civil" id="iOutro" value="outro"/> 
                                        <label for="iOutro">e- Outro. </label>
                                    </div><br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 2. Como você se considera?<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "cor" id="iBranco" value="branco"/>  
                                        <label for="iBranco">a- Branco(a).</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input class="col-md-12" type="radio" name= "" id="iNegro" value="negro"/> 
                                        <label for="iNegro">b- Negro(a).</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "cor" id="iPardo" value="pardo"/> 
                                        <label for="iPardo">c- Pardo(a)/mulato(a).</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "cor" id="iAmarelo" value="amarelo"/>
                                        <label for="iAmarelo">d- Amarelo(a) (de origem oriental).</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "cor" id="iIndigena" value="indigena"/>  
                                        <label for="iIndigena">e- Indígena ou de origem indígena.</label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 3. Qual a sua nacionalidade?<br></h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "nacionalidade" id="iBrasileira" value="brasileira"/> 
                                        <label for="iBrasileira">a- Brasileira.</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "nacionalidade" id="iNaturalizada" value="naturalizada"/>
                                        <label for="iNaturalizada">b- Brasileira naturalizada.</label><br>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "nacionalidade" id="iEstrangeira" value="estrangeira"/> 
                                        <label for="iEstrangeira">c- Estrangeira.</label><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 4. Até que etapa de escolarização seu pai concluiu?<br></h5></div>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="escolaridade_pai" id="iEPai" >
                                            <option value=" "> </option>
                                            <option  id="iNenhuma" value="nenhuma"> Nenhuma. </option>
                                            <option  id="iFund1" value="fundamental1"> Ensino fundamental: 1º ao 5º ano (1ª a 4ª série). </option>
                                            <option  id="iFund2" value="fundamental2"> Ensino fundamental: 6º ao 9º ano (5ª a 8ª série). </option>
                                            <option  id="iMedio" value="medio"> Ensino médio. </option>
                                            <option  id="iSup" value="superior"> Ensino Superior - Graduação. </option>
                                            <option  id="iPos" value="pos"> Pós-graduação. </option><br> 
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 5. Até que etapa de escolarização sua mãe concluiu?<br></h5></div> 
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="escolaridade_mae" id="iEMae">
                                            <option value=" "> </option>
                                            <option id="iNenhuma" value="nenhuma">Nenhuma. </option>
                                            <option id="iFund1" value="fundamental1">Ensino fundamental: 1º ao 5º ano (1ª a 4ª série). </option>
                                            <option id="iFund2" value="fundamental2">Ensino fundamental: 6º ao 9º ano (5ª a 8ª série). </option>
                                            <option id="iMedio" value="medio">Ensino médio. </option>
                                            <option id="iSup" value="superior">Ensino Superior - Graduação. </option>
                                            <option id="iPos" value="pos">Pós-graduação. </option>
                                            <br> </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 6. Onde e com quem você mora atualmente? <br></h5></div>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="moradia" id="iMoradia">
                                            <option value=""> </option>
                                            <option id="iSozinho" value="sozinho">Em casa ou apartamento, sozinho. </option>
                                            <option id="iParentes" value="parentes">Em casa ou apartamento, com pais e/ou parentes. </option>
                                            <option id="iConjuge" value="conjuge">Em casa ou apartamento, com cônjuge e/ou filhos. </option>
                                            <option id="iAmigos" value="amigos">Em casa ou apartamento, com outras pessoas (incluindo república) </option>
                                            <option id="iAlojamento" value="alojamento">Em alojamento universitário da própria instituição. </option>
                                            <option id="iHotel" value="hotel">Em outros tipos de habitação individual ou coletiva (hotel, hospedaria, pensão ou outro). </option>
                                            <br></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 7. Quantas pessoas da sua família moram com você?<br>Considere seus pais, irmãos, cônjuge, filhos e outros parentes que moram na mesma casa com você.<br></h5></div> 
                                    <div class="col-md-2">
                                        <select class="form-control mb-md" name="pessoas_moradia" id="iPessoasM">
                                            <option value=""> </option>
                                            <option id="i0" value="0"> Nenhuma</option>
                                            <option id="i1" value="1"> Uma</option>
                                            <option id="i2" value="2"> Duas</option>
                                            <option id="i3" value="3"> Três</option>
                                            <option id="i4" value="4"> Quatro</option>
                                            <option id="i5" value="5"> Cinco</option>
                                            <option id="i6" value="6+"> Seis</option><br>
                                            <option id="i7+" value="6+"> Sete ou mais</option><br>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 8. Qual a renda total de sua família, incluindo seus rendimentos?<br></h5></div>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="renda_salario" id="iRenda">
                                            <option value=""> </option>
                                            <option id="i1,5" value="1,5" > Até 1,5 salário mínimo (até R$ 1.086,00)</option>
                                            <option id="i1,5-3" value="1,5-3" > De 1,5 a 3 salários mínimos (R$ 1.086,01 a R$ 2.172,00)</option>
                                            <option id="i3-4,5" value="3-4,5" > De 3 a 4,5 salários mínimos (R$ 2.172,01 a R$ 3.258,00)</option>
                                            <option id="i4,5-6" value="4,5-6" > De 4,5 a 6 salários mínimos (R$ 3.258,01 a R$ 4.344,00)</option>
                                            <option id="i6-10" value="6-10" > De 6 a 10 salários mínimos (R$ 4.344,01 a R$ 7.240,00)</option>
                                            <option id="i10-30" value="10-30" > De 10 a 30 salários mínimos (R$ 7.240,01 a R$ 21.720,00)</option>
                                            <option id="i30+" value="30+" > Acima de 30 salários mínimos (mais de R$ 21.720,01)</option>
                                            <br></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 9. Qual alternativa a seguir melhor descreve sua situação financeira (incluindo bolsas)?<br></h5></div>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="situacao_financeira" id="iSitFinan">
                                            <option value=""> </option>
                                            <option id="iGov" value="fin_governo"> Não tenho renda e meus gastos são financiados por programas governamentais.</option>
                                            <option id="iFamilia" value="fin_familia"> Não tenho renda e meus gastos são financiados pela minha família ou por outras pessoas.</option>
                                            <option id="iR+família" value="renda+fin_familia"> Tenho renda, mas recebo ajuda da família ou de outras pessoas para financiar meus gastos.</option>
                                            <option id="iRenda" value="renda"> Tenho renda e não preciso de ajuda para financiar meus gastos.</option>
                                            <option id="iR-familia" value="renda-familia"> Tenho renda e contribuo com o sustento da família.</option>
                                            <option id="iSustenta" value="sustenta_familia"> Sou o principal responsável pelo sustento da família.</option>
                                            <br> </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 10. Qual alternativa a seguir melhor descreve sua situação de trabalho (exceto estágio ou bolsas)?<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "trabalho" id="iNaoTrab" value="nao_trabalho"/> 
                                        <label for="iNaoTrab">a- Não estou trabalhando. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "trabalho" id="iEventual" value="eventual"/> 
                                        <label for="iEventual">b- Trabalho eventualmente. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "trabalho" id="i20h" value="20h_sem"/> 
                                        <label for="i20h">c- Trabalho até 20 horas semanais. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "trabalho" id="i21-39h" value="21-39h_sem"/> 
                                        <label for="i21-39h">d- Trabalho de 21 a 39 horas semanais. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "trabalho" id="i40+" value="40h+"/> 
                                        <label for="i40+">e- Trabalho 40 horas semanais ou mais. </label><br/>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 11.Que tipo de bolsa de estudos ou financiamento do curso você recebeu para custear todas ou a maior parte das mensalidades? No caso de haver mais de uma opção, marcar apenas a bolsa de maior duração.<br></h5></div>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="financiamento_estudo" id="iFinanEst">
                                            <option value=""> </option>
                                            <option id="iNenhumGrat" value="nenhum_gratuito"> Nenhum, pois meu curso é gratuito.</option>
                                            <option id="iPago" value="nenhum_pago"> Nenhum, embora meu curso não seja gratuito.</option>
                                            <option id="iProUni" value="ProUni"> ProUni integral.</option>
                                            <option id="iProUniParcial" value="ProUni_parcial">  ProUni parcial, apenas.</option>
                                            <option id="iFIES" value="FIES"> FIES, apenas.</option>
                                            <option id="iProUni+FIES" value="ProUni_FIES"> ProUni Parcial e FIES.</option>
                                            <option id="iBolsa_Gov" value="bolsa_gov"> Bolsa oferecida por governo estadual, distrital ou municipal.</option>
                                            <option id="iBolsa_Inst" value="bolsa_instituicao"> Bolsa oferecida pela própria instituição.</option>
                                            <option id="iBolsa_Enti" value="bolsa_entidade"> Bolsa oferecida por outra entidade (empresa, ONG, outra).</option>
                                            <option id="iFinanInst" value="financiamento_instituicao"> Financiamento oferecido pela própria instituição.</option>
                                            <option id="iFinBanco" value="financiamento_bancario"> Financiamento bancário.</option>
                                            <br> </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 12. Ao longo da sua trajetória acadêmica, você recebeu algum tipo de auxílio permanência?<br>(No caso de haver mais de uma opção, marcar apenas a bolsa de maior duração).<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iNenhum" value="nenhum"/> 
                                        <label for="iNenhum">a- Nenhum. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iMorad" value="moradia"/> 
                                        <label for="iMorad">b- Auxílio moradia. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iAlim" value="alimentacao"/> 
                                        <label for="iAlim">c- Auxílio alimentação. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iMorad+Alim" value="moradia+alimentacao"/> 
                                        <label for="iMorad+Alim">d- Auxílio moradia e alimentação. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iPerman" value="permanencia"/> 
                                        <label for="iPerman">e- Auxílio Permanência. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "auxilio" id="iOutroAux" value="outro"/> 
                                        <label for="iOutroAux">f- Outro tipo de auxílio. </label><br/>
                                    </div>
                                </div>     
                                <div class="row">
                                    <div class="col-md-12"><h5> 13. Ao longo da sua trajetória acadêmica, você recebeu algum tipo de bolsa acadêmica? <br>(No caso de haver mais de uma opção, marcar apenas a bolsa de maior duração). <br></h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iNenhumaBolsa" value="nenhum"/> 
                                        <label for="iNenhumaBolsa"> a- Nenhum. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iIC" value="IC"/> 
                                        <label for="iIC"> b- Bolsa de iniciação científica. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iExtensao" value="extensao"/> 
                                        <label for="iExtensao"> c- Bolsa de extensão. </label> <br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iMonitoria" value="monitoria"/> 
                                        <label for="iMonitoria"> d- Bolsa de monitoria/tutoria. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iPET" value="PET"/> 
                                        <label for="iPET"> e- Bolsa PET. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "bolsa" id="iOutraBolsa" value="outro"/> 
                                        <label for="iOutraBolsa"> f- Outro tipo de bolsa acadêmica. </label><br/>
                                    </div>
                                </div>   
                                
                               </div>
                                <div class="col-md-6">
                                
                                <div class="row">
                                    <div class="col-md-12"><h5> 14. Durante o curso de graduação você participou de programas e/ou atividades curriculares no exterior?<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iNPart" value="nao"/> 
                                        <label for="iNPart"> a- Não participei. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iCsF" value="CsF"/> 
                                        <label for="iCsF"> b- Sim, Programa Ciência sem Fronteiras. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iIntercFed" value="intercambio_federal"/> 
                                        <label for="iIntercFed"> c- Sim, programa de intercâmbio financiado pelo Governo Federal (Marca; Brafitec; PLI; outro). </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iIntercEst" value="intercambio_estadual"/> 
                                        <label for="iIntercEst"> d- Sim, programa de intercâmbio financiado pelo Governo Estadual. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iIntercInst" value="intercambio_instituicao"/> 
                                        <label for="iIntercInst"> e- Sim, programa de intercâmbio da minha instituição. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "atividade_exterior" id="iOutroInterc" value="outro"/> 
                                        <label for="iOutroInterc"> f- Sim, outro intercâmbio não institucional. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 15.  Seu ingresso no curso de graduação se deu por meio de políticas de ação afirmativa ou inclusão social?<br></h5></div>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="inclusao_social" id="iIncluSocial"> 
                                            <option value=""> </option>
                                            <option id="iNInclu" value="sem_inclusao">Não</option> 
                                            <option id="iEtnia" value="etnico_racial">Sim, por critério étnico-racial</option> 
                                            <option id="iRendaInclu" value="por_renda">Sim, por critério de renda.</option> 
                                            <option id="iEstudoInclu" value="escolapub_bolsa"> Sim, por ter estudado em escola pública ou particular com bolsa de estudos.</option> 
                                            <option id="iCombinacao" value="dois_mais_anteriores">Sim, por sistema que combina dois ou mais critérios anteriores.</option> 
                                            <option id="iDiferente" value="inclusao_diferente">Sim, por sistema diferente dos anteriores.</option><br>
                                        </select>
                                    </div>
                                </div>                     
                                <div class="row">
                                    <div class="col-md-12"><h5> 16. Em que unidade da Federação você concluiu o ensino médio?<br></h5></div>
                                    <div class="col-md-4">
                                        <select class="form-control mb-md" name="estado_ensino_medio" id="iEstadoEns"> 
                                            <option value=""> </option>
                                            <option id="iAC" value="ac">Acre</option> 
                                            <option id="iAL" value="al">Alagoas</option> 
                                            <option id="iAM" value="am">Amazonas</option> 
                                            <option id="iAP" value="ap">Amapá</option> 
                                            <option id="iBA" value="ba">Bahia</option> 
                                            <option id="iCE" value="ce">Ceará</option> 
                                            <option id="iDF" value="df">Distrito Federal</option> 
                                            <option id="iES" value="es">Espírito Santo</option> 
                                            <option id="iGO" value="go">Goiás</option> 
                                            <option id="iMA" value="ma">Maranhão</option> 
                                            <option id="iMT" value="mt">Mato Grosso</option> 
                                            <option id="iMS" value="ms">Mato Grosso do Sul</option> 
                                            <option id="iMG" value="mg">Minas Gerais</option> 
                                            <option id="iPA" value="pa">Pará</option> 
                                            <option id="iPB" value="pb">Paraíba</option> 
                                            <option id="iPR" value="pr">Paraná</option> 
                                            <option id="iPE" value="pe">Pernambuco</option> 
                                            <option id="iPI" value="pi">Piauí</option> 
                                            <option id="iRJ" value="rj">Rio de Janeiro</option> 
                                            <option id="iRN" value="rn">Rio Grande do Norte</option> 
                                            <option id="iRO" value="ro">Rondônia</option> 
                                            <option id="iRS" value="rs">Rio Grande do Sul</option> 
                                            <option id="iRR" value="rr">Roraima</option> 
                                            <option id="iSC" value="sc">Santa Catarina</option> 
                                            <option id="iSE" value="se">Sergipe</option> 
                                            <option id="iSP" value="sp">São Paulo</option> 
                                            <option id="iTO" value="to">Tocantins</option>
                                            <option id="iNaoAplica" value="nao_se_aplica">Não se aplica</option><br> 
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 17. Em que tipo de escola você cursou o ensino médio?<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "ensino_medio" id="iPub" value="publica"/> 
                                        <label for="iPub">a- Todo em escola pública. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success"> 
                                        <input type="radio" name= "ensino_medio" id="iPriv" value="privada"/> 
                                        <label for="iPriv">b- Todo em escola privada (particular). </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "ensino_medio" id="iExt" value="exterior"/> 
                                        <label for="iExt">c- Todo no exterior. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "ensino_medio" id="iPub+" value="parte_publica+"/> 
                                        <label for="iPub+">d- A maior parte em escola pública. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "ensino_medio" id="iPriv+" value="parte_privada+"/> 
                                        <label for="iPriv+">e- A maior parte em escola privada (particular). </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "ensino_medio" id="iBr+Ext" value="brasil+exterior"/> 
                                        <label for="iBr+Ext">f- Parte no Brasil e parte no exterior. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 18. Qual modalidade de ensino médio você concluiu?<br> </h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "modalidade_ensino_medio" id="iTrad" value="tradicional"/> 
                                        <label for="iTrad"> a- Ensino médio tradicional. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "modalidade_ensino_medio" id="iTec" value="tecnico"/> 
                                        <label for="iTec"> b- Profissionalizante técnico.  (eletrônica, contabilidade, agrícola, outro).</label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "modalidade_ensino_medio" id="iMagist" value="magistério"/> 
                                        <label for="iMagist"> c- Profissionalizante magistério (Curso Normal). </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "modalidade_ensino_medio" id="iEJA" value="EJA"/> 
                                        <label for="iEJA"> d- Educação de Jovens e Adultos (EJA) e/ou Supletivo. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "modalidade_ensino_medio" id="iOutra" value="outra"/> 
                                        <label for="iOutra"> e- Outra modalidade. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 19. Quem lhe deu maior incentivo para cursar a graduação?<br></h5></div>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="incentivador" id="iIncentivador">
                                            <option value=""> </option>
                                            <option value="ninguem">a- Ninguém. </option>
                                            <option value="pais">b- Pais. </option>
                                            <option value="familia">c- Outros membros da família que não os pais. </option>
                                            <option value="professores">d- Professores. </option>
                                            <option value="lider">e- Líder ou representante religioso. </option>
                                            <option value="amigos">f- Colegas/Amigos. </option>
                                            <option value="outro">g- Outras pessoas. </option><br> 
                                        </select>
                                    </div>
                                </div>              
                                <div class="row">
                                    <div class="col-md-12"><h5> 20. Algum dos grupos abaixo foi determinante para você enfrentar dificuldades durante seu curso superior?<br></h5></div>
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" name="grupo_dificuldades" id="iGrupoDific">
                                            <option value=""> </option>
                                            <option id="iNTive" value="nao_tive">a- Não tive dificuldade.</option>
                                            <option id="iNRecebi" value="nao_recebi_apoio"> Não recebi apoio para enfrentar dificuldades.</option>
                                            <option id="iApoioPais" value="pais"> Pais. </option>
                                            <option id="iApoioAvos" value="avos"> Avós. </option>
                                            <option id="iApoioFamilia" value="familia"> Irmãos, primos ou tios.</option>
                                            <option id="iApoioLider" value="lider"> Líder ou representante religioso.</option>
                                            <option id="iApoioAmigos" value="amigos"> Colegas de curso ou amigos.</option>
                                            <option id="iApoioDocente" value="docente"> Professores do curso. </option>
                                            <option id="iApoioProfi" value="profissionais"> Profissionais do serviço de apoio ao estudante da IES.</option>
                                            <option id="iApoioTrab" value="trabalho"> Colegas de trabalho.</option>
                                            <option id="iApoioOutro" value="outro"> Outro grupo. </option>
                                            <br> </select>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12"><h5> 21. Alguém em sua família concluiu um curso superior?<br></h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "familia_concluiu_superior" id="iSim" value="sim"/> 
                                        <label for="iSim">a- Sim. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "familia_concluiu_superior" id="iNao" value="nao"/> 
                                        <label for="iNao"> b- Não. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 22. Excetuando-se os livros indicados na bibliografia do seu curso, quantos livros você leu neste ano?<br> </h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "livro_ano" id="iZero" value="0"/> 
                                        <label for="iZero"> a- Nenhum. </label> <br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "livro_ano" id="i1-2" value="1-2"/> 
                                        <label for="i1-2"> b- Um ou dois. </label> <br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "livro_ano" id="i3-5" value="3-5"/> 
                                        <label for="i3-5"> c- De três a cinco. </label> <br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "livro_ano" id="i6-8" value="6-8"/> 
                                        <label for="i6-8"> d- De seis a oito. </label> <br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "livro_ano" id="i8+" value="8+"/> 
                                        <label for="i8+"> e- Mais de oito. </label> <br/>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12"><h5> 23. Quantas horas por semana, aproximadamente, você dedicou aos estudos, excetuando as horas de aula?<br></h5></div> 
                                    <div class="col-md-12 radio-custom radio-custom radio-success">
                                        <input type="radio" name= "hrs_semanais_estudo" id="iZeroHrs" value="0"/> 
                                        <label for="iZeroHrs" >a- Nenhuma, apenas assisto às aulas. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "hrs_semanais_estudo" id="i1-3hrs" value="1-3"/> 
                                        <label for="i1-3hrs" >b- De uma a três. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "hrs_semanais_estudo" id="i4-7hrs" value="4-7"/> 
                                        <label for="i4-7hrs" >c- De quatro a sete. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "hrs_semanais_estudo" id="i8-12hrs" value="8-12"/> 
                                        <label for="i8-12hrs" >d- De oito a doze. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "hrs_semanais_estudo" id="i12+hrs" value="12+"/> 
                                        <label for="i12+hrs" >e- Mais de doze. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 24. Você teve oportunidade de aprendizado de idioma estrangeiro na Instituição? <br> </h5></div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "aprendizado_idiomas" id="iIdiomaPresencial" value="presencial"/> 
                                        <label for="iIdiomaPresencial"> a- Sim, somente na modalidade presencial. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "aprendizado_idiomas" id="iIdiomaSemi" value="semipresencial"/> 
                                        <label for="iIdiomaSemi"> b- Sim, somente na modalidade semipresencial. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "aprendizado_idiomas" id="iIdiomaSemi+Pres" value="presencial+semi"/> 
                                        <label for="iIdiomaSemi+Pres"> c- Sim, parte na modalidade presencial e parte na modalidade semipresencial. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "aprendizado_idiomas" id="iIdiomaEAD" value="ead"/> 
                                        <label for="iIdiomaEAD"> d- Sim, na modalidade à distância. </label><br/>
                                    </div>
                                    <div class="col-md-12 radio-custom radio-success">
                                        <input type="radio" name= "aprendizado_idiomas" id="iNaoAprendeuIdioma" value="nao"/> 
                                        <label for="iNaoAprendeuIdioma"> e- Não. </label><br/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 25. Qual o principal motivo para você ter escolhido este curso? <br></h5></div>
                                    <div class="col-md-4">
                                        <select class="form-control mb-md" name="escolha_curso" id="iEscolhaCurso">
                                            <option value=""> </option>
                                            <option id="iMercado" value="mercado"> Inserção no mercado de trabalho.</option>
                                            <option id="iInflFamilia" value="familia"> Influência familiar.</option>
                                            <option id="iValorizacao" value="valorizacao"> Valorização profissional.</option>
                                            <option id="iPrestigio" value="prestigio"> Prestígio Social.</option>
                                            <option id="iVocacao" value="vocacao"> Vocação.</option>
                                            <option id="iEad" value="ead"> Oferecido na modalidade à distância.</option>
                                            <option id="iBaixaConcorrencia" value="baixa_concorrencia"> Baixa concorrência para ingresso.</option>
                                            <option id="iOutroMotivo" value="outro"> Outro motivo.</option>
                                            <br> </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><h5> 26. Qual a principal razão para você ter escolhido a sua instituição de educação superior?<br></h5></div>
                                    <div class="col-md-4">
                                        <select class="form-control mb-md" name="escolha_instituicao" id="iEscolhaInstituicao">
                                            <option value=""> </option>
                                            <option id="iGratuito" value="gratuidade"> Gratuidade.</option>
                                            <option id="iPreco" value="preco"> Preço da mensalidade.</option>
                                            <option id="iProximidadeRes" value="proximidade_residencia"> Proximidade da minha residência.</option>
                                            <option id="iProximidadeTrab" value="proximidade_trabalho"> Proximidade do meu trabalho.</option>
                                            <option id="iFacilAcesso" value="facilidade_acesso"> Facilidade de acesso.</option>
                                            <option id="iQualidade" value="qualidade"> Qualidade/reputação.</option>
                                            <option id="iUnica" value="unica"> Foi a única onde tive aprovação.</option>
                                            <option id="iPossBolsa" value="possibilidade_bolsa"> Possibilidade de ter bolsa de estudo.</option>
                                            <option id="iOutraRazao" value="outra"> Outra razão.</option>
                                            <br> </select>
                                    </div>
                                </div>                           
                                </div>
                            
                            </div>
                        </div>
                        
                        <div id="etapa3_enade" class="tab-pane">
                            <h3 class ='panel-title'style="text-align: center;"><strong>Organização Didático-Pedagógica</strong></h3>
                            <p class="panel-body"style='text-align:justify;font-family:Arial; font-size:medium'> A seguir, leia cuidadosamente cada assertiva e indique seu 
                                grau de concordância com cada uma delas, segundo a escala que varia de 1 
                                (discordância total) a 6 (concordância total).
                                <br>Caso você julgue não ter elementos para avaliar a assertiva, assinale a opção 
                                <b>“Não sei responder”</b> e, quando considerar não pertinente ao seu curso, assinale
                                <b>“Não se aplica”</b>.<br><br><br></p>
                            <table class="table table-bordered table-striped mb-none">
                                <thead>
                                    <tr class='content_row' style='text-align: center;' >
                                        <th>Discordo totalmente</th>
                                        <th></th>
                                        <th></th> 
                                        <th></th>
                                        <th></th> 
                                        <th></th>
                                        <th>Concordo Totalmente</th>
                                        <th>Não sei responder</th>
                                        <th>Não se aplica</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="content_row"style='text-align: center;background-color:whitesmoke;'>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>                 
                                        <td>5</td>                 
                                        <td>6</td> 
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                            <div class="col-md-12">  
                                <div class="row">
                                    <label><strong>27. As disciplinas cursadas contribuíram para sua formação integral, como cidadão e profissional.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag27"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag27"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag27"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag27"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag27"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag27"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag27"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag27"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag27"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>28. Os conteúdos abordados nas disciplinas do curso favoreceram sua atuação em estágios ou em atividades de iniciação profissional.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag28"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag28"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag28"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag28"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag28"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag28"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag28"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag28"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag28"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>29. As metodologias de ensino utilizadas no curso desafiaram você a aprofundar conhecimentos e desenvolver competências reflexivas e críticas.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag29"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag29"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag29"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag29"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag29"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag29"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag29"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag29"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag29"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>30. O curso propiciou experiências de aprendizagem inovadoras.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag30"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag30"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag30"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag30"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag30"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag30"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag30"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag30"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag30"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div> 
                                <div class="row">
                                    <label><strong>31. O curso contribuiu para o desenvolvimento da sua consciência ética para o exercício profissional.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag31"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag31"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag31"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag31"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag31"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag31"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag31"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag31"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag31"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>32. No curso você teve oportunidade de aprender a trabalhar em equipe.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag32"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag32"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag32"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag32"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag32"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag32"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag32"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag32"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag32"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>33. O curso possibilitou aumentar sua capacidade de reflexão e argumentação.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag33"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag33"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag33"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag33"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag33"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag33"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag33"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag33"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag33"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>34. O curso promoveu o desenvolvimento da sua capacidade de pensar criticamente, analisar e refletir sobre soluções para problemas da sociedade.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag34"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag34"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag34"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag34"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag34"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag34"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag34"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag34"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag34"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>35. O curso contribuiu para você ampliar sua capacidade de comunicação nas formas oral e escrita.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag35"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag35"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag35"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag35"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag35"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag35"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag35"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag35"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag35"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>  
                                <div class="row">
                                    <label><strong>36. O curso contribuiu para o desenvolvimento da sua capacidade de aprender e atualizar-se permanentemente.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag36"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag36"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag36"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag36"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag36"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag36"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag36"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag36"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag36"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>37. As relações professor-aluno ao longo do curso estimularam você a estudar e aprender.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag37"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag37"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag37"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag37"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag37"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag37"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag37"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag37"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag37"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>     
                                <div class="row">
                                    <label><strong>38. Os planos de ensino apresentados pelos professores contribuíram para o desenvolvimento das atividades acadêmicas e para seus estudos.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag38"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag38"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag38"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag38"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag38"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag38"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag38"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag38"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag38"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>39. As referências bibliográficas indicadas pelos professores nos planos de ensino contribuíram para seus estudos e aprendizagens.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag39"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag39"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag39"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag39"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag39"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag39"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag39"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag39"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag39"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>40. Foram oferecidas oportunidades para os estudantes superarem dificuldades relacionadas ao processo de formação.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag40"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag40"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag40">
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag40">
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag40">
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag40"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag40">
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag40">
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag40">
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>41. A coordenação do curso esteve disponível para orientação acadêmica dos estudantes.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag41"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag41"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag41"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag41"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag41"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag41"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag41"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag41"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag41"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div> 
                                <div class="row">
                                    <label><strong>42. O curso exigiu de você organização e dedicação frequente aos estudos.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag42"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag42"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag42"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag42"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag42"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag42"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag42"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag42"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag42"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>  
                                <div class="row">
                                    <label><strong>43. Foram oferecidas oportunidades para os estudantes participarem de programas, projetos ou atividades de extensão universitária.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag43"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag43"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag43"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag43"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag43"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag43"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag43"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag43"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag43"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>44. Foram oferecidas oportunidades para os estudantes participarem de projetos de iniciação científica e de atividades que estimularam a investigação acadêmica.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag44"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag44"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag44"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag44"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag44"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag44"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag44"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag44"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag44"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                                <div class="row">
                                    <label><strong>45. O curso ofereceu condições para os estudantes participarem de eventos internos e/ou externos à instituição.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag45"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag45"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag45"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag45"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag45"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag45"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag45"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag45"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag45"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div> 
                                <div class="row">
                                    <label><strong>46. A instituição ofereceu oportunidades para os estudantes atuarem como representantes em órgãos colegiados.</strong></label><br>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="0" type="radio" name="didatico-pedag46"> 
                                        <label>0</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">                            
                                        <input value="1" type="radio" name="didatico-pedag46"> 
                                        <label>1</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="2" type="radio" name="didatico-pedag46"> 
                                        <label>2</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="3"type="radio" name="didatico-pedag46"> 
                                        <label>3</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="4" type="radio" name="didatico-pedag46"> 
                                        <label>4</label>
                                    </div>
                                    <div class="col-md-1 radio-custom radio-success">
                                        <input value="5" type="radio" name="didatico-pedag46"> 
                                        <label>5</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="6" type="radio" name="didatico-pedag46"> 
                                        <label>6</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao sei responder" type="radio" name="didatico-pedag46"> 
                                        <label>Não sei responder</label>
                                    </div>
                                    <div class="col-md-2 radio-custom radio-success">
                                        <input value="nao se aplica" type="radio" name="didatico-pedag46"> 
                                        <label>Não se aplica</label>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        
                        <div id="etapa4_enade" class="tab-pane">

                            <div class="row">
                                <label><strong>47. O curso favoreceu a articulação do conhecimento teórico com atividades práticas.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag47"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag47"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag47"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag47"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag47"> 
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag47"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag47"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag47"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag47"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>48. As atividades práticas foram suficientes para relacionar os conteúdos do curso com a prática, contribuindo para sua formação profissional.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag48"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag48"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag48"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag48"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag48"> 
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag48"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag48"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag48"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag48"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>49. O curso propiciou acesso a conhecimentos atualizados e/ou contemporâneos em sua área de formação.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag49"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag49"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag49"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag49"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag49"> 
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag49"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag49"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag49"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag49"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>50. O estágio supervisionado proporcionou experiências diversificadas para a sua formação.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag50"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag50"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag50"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag50"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag50">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag50"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag50"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag50"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag50"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>

                            <div class="row">
                                <label><strong>51. As atividades realizadas durante seu trabalho de conclusão de curso contribuíram para qualificar sua formação profissional.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag51"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag51"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag51"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag51"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag51">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag51"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag51"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag51"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag51"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>52. Foram oferecidas oportunidades para os estudantes realizarem intercâmbios e/ou estágios no país.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag52"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag52"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag52"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag52"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag52">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag52"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag52"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag52"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag52"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>53. Foram oferecidas oportunidades para os estudantes realizarem intercâmbios e/ou estágios fora do país.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag53"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag53"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag53"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag53"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag53">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag53"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag53"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag53"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag53"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>                            
                            <div class="row">
                                <label><strong>54. Os estudantes participaram de avaliações periódicas do curso (disciplinas, atuação dos professores, infraestrutura).</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag54"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag54"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag54"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag54"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag54">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag54"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag54"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag54"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag54"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>55. As avaliações da aprendizagem realizadas durante o curso foram compatíveis com os conteúdos ou temas trabalhados pelos professores.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag55"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag55"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag55"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag55"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag55">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag55"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag55"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag55"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag55"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>56. Os professores apresentaram disponibilidade para atender os estudantes fora do horário das aulas.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag56"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag56"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag56"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag56"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag56">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag56"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag56"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag56"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag56"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>57. Os professores demonstraram domínio dos conteúdos abordados nas disciplinas.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag57"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag57"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag57"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag57"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag57">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag57"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag57"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag57"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag57"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>58. Os professores utilizaram tecnologias da informação e comunicação (TICs) como estratégia de ensino (projetor multimídia, laboratório de informática, ambiente virtual de aprendizagem).</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag58"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag58"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag58"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag58"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag58">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag58"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag58"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag58"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag58"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>59. A instituição dispôs de quantidade suficiente de funcionários para o apoio administrativo e acadêmico.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag59"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag59"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag59"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag59"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag59">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag59"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag59"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag59"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag59"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>60. O curso disponibilizou monitores ou tutores para auxiliar os estudantes.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag60"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag60"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag60"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag60"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag60">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag60"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag60"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag60"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag60"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>61. As condições de infraestrutura das salas de aula foram adequadas.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag61"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag61"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag61"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag61"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag61">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag61"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag61"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag61"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag61"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div> 
                            <div class="row">
                                <label><strong>62. Os equipamentos e materiais disponíveis para as aulas práticas foram adequados para a quantidade de estudantes.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag62"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag62"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag62"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag62"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag62">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag62"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag62"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag62"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag62"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>63. Os ambientes e equipamentos destinados às aulas práticas foram adequados ao curso.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag63"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag63"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag63"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag63"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag63">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag63"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag63"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag63"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag63"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>64. A biblioteca dispôs das referências bibliográficas que os estudantes necessitaram.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag64"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag64"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag64"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag64"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag64">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag64"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag64"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag64"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag64"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>65. A instituição contou com biblioteca virtual ou conferiu acesso a obras disponíveis em acervos virtuais.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag65"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag65"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag65"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag65"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag65">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag65"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag65"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag65"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag65"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>66. As atividades acadêmicas desenvolvidas dentro e fora da sala de aula possibilitaram reflexão, convivência e respeito à diversidade.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag66"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag66"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag66"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag66"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag66">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag66"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag66"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag66"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag66"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div> 
                            <div class="row">
                                <label><strong>67. A instituição promoveu atividades de cultura, de lazer e de interação social.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag67"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag67"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag67"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag67"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag67">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag67"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag67"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag67"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag67"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>
                            <div class="row">
                                <label><strong>68. A instituição dispôs de refeitório, cantina e banheiros em condições adequadas que atenderam as necessidades dos seus usuários.</strong></label><br>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="0" type="radio" name="didatico-pedag68"> 
                                    <label>0</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">                            
                                    <input value="1" type="radio" name="didatico-pedag68"> 
                                    <label>1</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="2" type="radio" name="didatico-pedag68"> 
                                    <label>2</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="3"type="radio" name="didatico-pedag68"> 
                                    <label>3</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="4" type="radio" name="didatico-pedag68">  
                                    <label>4</label>
                                </div>
                                <div class="col-md-1 radio-custom radio-success">
                                    <input value="5" type="radio" name="didatico-pedag68"> 
                                    <label>5</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="6" type="radio" name="didatico-pedag68"> 
                                    <label>6</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao sei responder" type="radio" name="didatico-pedag68"> 
                                    <label>Não sei responder</label>
                                </div>
                                <div class="col-md-2 radio-custom radio-success">
                                    <input value="nao se aplica" type="radio" name="didatico-pedag68"> 
                                    <label>Não se aplica</label>
                                </div>                                        
                            </div>                            
                        </div>

                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <ul class="pager">
                    <li class="previous disabled">
                        <a><i class="fa fa-angle-left"></i> Voltar</a>
                    </li>
                    <li class="finish hidden pull-right">
                        <a href="javascript:void(0)" onclick="save_enade()"><?= lang('save') ?></a>
                    </li>
                    <li class="next">
                        <a>Próximo <i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>-->

<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue" id="form_wizard_1">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> Form Wizard - <span class="step-title">
									Step 1 of 4 </span>
								</div>
								<div class="tools hidden-xs">
									<a href="javascript:;" class="collapse">
									</a>
									<a href="form_wizard.html#portlet-config" data-toggle="modal" class="config">
									</a>
									<a href="javascript:;" class="reload">
									</a>
									<a href="javascript:;" class="remove">
									</a>
								</div>
							</div>
							<div class="portlet-body form">
								<form action="form_wizard.html#" class="form-horizontal" id="submit_form" method="POST">
									<div class="form-wizard">
										<div class="form-body">
											<ul class="nav nav-pills nav-justified steps">
												<li>
													<a href="form_wizard.html#tab1" data-toggle="tab" class="step">
													<span class="number">
													1 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Account Setup </span>
													</a>
												</li>
												<li>
													<a href="form_wizard.html#tab2" data-toggle="tab" class="step">
													<span class="number">
													2 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Profile Setup </span>
													</a>
												</li>
												<li>
													<a href="form_wizard.html#tab3" data-toggle="tab" class="step active">
													<span class="number">
													3 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Billing Setup </span>
													</a>
												</li>
												<li>
													<a href="form_wizard.html#tab4" data-toggle="tab" class="step">
													<span class="number">
													4 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Confirm </span>
													</a>
												</li>
											</ul>
											<div id="bar" class="progress progress-striped" role="progressbar">
												<div class="progress-bar progress-bar-success">
												</div>
											</div>
											<div class="tab-content">
												<div class="alert alert-danger display-none">
													<button class="close" data-dismiss="alert"></button>
													You have some form errors. Please check below.
												</div>
												<div class="alert alert-success display-none">
													<button class="close" data-dismiss="alert"></button>
													Your form validation is successful!
												</div>
												<div class="tab-pane active" id="tab1">
													<h3 class="block">Provide your account details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">Username <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="username"/>
															<span class="help-block">
															Provide your username </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Password <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="password" class="form-control" name="password" id="submit_form_password"/>
															<span class="help-block">
															Provide your password. </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Confirm Password <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="password" class="form-control" name="rpassword"/>
															<span class="help-block">
															Confirm your password </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Email <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="email"/>
															<span class="help-block">
															Provide your email address </span>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab2">
													<h3 class="block">Provide your profile details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">Fullname <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="fullname"/>
															<span class="help-block">
															Provide your fullname </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Phone Number <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="phone"/>
															<span class="help-block">
															Provide your phone number </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Gender <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<div class="radio-list">
																<label>
																<input type="radio" name="gender" value="M" data-title="Male"/>
																Male </label>
																<label>
																<input type="radio" name="gender" value="F" data-title="Female"/>
																Female </label>
															</div>
															<div id="form_gender_error">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Address <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="address"/>
															<span class="help-block">
															Provide your street address </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">City/Town <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="city"/>
															<span class="help-block">
															Provide your city or town </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Country</label>
														<div class="col-md-4">
															<select name="country" id="country_list" class="form-control">
																<option value=""></option>
																<option value="AF">Afghanistan</option>
																<option value="AL">Albania</option>
																<option value="DZ">Algeria</option>
																<option value="AS">American Samoa</option>
																<option value="AD">Andorra</option>
																<option value="AO">Angola</option>
																<option value="AI">Anguilla</option>
																<option value="AR">Argentina</option>
																<option value="AM">Armenia</option>
																<option value="AW">Aruba</option>
																<option value="AU">Australia</option>
																<option value="AT">Austria</option>
																<option value="AZ">Azerbaijan</option>
																<option value="BS">Bahamas</option>
																<option value="BH">Bahrain</option>
																<option value="BD">Bangladesh</option>
																<option value="BB">Barbados</option>
																<option value="BY">Belarus</option>
																<option value="BE">Belgium</option>
																<option value="BZ">Belize</option>
																<option value="BJ">Benin</option>
																<option value="BM">Bermuda</option>
																<option value="BT">Bhutan</option>
																<option value="BO">Bolivia</option>
																<option value="BA">Bosnia and Herzegowina</option>
																<option value="BW">Botswana</option>
																<option value="BV">Bouvet Island</option>
																<option value="BR">Brazil</option>
																<option value="IO">British Indian Ocean Territory</option>
																<option value="BN">Brunei Darussalam</option>
																<option value="BG">Bulgaria</option>
																<option value="BF">Burkina Faso</option>
																<option value="BI">Burundi</option>
																<option value="KH">Cambodia</option>
																<option value="CM">Cameroon</option>
																<option value="CA">Canada</option>
																<option value="CV">Cape Verde</option>
																<option value="KY">Cayman Islands</option>
																<option value="CF">Central African Republic</option>
																<option value="TD">Chad</option>
																<option value="CL">Chile</option>
																<option value="CN">China</option>
																<option value="CX">Christmas Island</option>
																<option value="CC">Cocos (Keeling) Islands</option>
																<option value="CO">Colombia</option>
																<option value="KM">Comoros</option>
																<option value="CG">Congo</option>
																<option value="CD">Congo, the Democratic Republic of the</option>
																<option value="CK">Cook Islands</option>
																<option value="CR">Costa Rica</option>
																<option value="CI">Cote d'Ivoire</option>
																<option value="HR">Croatia (Hrvatska)</option>
																<option value="CU">Cuba</option>
																<option value="CY">Cyprus</option>
																<option value="CZ">Czech Republic</option>
																<option value="DK">Denmark</option>
																<option value="DJ">Djibouti</option>
																<option value="DM">Dominica</option>
																<option value="DO">Dominican Republic</option>
																<option value="EC">Ecuador</option>
																<option value="EG">Egypt</option>
																<option value="SV">El Salvador</option>
																<option value="GQ">Equatorial Guinea</option>
																<option value="ER">Eritrea</option>
																<option value="EE">Estonia</option>
																<option value="ET">Ethiopia</option>
																<option value="FK">Falkland Islands (Malvinas)</option>
																<option value="FO">Faroe Islands</option>
																<option value="FJ">Fiji</option>
																<option value="FI">Finland</option>
																<option value="FR">France</option>
																<option value="GF">French Guiana</option>
																<option value="PF">French Polynesia</option>
																<option value="TF">French Southern Territories</option>
																<option value="GA">Gabon</option>
																<option value="GM">Gambia</option>
																<option value="GE">Georgia</option>
																<option value="DE">Germany</option>
																<option value="GH">Ghana</option>
																<option value="GI">Gibraltar</option>
																<option value="GR">Greece</option>
																<option value="GL">Greenland</option>
																<option value="GD">Grenada</option>
																<option value="GP">Guadeloupe</option>
																<option value="GU">Guam</option>
																<option value="GT">Guatemala</option>
																<option value="GN">Guinea</option>
																<option value="GW">Guinea-Bissau</option>
																<option value="GY">Guyana</option>
																<option value="HT">Haiti</option>
																<option value="HM">Heard and Mc Donald Islands</option>
																<option value="VA">Holy See (Vatican City State)</option>
																<option value="HN">Honduras</option>
																<option value="HK">Hong Kong</option>
																<option value="HU">Hungary</option>
																<option value="IS">Iceland</option>
																<option value="IN">India</option>
																<option value="ID">Indonesia</option>
																<option value="IR">Iran (Islamic Republic of)</option>
																<option value="IQ">Iraq</option>
																<option value="IE">Ireland</option>
																<option value="IL">Israel</option>
																<option value="IT">Italy</option>
																<option value="JM">Jamaica</option>
																<option value="JP">Japan</option>
																<option value="JO">Jordan</option>
																<option value="KZ">Kazakhstan</option>
																<option value="KE">Kenya</option>
																<option value="KI">Kiribati</option>
																<option value="KP">Korea, Democratic People's Republic of</option>
																<option value="KR">Korea, Republic of</option>
																<option value="KW">Kuwait</option>
																<option value="KG">Kyrgyzstan</option>
																<option value="LA">Lao People's Democratic Republic</option>
																<option value="LV">Latvia</option>
																<option value="LB">Lebanon</option>
																<option value="LS">Lesotho</option>
																<option value="LR">Liberia</option>
																<option value="LY">Libyan Arab Jamahiriya</option>
																<option value="LI">Liechtenstein</option>
																<option value="LT">Lithuania</option>
																<option value="LU">Luxembourg</option>
																<option value="MO">Macau</option>
																<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
																<option value="MG">Madagascar</option>
																<option value="MW">Malawi</option>
																<option value="MY">Malaysia</option>
																<option value="MV">Maldives</option>
																<option value="ML">Mali</option>
																<option value="MT">Malta</option>
																<option value="MH">Marshall Islands</option>
																<option value="MQ">Martinique</option>
																<option value="MR">Mauritania</option>
																<option value="MU">Mauritius</option>
																<option value="YT">Mayotte</option>
																<option value="MX">Mexico</option>
																<option value="FM">Micronesia, Federated States of</option>
																<option value="MD">Moldova, Republic of</option>
																<option value="MC">Monaco</option>
																<option value="MN">Mongolia</option>
																<option value="MS">Montserrat</option>
																<option value="MA">Morocco</option>
																<option value="MZ">Mozambique</option>
																<option value="MM">Myanmar</option>
																<option value="NA">Namibia</option>
																<option value="NR">Nauru</option>
																<option value="NP">Nepal</option>
																<option value="NL">Netherlands</option>
																<option value="AN">Netherlands Antilles</option>
																<option value="NC">New Caledonia</option>
																<option value="NZ">New Zealand</option>
																<option value="NI">Nicaragua</option>
																<option value="NE">Niger</option>
																<option value="NG">Nigeria</option>
																<option value="NU">Niue</option>
																<option value="NF">Norfolk Island</option>
																<option value="MP">Northern Mariana Islands</option>
																<option value="NO">Norway</option>
																<option value="OM">Oman</option>
																<option value="PK">Pakistan</option>
																<option value="PW">Palau</option>
																<option value="PA">Panama</option>
																<option value="PG">Papua New Guinea</option>
																<option value="PY">Paraguay</option>
																<option value="PE">Peru</option>
																<option value="PH">Philippines</option>
																<option value="PN">Pitcairn</option>
																<option value="PL">Poland</option>
																<option value="PT">Portugal</option>
																<option value="PR">Puerto Rico</option>
																<option value="QA">Qatar</option>
																<option value="RE">Reunion</option>
																<option value="RO">Romania</option>
																<option value="RU">Russian Federation</option>
																<option value="RW">Rwanda</option>
																<option value="KN">Saint Kitts and Nevis</option>
																<option value="LC">Saint LUCIA</option>
																<option value="VC">Saint Vincent and the Grenadines</option>
																<option value="WS">Samoa</option>
																<option value="SM">San Marino</option>
																<option value="ST">Sao Tome and Principe</option>
																<option value="SA">Saudi Arabia</option>
																<option value="SN">Senegal</option>
																<option value="SC">Seychelles</option>
																<option value="SL">Sierra Leone</option>
																<option value="SG">Singapore</option>
																<option value="SK">Slovakia (Slovak Republic)</option>
																<option value="SI">Slovenia</option>
																<option value="SB">Solomon Islands</option>
																<option value="SO">Somalia</option>
																<option value="ZA">South Africa</option>
																<option value="GS">South Georgia and the South Sandwich Islands</option>
																<option value="ES">Spain</option>
																<option value="LK">Sri Lanka</option>
																<option value="SH">St. Helena</option>
																<option value="PM">St. Pierre and Miquelon</option>
																<option value="SD">Sudan</option>
																<option value="SR">Suriname</option>
																<option value="SJ">Svalbard and Jan Mayen Islands</option>
																<option value="SZ">Swaziland</option>
																<option value="SE">Sweden</option>
																<option value="CH">Switzerland</option>
																<option value="SY">Syrian Arab Republic</option>
																<option value="TW">Taiwan, Province of China</option>
																<option value="TJ">Tajikistan</option>
																<option value="TZ">Tanzania, United Republic of</option>
																<option value="TH">Thailand</option>
																<option value="TG">Togo</option>
																<option value="TK">Tokelau</option>
																<option value="TO">Tonga</option>
																<option value="TT">Trinidad and Tobago</option>
																<option value="TN">Tunisia</option>
																<option value="TR">Turkey</option>
																<option value="TM">Turkmenistan</option>
																<option value="TC">Turks and Caicos Islands</option>
																<option value="TV">Tuvalu</option>
																<option value="UG">Uganda</option>
																<option value="UA">Ukraine</option>
																<option value="AE">United Arab Emirates</option>
																<option value="GB">United Kingdom</option>
																<option value="US">United States</option>
																<option value="UM">United States Minor Outlying Islands</option>
																<option value="UY">Uruguay</option>
																<option value="UZ">Uzbekistan</option>
																<option value="VU">Vanuatu</option>
																<option value="VE">Venezuela</option>
																<option value="VN">Viet Nam</option>
																<option value="VG">Virgin Islands (British)</option>
																<option value="VI">Virgin Islands (U.S.)</option>
																<option value="WF">Wallis and Futuna Islands</option>
																<option value="EH">Western Sahara</option>
																<option value="YE">Yemen</option>
																<option value="ZM">Zambia</option>
																<option value="ZW">Zimbabwe</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Remarks</label>
														<div class="col-md-4">
															<textarea class="form-control" rows="3" name="remarks"></textarea>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab3">
													<h3 class="block">Provide your billing and credit card details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">Card Holder Name <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_name"/>
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Card Number <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" class="form-control" name="card_number"/>
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">CVC <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" placeholder="" class="form-control" name="card_cvc"/>
															<span class="help-block">
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Expiration(MM/YYYY) <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<input type="text" placeholder="MM/YYYY" maxlength="7" class="form-control" name="card_expiry_date"/>
															<span class="help-block">
															e.g 11/2020 </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Payment Options <span class="required">
														* </span>
														</label>
														<div class="col-md-4">
															<div class="checkbox-list">
																<label>
																<input type="checkbox" name="payment[]" value="1" data-title="Auto-Pay with this Credit Card."/> Auto-Pay with this Credit Card </label>
																<label>
																<input type="checkbox" name="payment[]" value="2" data-title="Email me monthly billing."/> Email me monthly billing </label>
															</div>
															<div id="form_payment_error">
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab4">
													<h3 class="block">Confirm your account</h3>
													<h4 class="form-section">Account</h4>
													<div class="form-group">
														<label class="control-label col-md-3">Username:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="username">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Email:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="email">
															</p>
														</div>
													</div>
													<h4 class="form-section">Profile</h4>
													<div class="form-group">
														<label class="control-label col-md-3">Fullname:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="fullname">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Gender:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="gender">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Phone:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="phone">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Address:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="address">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">City/Town:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="city">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Country:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="country">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Remarks:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="remarks">
															</p>
														</div>
													</div>
													<h4 class="form-section">Billing</h4>
													<div class="form-group">
														<label class="control-label col-md-3">Card Holder Name:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="card_name">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Card Number:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="card_number">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">CVC:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="card_cvc">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Expiration:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="card_expiry_date">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Payment Options:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="payment">
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
													<a href="javascript:;" class="btn default button-previous">
													<i class="m-icon-swapleft"></i> Back </a>
													<a href="javascript:;" class="btn blue button-next">
													Continue <i class="m-icon-swapright m-icon-white"></i>
													</a>
													<a href="javascript:;" class="btn green button-submit">
													Submit <i class="m-icon-swapright m-icon-white"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
