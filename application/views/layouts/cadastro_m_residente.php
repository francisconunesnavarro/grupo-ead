<div class="block-flat">
	<div class="content">
	
		<div class="form-group mb-lg">
			<label>Iniciais do Nome</label> 
			<input name="iniciais_nome" type="text" class="form-control input-lg register" />
		</div>
	
		<div class="form-group mb-lg">
			<label>Sexo</label>
			<select name="sexo" class="form-control input-lg register">
             	<option value="m" >Masculino</option>
                <option value="f" >Feminino</option>
             </select>
	  	</div>
	  	
	  	<div class="form-group mb-lg">
			<label>Data de Nascimento</label> 
			<input name="data_nascimento" placeholder="DD-MM-YYYY" type="text" class="form-control input-lg register" />
		</div>
	  	
	  	<div class="form-group mb-lg">
			<label>A. Formatura</label> 
		</div>
	  	
		<div class="form-group mb-lg">
			<label>Faculdade/Local de Formatura</label> 
			<input name="local_formatura" type="text" class="form-control input-lg register" />
			<label>Ano de Formatura</label> 
			<input name="ano_formatura" type="text" class="form-control input-lg register" />
		</div>
		
		<div class="form-group mb-lg">
			<label>B. Emergências Médicas</label> 
		</div>
		
		<div class="form-group mb-lg">
			<label>Graduação</label> 
		</div>
		
		<div class="form-group mb-lg">
			<label>Teve curso curricular de emergências médicas na faculdade</label> 
			<select name="curso_curricular_emergencia" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
                
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>Fez plantões de emergências médicas na graduação</label> 
			 <select name="plantoes_emergencia" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
               
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>C. Ética Médica</label> 
		</div>
		<div class="form-group mb-lg">
			<label>Graduação</label> 
		</div>
		
		<div class="form-group mb-lg">
			<label>Teve curso curricular de ética médica na faculdade</label> 
			 <select name="curso_curricular_etica" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
                
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>D. Residência</label> 
		</div>
	
		<div class="form-group mb-lg">
			<label>Fez residência médica reconhecida pelo MEC</label> 
			 <select name="residencia_reconhecida_mec" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
                <option value="2" >Está fazendo</option>
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>Fez estágio em outras Instituições Médicas</label> 
			 <select name="estagio_instituicoes_medicas" id="fez_outra_med" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
                <option value="2" >Está fazendo</option>
             </select>
		</div>
		
		<div id="fez_outra_med_plus" class="form-group mb-none" style="display: none;">
        	<div class="row">
            	<div class="col-sm-6 mb-lg">
                	<label>Local</label>
                    <input name="estagio_instituicoes_medicas_local" type="text" class="form-control input-lg register" />
                </div>
                <div class="col-sm-6 mb-lg">
                	<label>Duração (anos)</label>
                    <input name="estagio_instituicoes_medicas_duracao" type="text" class="form-control input-lg register" />
                </div>
             </div>
        </div>

 		<div class="form-group mb-lg">
        	<label>Especialidade(s) Médica(s)</label>
            <input name="especialidade_medica" type="text" class="form-control input-lg register" />
        </div>

		<div class="form-group mb-lg">
			<label>Teve/Tem programa teórico para emergências médicas</label> 
			 <select name="tem_programa_teorico_emergencias_medicas" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>Participou(a) de plantões na emergência</label> 
			 <select name="participou_plantoes_emergencia" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>Possui título de especialista</label> 
			 <select name="especialidade_medica" id="titulo_esp" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
             </select>
		</div>

		<div id="titulo_esp_plus" style="display: none;" class="form-group mb-lg">
        	<label>Qual(is)?</label>
            <input name="possui_titulo_especialista_quais" type="text" class="form-control input-lg register" />
        </div>
        
        <div class="form-group mb-lg">
			<label>Fez pós-graduação</label> 
			 <select name="pos_graduacao" id="pos_graduacao" class="form-control input-lg register">
             	<option value="0" >Não</option>
             	<option value="1" >Sim</option>
             </select>
		</div>
		
		<div id="pos_graduacao_plus" class="form-group mb-lg"  style="display: none;">
			<label>Nível</label> 
			 <select name="pos_graduacao_qual" class="form-control input-lg register">
             	<option value="mestrado" >Mestrado</option>
             	<option value="doutorado" >Doutorado</option>
             	<option value="ambos" >Ambos</option>
             </select>
		</div>
        

		<div class="form-group mb-lg">
			<label>E. Trabalho</label> 
		</div>
	
		<div class="form-group mb-lg">
			<label>Número de empregos</label> 
			<input name="nro_empregos" type="text" class="form-control input-lg register" />
    	</div>
    	
    	<div class="form-group mb-lg">
			<label>Quantos têm registro em carteira</label> 
			<input name="registros_carteira" type="text" class="form-control input-lg register" />
    	</div>

		<div class="form-group mb-lg">
			<label>Local(is)</label> 
			 <select id="local" name="hosp" class="form-control input-lg register">
             	<option value="publico" >Público</option>
             	<option value="privado" >Privado</option>
             </select>
		</div>
		
		<div id="local1_plus">  
	
			<div class="form-group mb-lg">
				<label>Qual</label> 
				 <select name="publico_qual" class="form-control input-lg register">
	             	<option value="municipal" >Municipal</option>
	             	<option value="estadual" >Estadual</option>
	             	<option value="federal" >Federal</option>
	             </select>
			</div>
	
			<div class="form-group mb-lg">
				<label>Há quanto tempo trabalha neste local</label> 
				<input name="publico_tempo_trabalho" type="text" class="form-control input-lg register" />
	    	</div>
	
			<div class="form-group mb-lg">
				<label>Horário de trabalho</label> 
				 <select name="publico_horario_trabalho" class="form-control input-lg register">
	             	<option value="m" >Manhã</option>
	             	<option value="t" >Tarde</option>
	             	<option value="n" >Noite</option>
	             </select>
			</div>
			
			<div class="form-group mb-lg">
				<label>Qual a atuação</label> 
				 <select name="atuacao" class="form-control input-lg register">
	             	<option value="posto_saude" >Posto de saúde</option>
	             	<option value="ambulatorio" >Ambulatório</option>
	             	<option value="pronto_socorro" >Pronto Socorro</option>
	             </select>
			</div>
	
			<div class="form-group mb-lg">
				<label>Qual o número de horas/dia trabalhadas neste local</label> 
				<input name="publico_horas_dia" type="text" class="form-control input-lg register" />
	    	</div>
	
			<div class="form-group mb-lg">
				<label>Tem vinculo com hospital(is)</label> 
				 <select name="publico_vinculo_hospital" id="vinculo_hosp" class="form-control input-lg register">
	             	<option value="0" >Não</option>
	             	<option value="1" >Sim</option>
	             </select>
			</div>
	
			<div id="vinculo_hosp_plus" class="form-group mb-lg" style="display: none;">
				<label>Qual(is)</label> 
				<input name="publico_vinculo_hospital_quais" type="text" class="form-control input-lg register" />
	    	</div>
    	
    	</div>
    	
    	<div id="local2_plus" style="display: none;">  

			<div class="form-group mb-lg">
				<label>Qual: Consultório</label> 
				 <select name="privado_consultorio" class="form-control input-lg register">
	             	<option value="0" >Não</option>
	             	<option value="1" >Sim </option>
	             </select>
			</div>
			
			<div class="form-group mb-lg">
				 <select name="privado_qual" class="form-control input-lg register">
	             	<option value="individual" >Individual</option>
	             	<option value="grupo" >Em grupo</option>
	             </select>
			</div>
	
			<div class="form-group mb-lg">
				<label>É filiado a convênio</label> 
				 <select name="filiado_convenio" class="form-control input-lg register">
	             	<option value="0" >Não</option>
	             	<option value="1" >Sim</option>
	             </select>
			</div>
			
			<div class="form-group mb-lg">
				<label>Qual(is)</label> 
				<input name="filiado_convenio_quais" type="text" class="form-control input-lg register" />
	    	</div>
	
			<div class="form-group mb-lg">
				<label>Há quanto tempo trabalha neste local</label> 
				<input name="privado_tempo_trabalho" type="text" class="form-control input-lg register" />
	    	</div>
	
			<div class="form-group mb-lg">
				<label>Horário de trabalho</label> 
				 <select name="privado_horario_trabalho" class="form-control input-lg register">
	             	<option value="m" >Manhã</option>
	             	<option value="t" >Tarde</option>
	             	<option value="n" >Noite</option>
	             </select>
			</div>
		
			<div class="form-group mb-lg">
				<label>Qual o número de horas/dia trabalhadas neste local</label> 
				<input name="privado_horas_dia" type="text" class="form-control input-lg register" />
	    	</div>
	
			<div class="form-group mb-lg">
				<label>Tem vinculo com hospital(is)</label> 
				 <select name="privado_vinculo_hospital" id="vinculo_hosp_pri" class="form-control input-lg register">
	             	<option value="0" >Não</option>
	             	<option value="1" >Sim</option>
	             </select>
			</div>
	
			<div id="vinculo_hosp_pri_plus" class="form-group mb-lg" style="display: none;">
				<label>Qual(is)</label> 
				<input name="privado_vinculo_hospital_quais" type="text" class="form-control input-lg register" />
	    	</div>
	    	
	    	<div class="form-group mb-lg">
				<label>Trabalha aos fins de semana</label> 
				 <select name="trabalha_fds" id="fim_de_sema" class="form-control input-lg register">
	             	<option value="0" >Não</option>
	             	<option value="1" >Sim</option>
	             	<option value="3" >Já trabalhou</option>
	             	<option value="4" >Nunca trabalhou</option>
	             </select>
			</div>
			
			<div style="display: none;" id="fim_de_sema_plus" class="form-group mb-lg">
				<label>Por (há) quanto tempo (anos)</label> 
				<input name="trabalha_fds_quanto_tempo" type="text" class="form-control input-lg register" />
	    	</div>
		</div>
			
		<div class="form-group mb-lg">
			<label>F. Plantões</label> 
		</div>
	
		<div class="form-group mb-lg">
			<label>Trabalha em plantões de urgência há quanto tempo</label> 
			<input name="plantoes_urgencia_quanto_tempo" type="text" class="form-control input-lg register" />
    	</div>
		
		<div class="form-group mb-lg">
			<label>Qual a duração do plantão</label> 
			 <select name="duracao_plantao" class="form-control input-lg register">
             	<option value="0" >4 hs</option>
             	<option value="1" >6 hs</option>
             	<option value="3" >8 hs</option>
             	<option value="4" >12 hs</option>
             </select>
		</div>
		
		<div class="form-group mb-lg">
			<label>Qual a freqüência de plantões por semana ou mês</label> 
			<input name="frequencia_plantao" type="text" class="form-control input-lg register" />
    	</div>
    	
    	<div class="form-group mb-lg">
			<label>O que o faz trabalhar neste plantão</label> 
			 <select name="motivo_trabalha_plantao" class="form-control input-lg register">
             	<option value="preferencia" >Preferência</option>
             	<option value="remuneracao" >Remuneração</option>
             	<option value="outros" >Outros </option>
             </select>
		</div>

		<div class="form-group mb-lg">
			<label>Comentários</label> 
			<input name="comentarios" type="text" class="form-control input-lg register" />
    	</div>

	</div>
</div>
