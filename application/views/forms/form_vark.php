<script src="<?= $this->config->base_url(JSPATH . 'home.js') ?>"></script>

<section class="panel" >
    <header class="panel-heading">
        <h3 class ='panel-title'style="text-align: center;"><strong>Questionário de VARK (versão 7.0)</strong></h3><br>
        <h4 class ='panel-title'style="text-align: center;">Como Eu Aprendo Melhor?</h4>
        <h5 class='panel-heading'style='text-align:right;'>Fleming, N.D. & Mills, C. Trad.: Rory Cordeiro e Silva - 2006</h5>


        <p class ='panel-body'style='text-align:justify; font-size:14px;'> Escolha a resposta que melhor explique as suas preferências e selecione a letra correspondente.
            Caso necessário, circule mais de uma resposta se apenas uma não for suficiente.
            Deixe em branco as questões que não se apliquem a você.</p>
    </header>

    <div class="panel-body"style='text-align:justify;font-family:Arial;font-size: 12px;'>
        <form class="form-horizontal form-bordered" id='form_vark'>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">1. Você está ajudando alguém que quer ir até ao aeroporto, o centro da cidade ou estação ferroviária. Você:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "iria" id="iIria" value="k"<?php if (isset($vark['iria'])) echo 'checked disabled'; ?>/> 
                    <label for="iIria">a- Iria com ela.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "explicaria" id="iExplicaria" value="a"<?php if (isset($vark['explicaria'])) echo 'checked disabled'; ?>/> 
                    <label for="iExplicaria">b- Lhe explicaria as como chegar lá.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "escreveria" id="iEscreveria" value="r"<?php if (isset($vark['escreveria'])) echo 'checked disabled'; ?>/> 
                    <label for="iEscreveria">c- Escreveria como chegar lá (sem mapa). </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "mapa" id="iMapa" value="v"<?php if (isset($vark['mapa'])) echo 'checked disabled'; ?>/> 
                    <label for="iMapa">d- Desenharia ou daria um mapa a ela. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">2. Você não tem certeza como se deve escrever uma palavra. Se é "exceção" ou "excesão".Você iria:<br></h5>
                </div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "ver_mentalmente" id="iVerMentalmente" value="v"<?php if (isset($vark['explicaria'])) echo 'checked disabled'; ?>/> 
                    <label for="iVerMentalmente">a- Vê-la em sua mente e escolher como a vê.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "pronuncia" id="iPronuncia" value="a"<?php if (isset($vark['pronuncia'])) echo 'checked disabled'; ?>/> 
                    <label for="iPronuncia">b- Pronunciá-la mentalmente para descobrir como escrevê-la.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "dicionario" id="iDicionario" value="r"<?php if (isset($vark['dicionario'])) echo 'checked disabled'; ?>/> 
                    <label for="iDicionario">c-  Procurá-la num dicionário.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "escrever" id="iEscrever" value="k"<?php if (isset($vark['escrever'])) echo 'checked disabled'; ?>/> 
                    <label for="iEscrever">d-  Escrever as duas versões e escolher uma.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">3. Você está planejando as férias de um grupo. Você quer algumas informações deles sobre este planejamento.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "lugares_principais" id="iLugaresPrin" value="k"<?php if (isset($vark['lugares_principais'])) echo 'checked disabled'; ?>/> 
                    <label for="iLugaresPrin">a- Descrever alguns dos lugares principais.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "mapa_internet" id="iMapaNet" value="v"<?php if (isset($vark['mapa_internet'])) echo 'checked disabled'; ?>/> 
                    <label for="iMapaNet">b- Usar um mapa ou a Internet para mostrar-lhes os locais.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "itinerario" id="iItinerario" value="r"<?php if (isset($vark['itinerario'])) echo 'checked disabled'; ?>/> 
                    <label for="iItinerario">c- Dar-lhes uma cópia impressa do itinerário.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "telefonar_msg_email" id="iContato" value="a"<?php if (isset($vark['telefonar_msg_email'])) echo 'checked disabled'; ?>/> 
                    <label for="iContato">d-  Telefonar-lhes, mandar-lhes uma mensagem de texto ou um e-mail.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">4. Você irá cozinhar algo especial para a sua família.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "cozinhar" id="iCozinhar" value="k"<?php if (isset($vark['cozinhar'])) echo 'checked disabled'; ?>/> 
                    <label for="iCozinhar">a- Cozinhar algo que você já conhece e sem precisar de instruções.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "sugestao" id="iSugestao" value="a"<?php if (isset($vark['sugestao'])) echo 'checked disabled'; ?>/> 
                    <label for="iSugestao">b- Pedir sugestões a um amigo.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "livro_receitas" id="iLivroReceitas" value="v"<?php if (isset($vark['livro_receitas'])) echo 'checked disabled'; ?>/> 
                    <label for="iLivroReceitas">c-  Folhear um livro de receitas para tirar idéias baseadas nas fotos das mesmas.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "receita_boa" id="iReceitaBoa" value="r"<?php if (isset($vark['receita_boa'])) echo 'checked disabled'; ?>/> 
                    <label for="iReceitaBoa">d-  Usar um livro de receitas onde você sabe que tem uma boa receita.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">5. Um grupo de turistas quer aprender algo sobre parques ou reservas de vida selvagem na sua região.Você:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "falaria" id="iFalaria" value="a"<?php if (isset($vark['falaria'])) echo 'checked disabled'; ?>/> 
                    <label for="iFalaria">a- Lhes falaria sobre o tema, ou arranjaria alguém que lhes falasse sobre isto.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "fotos" id="iFotos" value="v"<?php if (isset($vark['fotos'])) echo 'checked disabled'; ?>/> 
                    <label for="iFotos">b- Lhes mostraria figuras na Internet, fotografias ou livros de fotos.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "levaria" id="iLevaria" value="k"<?php if (isset($vark['levaria'])) echo 'checked disabled'; ?>/> 
                    <label for="iLevaria">c-  Os levaria para um passeio em parques ou reservas de vida selvagem.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "livro" id="iLivro" value="r"<?php if (isset($vark['livro'])) echo 'checked disabled'; ?>/> 
                    <label for="iLivro">d-  Você lhes daria um livro ou panfletos sobre o assunto.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">6. Você está preste a comprar uma câmara digital ou telefone celular. Além do preço, o que mais influenciaria a sua decisão?<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "experimentar_testar" id="iExperimentar" value="k"<?php if (isset($vark['experimentar_testar'])) echo 'checked disabled'; ?>/> 
                    <label for="iExperimentar">a- Experimentá-lo ou testá-lo.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "detalhes_aparelho" id="iDetalhes" value="r"<?php if (isset($vark['detalhes_aparelho'])) echo 'checked disabled'; ?>/> 
                    <label for="iDetalhes">b- A leitura de detalhes sobre o aparelho.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "aparencia_qualidade" id="iAparencia" value="v"<?php if (isset($vark['aparencia_qualidade'])) echo 'checked disabled'; ?>/> 
                    <label for="iAparencia">c- Se ele tem a aparência boa e parece ser de qualidade.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "explicacao_vendedor" id="iVendedor" value="a"<?php if (isset($vark['explicacao_vendedor'])) echo 'checked disabled'; ?>/> 
                    <label for="iVendedor">d- As explicações do vendedor sobre as características do aparelho.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">7. Lembre-se do momento que você aprendeu como fazer algo novo. <br>Evite escolher algo que requeira habilidade física, por exemplo, andar de bicicleta.Como você aprendeu melhor?<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "observando" id="iObservando" value="k"<?php if (isset($vark['observando'])) echo 'checked disabled'; ?>/> 
                    <label for="iObservando">a- Observando um demonstração.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "explicacao_questionamentos" id="iExplicacao" value="a"<?php if (isset($vark['explicacao_questionamentos'])) echo 'checked disabled'; ?>/> 
                    <label for="iExplicacao">b- Escutando as explicações de um amigo e fazendo perguntas.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "diagramas_graficos" id="iDicasVisuais" value="v"<?php if (isset($vark['diagramas_graficos'])) echo 'checked disabled'; ?>/> 
                    <label for="iDicasVisuais">c- Diagramas e gráficos – dicas visuais.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "manual_livro" id="iManual" value="r"<?php if (isset($vark['manual_livro'])) echo 'checked disabled'; ?>/> 
                    <label for="iManual">d- Através instruções escritas - (por exemplo: um manual ou um livro texto).</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">8. Você tem um problema no joelho.Você preferiria que o doutor:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "site_leitura" id="iSite" value="r"<?php if (isset($vark['site_leitura'])) echo 'checked disabled'; ?>/> 
                    <label for="iSite">a- Lhe indicasse um "site" ou algo para ler a respeito.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "modelo" id="iModelo" value="k"<?php if (isset($vark['modelo'])) echo 'checked disabled'; ?>/> 
                    <label for="iModelo">b- Que usasse um modelo plástico de joelho para lhe mostrar o que está errado.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "contar_contras" id="iFalasse" value="a"<?php if (isset($vark['contar_contras'])) echo 'checked disabled'; ?>/> 
                    <label for="iFalasse">c- Lhe contasse o que esta errado.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "diagrama_contras" id="iDiagrama" value="v"<?php if (isset($vark['diagrama_contras'])) echo 'checked disabled'; ?>/> 
                    <label for="iDiagrama">d- Lhe mostrasse num diagrama do que está errado.</label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">9. Você quer aprender usar um novo programa, habilidade ou jogo no computador.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "instrucoes" id="iInstrucoes" value="r"<?php if (isset($vark['instrucoes'])) echo 'checked disabled'; ?>/> 
                    <label for="iInstrucoes">a- Ler as instruções que vieram com o programa.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "conversa_quem_conhece" id="iConversar" value="a"<?php if (isset($vark['conversa_quem_conhece'])) echo 'checked disabled'; ?>/> 
                    <label for="iConversar">b- Conversar com pessoas que conhecem o programa.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "controles_teclado" id="iControles" value="k"<?php if (isset($vark['controles_teclado'])) echo 'checked disabled'; ?>/> 
                    <label for="iControles">c- Usaria os controles ou teclado. </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "diagramas_programa" id="iDiagPrograma" value="v"<?php if (isset($vark['diagramas_programa'])) echo 'checked disabled'; ?>/> 
                    <label for="iDiagPrograma">d- Seguir os diagramas do livro que veio com ele. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">10. Eu gosto de "sites" que têm:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "clicar_mudar_tentar" id="iMudar" value="k"<?php if (isset($vark['clicar_mudar_tentar'])) echo 'checked disabled'; ?>/> 
                    <label for="iMudar">a- Coisas que eu possa clicar, mudar ou tentar.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "visual_interessante" id="iCaracVisuais" value="v"<?php if (isset($vark['visual_interessante'])) echo 'checked disabled'; ?>/> 
                    <label for="iCaracVisuais">b- Uma aparência interessante e características visuais</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "descricoes_explicacoes" id="iDescricoes" value="r"<?php if (isset($vark['descricoes_explicacoes'])) echo 'checked disabled'; ?>/> 
                    <label for="iDescricoes">c- Descrições por escrito, listas e explicações.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "midias_audios" id="iMidias" value="a"<?php if (isset($vark['midias_audios'])) echo 'checked disabled'; ?>/> 
                    <label for="iMidias">d- Canais de áudio onde eu possa ouvir música, programas de rádio ou entrevistas. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">11. Além do preço, o que mais lhe influenciaria na sua decisão de comprar um livro de não-ficção?<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "visual_atraente" id="iVisual" value="v"<?php if (isset($vark['visual_atraente'])) echo 'checked disabled'; ?>/> 
                    <label for="iIria">a- Ele possuir um visual atraente.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "leitura_previa_parte" id="iLeituraPrevia" value="r"<?php if (isset($vark['leitura_previa_parte'])) echo 'checked disabled'; ?>/> 
                    <label for="iLeituraPrevia">b- Ter lido rapidamente algumas partes dele.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "recomendacao" id="iRecomendacao" value="a"<?php if (isset($vark['recomendacao'])) echo 'checked disabled'; ?>/> 
                    <label for="iRecomendacao">c- Um amigo ter falado sobre ele e o recomendado.  </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "vida_real" id="iRealidade" value="k"<?php if (isset($vark['vida_real'])) echo 'checked disabled'; ?>/> 
                    <label for="iRealidade">d- Ele possuir estórias da vida real, experiências e exemplos. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">12. Você está usando um livro, um CD ou um "site" para aprender tirar fotos com sua nova câmera digital.Você gostaria que ele tivesse:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "poder_fazer_perguntas" id="iInteratividade" value="a"<?php if (isset($vark['poder_fazer_perguntas'])) echo 'checked disabled'; ?>/> 
                    <label for="iInteratividade">a- A oportunidade de perguntar e falar sobre a câmera e suas características.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "instrucoes_claras" id="iClareza" value="r"<?php if (isset($vark['instrucoes_claras'])) echo 'checked disabled'; ?>/> 
                    <label for="iClareza">b- Instruções claras e listas com pontos detalhando o que fazer.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "diagramas_camera" id="iDiagramacao" value="v"<?php if (isset($vark['diagramas_camera'])) echo 'checked disabled'; ?>/> 
                    <label for="iDiagramacao">c- Diagramas mostrando a câmera e o que cada parte faz. </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "exemplos_fotos" id="iExemploFotos" value="k"<?php if (isset($vark['exemplos_fotos'])) echo 'checked disabled'; ?>/> 
                    <label for="iExemploFotos">d- Muitos exemplos de fotos boas e ruins para saber melhorá-las. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold"> 13. Você prefere um professor ou apresentador que usa:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "demonstracoes_praticas" id="iDemonstracoes" value="k"<?php if (isset($vark['demonstracoes_praticas'])) echo 'checked disabled'; ?>/> 
                    <label for="iDemonstracoes">a- Demonstrações, modelos ou sessões práticas.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "debates_discussoes" id="iDebates" value="a"<?php if (isset($vark['debates_discussoes'])) echo 'checked disabled'; ?>/> 
                    <label for="iDebates">b- Perguntas e respostas, debates, discussões em grupo ou palestristas convidados.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "livros_materiais" id="iMateriais" value="r"<?php if (isset($vark['livros_materiais'])) echo 'checked disabled'; ?>/> 
                    <label for="iMateriais">c- Fotocópias, livros ou materiais de leitura. </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "diag_tabelas_graficos" id="iImagens" value="v"<?php if (isset($vark['diag_tabelas_graficos'])) echo 'checked disabled'; ?>/> 
                    <label for="iImagens">d- Diagramas, tabelas e gráficos. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">14. Você terminou uma competição ou um teste e gostaria de algumas informações sobre o seu desempenho.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "exemplos_feitos_base" id="iExemplosBase" value="k"<?php if (isset($vark['exemplos_feitos_base'])) echo 'checked disabled'; ?>/> 
                    <label for="iExemplosBase">a- Basear-se em exemplos do que você fez.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "descricao_resultados" id="iDescResult" value="r"<?php if (isset($vark['descricao_resultados'])) echo 'checked disabled'; ?>/> 
                    <label for="iDescResult">b- Usar uma descrição por escrito de seus resultados.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "informacoes_externas" id="iBaseInf" value="a"<?php if (isset($vark['informacoes_externas'])) echo 'checked disabled'; ?>/> 
                    <label for="iBaseInf">c- Basear-se nas informações que alguém lhe falasse. </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "graficos_resultados" id="iGrafResult" value="v"<?php if (isset($vark['graficos_resultados'])) echo 'checked disabled'; ?>/> 
                    <label for="iGrafResult">d- Usar gráficos mostrando o que você alcançou.  </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold"> 15. Você irá escolher comida num restaurante ou bar.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "experimentado" id="iExperimentado" value="k"<?php if (isset($vark['experimentado'])) echo 'checked disabled'; ?>/> 
                    <label for="iExperimentado">a- Escolher algo que você já tenha experimentado antes.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "sugestao_garcom_amigos" id="iRecomendado" value="a"<?php if (isset($vark['explicaria'])) echo 'checked disabled'; ?>/> 
                    <label for="iRecomendado">b- Pedir sugestões ao garçom ou perguntar a amigos por recomendações.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "menu" id="iMenu" value="r"<?php if (isset($vark['menu'])) echo 'checked disabled'; ?>/> 
                    <label for="iMenu">c- Escolher baseado nas informações do menu.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "observar_outros_fotos" id="iObservacaoClientes" value="v"<?php if (isset($vark['observar_outros_fotos'])) echo 'checked disabled'; ?>/> 
                    <label for="iObservacaoClientes">d- Observar o que os outros estão comendo ou olhar fotos dos pratos.  </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold"> 16. Você deve fazer um discurso importante numa conferência ou numa ocasião especial.Você iria:<br></h5></div>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "diagramas_grafs" id="iDiagExplicacao" value="r"<?php if (isset($vark['diagramas_grafs'])) echo 'checked disabled'; ?>/> 
                    <label for="iDiagExplicacao">a- Fazer diagramas ou utilizar gráficos para ajudá-lo a explicar as coisas.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "palavras_chaves_treino" id="iPratica" value="v"<?php if (isset($vark['palavras_chaves_treino'])) echo 'checked disabled'; ?>/> 
                    <label for="iPratica">b- Escrever algumas palavras chaves e praticar seu discurso várias vezes.</label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default">
                    <input type="checkbox" name= "decorar_discurso" id="iDecorar" value="k"<?php if (isset($vark['decorar_discurso'])) echo 'checked disabled'; ?>/> 
                    <label for="iDecorar">c- Escrever todos os detalhes de seu discurso e o decoraria após lê-lo diversas vezes. </label>
                </div><br>
                <div class="col-md-12 checkbox-custom checkbox-default"> 
                    <input type="checkbox" name= "exemplos_realidade" id="iAddRealidade" value="a"<?php if (isset($vark['exemplos_realidade'])) echo 'checked disabled'; ?>/> 
                    <label for="iMapa">d- Reunir muitos exemplos e estórias para fazer seu discurso ficar real e prático. </label>
                </div><br>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:void(0)" id="save_vark_btn" onClick="save_vark()" class="btn btn-success <?php if (isset($vark)) echo 'disabled'; ?>" style="float:right"><?= lang('save') ?></a>
                </div>
            </div>
        </form>
    </div>
</section>
<?php if(isset($vark)): ?>
<script>
    jQuery('#section_vark').addClass('panel-success');
</script>
<?php endif; ?>
