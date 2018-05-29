<script src="<?= $this->config->base_url(JSPATH . 'home.js') ?>"></script>

<section class="panel" >
    <header class="panel-heading">
        <h3 class ='panel-title'style="text-align: center;"><strong>KTS2® - Keirsey Temperament Sort II</strong></h3><br>

        <p class ='panel-body'style='text-align:justify; font-size:14px;'> 1) As pessoas possuem diferentes modos de pensar e encarrar a vida. Não somos todos iguais. Somos únicos.
            A chave para vivermos bem é compreender essas diferenças, saber respeitar e lidar com elas.</p>

        <p class ='panel-body'style='text-align:justify; font-size:14px;'> 2) Este questionário contém 70 perguntas de duas escolhas.</p>

        <p class ='panel-body'style='text-align:justify; font-size:14px;'> 3) <u>Não existe resposta correta</u>. Qualquer uma das duas opções é válida</p>

        <p class ='panel-body'style='text-align:justify; font-size:14px;'> 4) O questionário tem por objetivo revelar como você está estruturado mentalmente, como você pensa e reage
            diante das situações. Isto o ajudará a compreender melhor a si próprio e aos outros. Porém, muito mais que
            isso, o questionário revelará quais são suas habilidades naturais e deste modo você poderá se orientar melhor
            na carreira usando para isto aquilo que lhe é mais espontâneo, sem ter que se forçar a nada.  </p>

        <p class ='panel-body'style='text-align:justify; font-size:14px;'> 5) O questionário deve ser respondido levando em levando-se em consideração suas preferências NATURAIS
            (aquilo que você faz espontaneamente). Ou seja, ao responder uma questão você deve decidir, dentre as duas
            proposições apresentadas, aquela que para você é mais natural fazer, aquela que você não precisa se esforçar
            para fazer. <u>Por exemplo</u> se numa festa (questão 15), para você é mais natural procurar os seus amigos e você
            percebe que ficar a festa toda com eles lhe é suficiente, mais confortável ou prazeroso, você deve assinalar a
            resposta (b). Se porém, para você isto não basta, se você gosta de interagir com os outros – inclusive os estranhos
            – e lhe dá prazer ou você fica satisfeito ao fazer isso, marque a alternativa (a). </p>
    </header>

    <div class="panel-body"style='text-align:justify;font-family:Arial;font-size: 12px;'>
        <form class="form-horizontal form-bordered" id='form_kts'>

            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">1 - Quando o telefone toca, você (When the phone rings do you):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q1" value="a"/> 
                    <label>(a) se apressa em atendê-lo (hurry to get it first).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q1"value="b"/> 
                    <label>(b) deixa para algum outro atender (hope someone else will answer).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">2 – Você é mais (Are you more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q2" value="a"/> 
                    <label>(a) observador que reflexivo (observant than introspective).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q2"value="b"/> 
                    <label>(b) reflexivo que observador (introspective than observant).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">3 – É pior (Is it worse to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q3" value="a"/> 
                    <label>(a) sonhar acordado, ter a cabeça nas nuvens (have your head in the clouds).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q3"value="b"/> 
                    <label>(b) estar preso numa rotina (be in a rut).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">4 – No trato com as pessoas você habitualmente é mais (With people are you usually more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q4" value="a"/> 
                    <label>(a) firme que gentil (firm than gentile).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q4"value="b"/> 
                    <label>(b) gentil que firme (gentile than firm).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">5 – Você fica mais confortável quando faz (Are you more comfortable in making):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q5" value="a"/> 5
                    <label>(a) juízos críticos (critical judgments).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q5"value="b"/> 
                    <label>(b) juízos baseados na sua opinião pessoal (value judgements).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">6 – A bagunça no local de trabalho é algo que (Is clutter in the workplace something you):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q6" value="a"/> 
                    <label>(a) faz você dedicar tempo para deixá-lo organizado (take time to straighten up).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q6"value="b"/> 
                    <label>(b) você tolera muito bem (tolerate pretty well).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">7 – É próprio do seu jeito (Is it your way to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q7" value="a"/> 
                    <label>(a) decidir-se rapidamente (make up your mind quickly).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q7"value="b"/> 
                    <label>(b) leva um certo tempo para escolher e decidir (pick and choose at some length).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">8 – Aguardando na fila, na maioria das vezes, você (Waiting in line, do you often):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q8" value="a"/> 
                    <label>(a) bate-papo com os outros (chat with others).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q8"value="b"/> 
                    <label>(b) fica na sua (stick to business).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">9 – Você é mais (Are you more)<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q9" value="a"/> 
                    <label>(a) sensato do que ideacional (sensible than ideational).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q9"value="b"/> 
                    <label>(b) ideacional do que sensato (ideational than sensible).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">10 – Você é mais interessado naquilo que é (Are you more interested):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q10" value="a"/> 
                    <label>(a) real (what is actual).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q10"value="b"/> 
                    <label>(b) possível (what is possible)</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">11 – Em tomadas de decisão, você é mais propenso a se decidir baseado(a) no(a)s (In making up your mind are you more likely to go by):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q11" value="a"/> 
                    <label>(a) fatos (data).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q11"value="b"/> 
                    <label>(b) vontades (desires).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">12 – Na avaliação dos outros você tende a ser (In sizing up others do you tend to be):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q12" value="a"/> 
                    <label>(a) objetivo e impessoal (objective and impersonal).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q12"value="b"/> 
                    <label>(b) amigável e pessoal (friendly and personal).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">13 – Você prefere que os contratos sejam (Do you prefer contracts to be).<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q13" value="a"/> 
                    <label>(a) oficialmente selados (signed, sealed, and delivered).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q13"value="b"/> 
                    <label>(b) firmados com um aperto de mão (settled on a handshake).</label>
                </div><br>                 
            </div>                   
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">14 – Você fica mais satisfeito (Are you more satisfied having):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q14" value="a"/> 
                    <label>(a) tendo concluído uma tarefa (a finished product).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q14"value="b"/> 
                    <label>(b) durante um trabalho em andamento (work in progress).</label>
                </div><br>                
            </div>                
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">15 – Em uma festa, você (At a party, do you):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q15" value="a"/> 
                    <label>(a) interage com muitos, incluindo estranhos (interact with many, even strangers).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q15"value="b"/> 
                    <label>(b) interage com alguns amigos (interact with a few friends).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">16 – Você tende mais a (Do you tend to be more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q16" value="a"/> 
                    <label>(a) se basear nos fatos que ser especulativo (factual than speculative).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q16"value="b"/> 
                    <label>(b) ser especulativo que se basear nos fatos (speculative than factual).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">17 – Você gosta de escritores que (Do you like writers who):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q17" value="a"/> 
                    <label>(a) dizem aquilo que realmente querem dizer (say what they mean).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q17"value="b"/> 
                    <label>(b) se expressam usando metáforas e simbolismos (use metaphors and symbolism).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">18 - O que mais lhe agrada é (Which appeals to you more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q18" value="a"/> 
                    <label>(a) a coerência de pensamento (consistency of thought).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q18"value="b"/> 
                    <label>(b) um relacionamento humano harmonioso (harmonious relationships).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">19 – Se você tiver que decepcionar alguém geralmente será porque você é (If you must disappoint someone are you usually):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q19" value="a"/> 
                    <label>(a) franco e direto (frank and straightforward).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q19"value="b"/> 
                    <label>(b) caloroso e atencioso (warm and considerate).</label>
                </div><br>                 
            </div>               
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">20 – No emprego você prefere suas atividades (On the job do you want your activities):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q20" value="a"/> 
                    <label>(a) programadas (scheduled).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q20"value="b"/> 
                    <label>(b) não programadas (unscheduled).</label>
                </div><br>                   
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">21 – Você prefere com mais frequência (Do you more often prefer):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q21" value="a"/>
                    <label>(a) declarações definitivas (final, unalterable statements)</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q21"value="b"/> 
                    <label>(b) declarações provisórias (tentative, preliminary statements).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">22 – Ao interagir com estranhos você fica (Does interacting with strangers):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q22" value="a"/>
                    <label>(a) estimulado (energize you).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q22"value="b"/> 
                    <label>(b) cansado. Com sua energia exaurida (tax your reserves).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">23 – Os fatos (Facts):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q23" value="a"/>
                    <label>(a) falam por si próprios (speak for themselves).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q23"value="b"/> 
                    <label>(b) ilustram princípios (illustrate principles).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">24 – Você acha os visionarios e teóricos (Do you find visionaries and theorists):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q24" value="a"/>
                    <label>(a) um pouco irritantes (somewhat annoying).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q24"value="b"/> 
                    <label>(b) bastante fascinantes (rather fascinating).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">25 – Em uma discussão acalorada você (In a heated discussion, do you):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q25" value="a"/>
                    <label>(a) se apega ao seu ponto de vista (stick to your guns).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q25"value="b"/> 
                    <label>(b) procura entrar em comum acordo (look for common ground).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">26 – É preferível ser (Is it better to be):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q26" value="a"/>
                    <label>(a) justo (just).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q26"value="b"/> 
                    <label>(b) misericordioso (merciful).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">27 – No trabalho é mais natural você (At work, is it more natural for you to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q27" value="a"/>
                    <label>(a) apontar os equívocos para os outros (point out mistakes).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q27"value="b"/> 
                    <label>(b) tentar agradar os outros (try to please others).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">28 – Você fica mais confortável (Are you more comfortable).<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q28" value="a"/>
                    <label>(a) depois de uma decisão (after a decision).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q28"value="b"/> 
                    <label>(b) antes de uma decisão (before a decision).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">29 – Você tende a (Do you tend to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q29" value="a"/>
                    <label>(a) dizer o que vem a sua cabeça (say right out what’s on your mind).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q29"value="b"/> 
                    <label>(b) ficar de ouvidos atentos (keep your ears open).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">30 – O senso comum é (Common sense is):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q30" value="a"/>
                    <label>(a) geralmente confiável (usually reliable)</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q30"value="b"/> 
                    <label>(b) muitas vezes questionável (frequently questionable).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">31 – Muitas vezes as crianças não (Children often do not):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q31" value="a"/>
                    <label>(a) se fazem úteis o suficiente (make themselves useful enough).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q31"value="b"/> 
                    <label>(b) exercitam suas fantasias o bastante (exercise their fantasy enough).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">32 – Quando você está no comando de outros, você é (When in charge of others do you tend to be):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q32" value="a"/>
                    <label>(a) firme e inflexível (firm and unbending).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q32"value="b"/> 
                    <label>(b) indulgente e tranquilizador (forgiving and leniente).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">33 – Na maioria das vezes você é uma pessoa (Are you more often):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q33" value="a"/>
                    <label>(a) de sangue frio (a cool-headed person).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q33"value="b"/> 
                    <label>(b) amável e afetuosa (a warm-hearted person).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">34 – Você é mais propenso a (Are you prone to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q34" value="a"/>
                    <label>(a) tornar as coisas concretas (nailing things down).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q34"value="b"/> 
                    <label>(b) explorar as possibilidades (exploring the possibilities)</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">35 – Na maioria das situações você é mais (In most situations are you more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q35" value="a"/>
                    <label>(a) deliberado do que espontâneo (deliberate than spontaneous).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q35"value="b"/> 
                    <label>(b) espontâneo do que deliberado (spontaneous than deliberate)</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">36 – Você se acha uma pessoa (Do you think of yourself as):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q36" value="a"/>
                    <label>(a) sociável ou extrovertida (an outgoing person).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q36"value="b"/> 
                    <label>(b) reservada ou introvertida (a private person).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">37 – Frequentemente, você é um tipo de pessoa (Are you more frequently):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q37" value="a"/>
                    <label>(a) prática (a practical sort of person).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q37"value="b"/> 
                    <label>(b) inventiva (a fanciful sort of person)</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">38 – Você fala mais sobre (Do you speak more in):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q38" value="a"/>
                    <label>(a) pormenores do que generalidades (particulars than generalities).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q38"value="b"/> 
                    <label>(b) generalidades do que pormenores (generalities than particulars).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">39 – Para você é um elogio ser considerado uma pessoa (Which is more of a compliment):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q39" value="a"/>
                    <label>(a) lógica (“there’s a logical person”).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q39"value="b"/> 
                    <label>(b) sentimental (“there’s a sentimental person”).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">40 – Você é mais conduzido pelo(a)s seus (Which rules you more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q40" value="a"/>
                    <label>(a) pensamentos (your thoughts).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q40"value="b"/> 
                    <label>(b) sentimentos (your feelings).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">41 – Ao terminar uma tarefa você gosta de (When finishing a job, do you like to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q41" value="a"/>
                    <label>(a) amarrar todas as pontas soltas (tie up all the loose ends)</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q41"value="b"/> 
                    <label>(b) mudar para uma outra atividade (move on to something else).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">42- Você prefere trabalhar (Do you prefer to work):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q42" value="a"/>
                    <label>(a) com prazos (to deadlines).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q42"value="b"/> 
                    <label>(b) apenas trabalhar sempre (just whenever).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">43 - Você é do tipo de pessoa que (Are you the kind of person who):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q43" value="a"/>
                    <label>(a) fala pelos cotovelos (is rather talkative).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q43"value="b"/> 
                    <label>(b) não perde nada do que está acontecendo (doesn’t miss much).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">44 – Você é inclinado a levar o que foi dito de maneira mais (Are you inclined to take what is said):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q44" value="a"/>
                    <label>(a) ao pé da letra (more literally).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q44"value="b"/> 
                    <label>(b) figurada (more figuratively).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">45 – Você vê com mais constância o que (Do you more often see):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q45" value="a"/>
                    <label>(a) está bem à sua frente (what’s right in front of you).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q45"value="b"/> 
                    <label>(b) só pode ser visto com a imaginação (what can only be imagined).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">46 – É pior ser (Is it worse to be):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q46" value="a"/>
                    <label>(a) coração mole (a softy).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q46"value="b"/> 
                    <label>(b) duro e realista (hard-nosed).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">47 – Em situações difíceis você é, às vezes muito (In trying circunstances are you sometimes):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q47" value="a"/>
                    <label>(a) antipático (too unsympathetic).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q47"value="b"/> 
                    <label>(b) solícito (too sympathetic).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">48 – Você tende a escolher (Do you tend to choose):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q48" value="a"/>
                    <label>(a) com bastante cuidado (rather carefully).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q48"value="b"/> 
                    <label>(b) um pouco impulsivamente (somewhat impulsively).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">49 – Você é mais inclinado a (Are you inclined to be more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q49" value="a"/>
                    <label>(a) ser afobado do que não ter pressa (hurried than leisurely).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q49"value="b"/> 
                    <label>(b) não ter pressa do que ser afobado (leisurely than hurried).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">50 – No trabalho, você tende a (At work do you tend to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q50" value="a"/>
                    <label>(a) ser sociável com seus colegas (be sociable with your colleagues).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q50"value="b"/> 
                    <label>(b) guardar as coisas para si mesmo (keep more to yourself).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">51 – Você é mais propenso a acreditar na(s) (Are you more likely to trust):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q51" value="a"/>
                    <label>(a) sua vivência (your experiences).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q51"value="b"/> 
                    <label>(b) sua opinião (your conceptions).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">52 – Você é mais inclinado a se sentir com (Are you more inclined to feel):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q52" value="a"/>
                    <label>(a) os pés no chão (down to earth).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q52"value="b"/> 
                    <label>(b) a cabeça no mundo da Lua (somewhat removed).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">53 – Você se vê (Do you think of yourself as a):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q53" value="a"/>
                    <label>(a) capaz de lidar com uma situação difícil de maneira muito determinada (tough-minded person).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q53"value="b"/> 
                    <label>(b) bondoso e sensível, coração mole (tender-hearted person)</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">54 – Na sua maneira de ser, o que você mais autovaloriza é ser (Do you value in yourself more that you are):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q54" value="a"/>
                    <label>(a) racional (reasonable).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q54"value="b"/> 
                    <label>(b) devotado (devoted).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">55 - Você geralmente quer as coisas (Do you usually want things):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q55" value="a"/>
                    <label>(a) estabelecidas e decididas (settled and decided).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q55"value="b"/> 
                    <label>(b) apenas esboçadas (just penciled in).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">56 – Você diria que você é mais (Would you say you are more).<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q56" value="a"/>
                    <label>(a) sério e decidido (serious and determined).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q56"value="b"/> 
                    <label>(b) tranquilo (easy going).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">57 – Você se considera um bom (Do you consider yourself):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q57" value="a"/>
                    <label>(a) proseador (a good conversationalist).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q57"value="b"/> 
                    <label>(b) ouvinte (a good listener).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">58 – Você aprecia mais em si mesmo um(a) (Do you prize in yourself):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q58" value="a"/>
                    <label>(a) forte senso de realidade (a strong hold on reality).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q58"value="b"/> 
                    <label>(b) imaginação fértil (a vivid imagination).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">59 – Você é mais atraído por (Are you drawn more to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q59" value="a"/>
                    <label>(a) argumentos (fundamentals).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q59"value="b"/> 
                    <label>(b) conatações (overtones).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">60 – O que lhe parece ser maior defeito é ser muito (Which seems the greater fault):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q60" value="a"/>
                    <label>(a) sentimental (to be too compassionate).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q60"value="b"/> 
                    <label>(b) frio (to be too dispassionate).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">61 – Você pende mais a favor do(a) (Are you swayed more by):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q61" value="a"/>
                    <label>(a) evidência convincente (convincing evidence).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q61"value="b"/> 
                    <label>(b) apelo comovente (a touching appeal).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">62 – Você se sente melhor (Do you feel better about):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q62" value="a"/>
                    <label>(a) fechando a questão (coming to closure).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q62"value="b"/> 
                    <label>(b) deixando para decidir depois (keeping your options open).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">63 – Em geral, é melhor (Is it preferable mostly to):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q63" value="a"/>
                    <label>(a) ter certeza de que as coisas estão arranjadas (make sure things are arranged).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q63"value="b"/> 
                    <label>(b) deixar as coisas acontecerem naturalmente (just let things happen naturally).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">64 – Você tende a ser uma pessoa (Are you inclined to be):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q64" value="a"/>
                    <label>(a) de fácil abordagem (easy to approach).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q64"value="b"/> 
                    <label>(b) um pouco reservada (somewhat reserved).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">65 – Você prefere as estórias de (In stories do you prefer):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q65" value="a"/>
                    <label>(a) ação e aventura (action and adventure).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q65"value="b"/> 
                    <label>(b) fantasia heróica (fantasy and heroism).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">66 – É mais natural para você (Is it easier for you to)<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q66" value="a"/>
                    <label>(a) fazer com que os outros lhe sejam úteis (put others to good use).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q66"value="b"/> 
                    <label>(b) sentir empatia pelos demais (identifiy with others).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">67 – O que você mais desejaria possuir em si mesmo(a) (Which do you wish more for yourself):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q67" value="a"/>
                    <label>(a) Força de vontade (strength of will).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q67"value="b"/> 
                    <label>(b) Força emotiva (strength of emotion).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">68 – Você se vê como uma pessoa que (Do you see yourself as basically)<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q68" value="a"/>
                    <label>(a) está pouco se lixando sobre o que dizem de você (thick-skinned).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q68"value="b"/> 
                    <label>(b) se incomoda sobre o que dizem de você (thin-skinned).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">69 – Você tende a reparar na(s) (Do you tend to notice):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q69" value="a"/>
                    <label>(a) bagunça (disorderliness).</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q69"value="b"/> 
                    <label>(b) oportunidades de mudança (opportunities for change).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-md-12"><h5 class="text-bold">70 – Você é uma pessoa mais (Are you more):<br></h5></div>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name= "q70" value="a"/>
                    <label>(a) rotineira do que imprevisível (routinized than whimsical)</label>
                </div><br>
                <div class="col-md-12 radio-custom radio-success">
                    <input type="radio" name="q70"value="b" id="q70"/> 
                    <label>(b) imprevisível do que rotineira (whimsical than routinized).</label>
                </div><br>                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a href="javascript:void(0)" id="save_kts_btn" onClick="save_kts()" class="btn btn-success <?php if (isset($kts)) echo 'disabled'; ?>" style="float:right"><?= lang('save') ?></a>
                </div>
            </div>
        </form>
    </div>
</section>
<?php if (isset($kts)): ?>
    <script>
        jQuery('#section_kts').addClass('panel-success');
    </script>
<?php endif; ?>