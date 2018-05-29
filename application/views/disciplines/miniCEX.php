
<div class="block-flat">
    <div class="content">
        <div class="block-flat">
            <div class="content">
                <h2>MINIEXERCÍCIO CLÍNICO AVALIATIVO – MINIEX</h2>
                <form action="http://localhost/ead/?miniCEX" 
                      method="post" accept-charset="utf-8">
                    <div class="form-group mb-lg">
                        <label for="examinador">Examinador: </label>
                        <input type="text" name="examinador" 
                               value="" class="form-control input-lg register" 
                               id="examinador" maxlength="255">
                        <label for="data">Data: </label>
                        <input type="text" name="data" 
                               value="" class="form-control input-lg register" 
                               id="data" placeholder="DD-MM-YYYY">
                    </div>
                    <div class="form-group mb-lg">
                        <label for="estudante">Estudante: </label>
                        <input type="text" name="estudante" value="" 
                               class="form-control input-lg register" 
                               id="estudante" maxlength="255">
                    </div>
                    <p><h3>Queixa Principal / DX:</h3><p>
                    <div class="form-group mb-lg">
                        <label for="local">Local: </label>
                        <select id="local" class="form-control input-lg register">
                            <option value="0">Ambulatório</option>
                            <option value="1">Enfermaria</option>
                            <option value="2">Emergência</option>
                            <option value="3">Outros</option>
                        </select>
                    </div>
                    <div class="form-group mb-lg">
                        <p><h4>Paciente: </h4></p>
                        <label for="idade">Idade: </label>
                        <input type="number" name="idade" value="" 
                               class="form-control input-lg register" 
                               id="idade" maxlength="3">
                        <label for="sexo">Sexo: </label>
                        <input type="text" name="sexo" value="" 
                               class="form-control input-lg register" 
                               id="sexo" maxlength="20">
                        <label for="consulta">Consulta: </label>
                        <select id="consulta" class="form-control input-lg register">
                            <option value="0">Primeira Consulta</option>
                            <option value="1">Retorno</option>
                        </select>
                    </div>
                    <div class="form-group mb-lg">
                        <label for="complexidade">Complexidade: </label>
                        <select id="local" class="form-control input-lg register">
                            <option value="0">Baixa</option>
                            <option value="1">Moderada</option>
                            <option value="2">Alta</option>
                        </select>
                    </div>
                    <div class="form-group mb-lg">
                        <label for="foco">Foco: </label>
                        <select id="foco" class="form-control input-lg register">
                            <option value="0">Coleta de dados</option>
                            <option value="1">Diagnóstico</option>
                            <option value="2">Tratamento</option>
                            <option value="3">Aconselhamento</option>
                        </select>
                    </div>    
                </form>
            </div>
        </div>
        
        
        
        <?php
        /*   echo form_open("");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Examinador: ", "examinador");
           echo form_input(array(
               "name" => "examinador",
               "class" => "form-control input-lg register",
               "id" => "examinador",
               "maxlength" => "255"
           ));

           echo form_label("Data: ", "data");
           echo form_input(array(
               "name" => "data",
               "class" => "form-control input-lg register",
               "id" => "data",
               "placeholder" => "DD-MM-YYYY"
           ));           
           echo ("</div>");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Estudante: ", "estudante");
           echo form_input(array(
               "name" => "estudante",
               "class" => "form-control input-lg register",
               "id" => "estudante",
               "maxlength" => "255"
           ));
           echo ("</div>");

           echo ("<p><h3>Queixa Principal / DX:</h3></p>");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Local: ", "local");
           echo form_dropdown("local",
                   array(
                    "Ambulatório",
                    "Enfermaria",
                    "Emergência",
                    "Outros"               
           ));
           echo ("</div>");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Paciente: ");
           echo form_label("Idade: ", "idade");
           echo form_input(array(
               "name" => "idade",
               "class" => "form-control input-lg register",
               "id" => "idade",
               "maxlength" => "3",
               "type" => "number"
           ));
           echo form_label("Sexo: ", "sexo");
           echo form_input(array(
               "name" => "sexo",
               "class" => "form-control input-lg register",
               "id" => "sexo",
               "maxlength" => "20"
           ));
           echo form_label("Consulta: ", "consulta");
           echo form_dropdown("consulta",
                   array(
                    "Primeira Consulta",
                    "Retorno"              
           ));
           echo ("</div>");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Complexidade: ", "complexidade");
           echo form_dropdown("local",
                   array(
                    "Baixa",
                    "Moderada",
                    "Alta"
           ));
           echo ("</div>");

           echo ("<div class='form-group mb-lg'>");
           echo form_label("Foco: ", "foco");
           echo form_dropdown("foco",
                   array(
                    "Coleta de dados",
                    "Diagnóstico",
                    "Tratamento",
                    "Aconselhamento"
           ));
           echo ("</div>");
*/
        ?>
    </div>
</div>


