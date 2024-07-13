 <?php

  ?>

 <!DOCTYPE html>
 <html lang="pt-BR">

 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Cadastro de Programador</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
   <link rel="stylesheet" href="./styles/style.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet" />
 </head>

 <body>
   <form id="programadorForm" action="save_programmer.php" enctype="multipart/form-data" method="POST">
     <nav>Cadastro Programador</nav>
     <div class="cadaster">
       <!--Nome-->
       <div class="cadaster-field programmer">
         <input type="text" required autocomplete="off" name="nome" writingsuggestions="disabled" id="nome" maxlength="60" value="Norton Almeida Pontes" />
         <label for="nome" required autocomplete="off" writingsuggestions="disabled" title="Nome" data-title="Nome"></label>
       </div>
       <!--CPF-->
       <div class="cadaster-field programmer" id="div-cpf">
         <input type="text" required autocomplete="off" name="cpf" writingsuggestions="disabled" id="cpf" maxlength="14" value="23680882882" />
         <label for="cpf" required autocomplete="off" writingsuggestions="disabled" title="CPF" data-title="CPF"></label>
         <div id="cpfErrorMessage" class="error-message">.</div>
       </div>
       <!-- Email -->
       <div class="cadaster-field programmer">
         <input type="text" required autocomplete="off" name="email" writingsuggestions="disabled" id="email" maxlength="256" value="nortonalmeida08@gmail.com" />
         <label for="email" required autocomplete="off" writingsuggestions="disabled" title="E-mail" data-title="E-mail"></label>
       </div>
       <!-- Telefone -->
       <div class="cadaster-field programmer">
         <input type="text" required autocomplete="off" name="telefone" writingsuggestions="disabled" id="telefone" maxlength="16" value="62982791299" />
         <label for="telefone" required autocomplete="off" writingsuggestions="disabled" title="Telefone" data-title="Telefone"></label>
       </div>
       <!-- Genero -->
       <div class="cadaster-field programmer gender">
         <label for="genero" required autocomplete="off" writingsuggestions="disabled" title="Gênero" data-title="Gênero"></label>
         <select id="genero" name="genero" title="Gênero">
           <option value=""></option>
           <option value="Feminino">Feminino</option>
           <option value="Masculino" selected>Masculino</option>
           <option value="Outro">Outro</option>
         </select>
       </div>
       <!-- Data de Nascimento -->
       <div class="cadaster-field programmer date">
         <input type="date" required autocomplete="off" name="dataNascimento" writingsuggestions="disabled" id="dataNascimento" value="2003-09-08" />
         <label for="dataNascimento" required autocomplete="off" writingsuggestions="disabled" data-title="Data Nascimento" title="Data Nascimento"></label>
       </div>
     </div>
     <nav>Linguagens de Programação</nav>
     <div class="container">
       <!--Select de Linguagens-->
       <div class="select-container">
         <select id="multipleSelect" name="linguagens[]" title="multiple" multiple>
           <option value="Php">Php</option>
           <option value="C">C</option>
           <option value="C++">C++</option>
           <option value="C#">C#</option>
           <option value="Ruby">Ruby</option>
           <option value="Python">Python</option>
           <option value="Java">Java</option>
           <option value="Kotlin">Kotlin</option>
           <option value="JavaScript">JavaScript</option>
           <option value="Swift">Swift</option>
           <option value="GO(Golang)">GO(Golang)</option>
           <option value="R">R</option>
         </select>
         <button type="button" id="addBtn">
           <i class="fa fa-plus" aria-hidden="true"></i>
           Add
         </button>
       </div>
       <div class="grid-container" id="selectedValuesGrid"></div>
     </div>
     <nav>Cadastro Endereço</nav>
     <div class="cadaster">
       <!--CEP-->
       <div class="cadaster-field adress">
         <input type="text" required autocomplete="off" name="cep" writingsuggestions="disabled" id="cep" maxlength="9" value="74715280" />
         <label for="cep" required autocomplete="off" writingsuggestions="disabled" title="CEP" data-title="CEP"></label>
       </div>
       <!--Número-->
       <div class="cadaster-field adress">
         <input type="number" required autocomplete="off" name="numero" writingsuggestions="disabled" id="numero" min="0" oninput="this.value = Math.abs(this.value)" value="0" />
         <label for="numero" required autocomplete="off" writingsuggestions="disabled" title="Número" data-title="Número"></label>
       </div>
       <!--Logradouro-->
       <div class="cadaster-field adress">
         <input type="text" required autocomplete="off" name="logradouro" writingsuggestions="disabled" id="logradouro" maxlength="15" value="Rua" />
         <label for="logradouro" required autocomplete="off" writingsuggestions="disabled" title="Logradouro" data-title="Logradouro"></label>
       </div>
       <!--Bairro-->
       <div class="cadaster-field adress">
         <input type="text" required autocomplete="off" name="bairro" writingsuggestions="disabled" id="bairro" maxlength="60" value="Jardim Novo Mundo" />
         <label for="bairro" required autocomplete="off" writingsuggestions="disabled" title="Bairro" data-title="Bairro"></label>
       </div>
       <!--UF-->
       <div class="cadaster-field adress uf">
         <label for="uf" required autocomplete="off" writingsuggestions="disabled" data-title="UF" title="UF"></label>
         <select id="uf" name="uf" title="UF">
           <option value=""></option>
           <option value="AC">AC</option>
           <option value="AL">AC</option>
           <option value="AP">AP</option>
           <option value="AM">AM</option>
           <option value="BA">BA</option>
           <option value="CE">CE</option>
           <option value="DF">DF</option>
           <option value="ES">ES</option>
           <option value="GO" selected>GO</option>
           <option value="MA">MA</option>
           <option value="MT">MT</option>
           <option value="MS">MS</option>
           <option value="MG">MG</option>
           <option value="PA">PA</option>
           <option value="PB">PB</option>
           <option value="PR">PR</option>
           <option value="PE">PE</option>
           <option value="PI">PI</option>
           <option value="RJ">RJ</option>
           <option value="RN">RN</option>
           <option value="RS">RS</option>
           <option value="RO">RO</option>
           <option value="RR">RR</option>
           <option value="SC">SC</option>
           <option value="SP">SP</option>
           <option value="SE">SE</option>
           <option value="TO">TO</option>
         </select>
       </div>
       <!--Cidade -->
       <div class="cadaster-field adress">
         <input type="text" required autocomplete="off" name="cidade" writingsuggestions="disabled" id="cidade" maxlength="60" value="Goiânia" />
         <label for="cidade" required autocomplete="off" writingsuggestions="disabled" title="Cidade" data-title="Cidade"></label>
       </div>
       <!-- Complemento -->
       <div class="cadaster-field complemento">
         <input type="text" required autocomplete="off" name="complemento" writingsuggestions="disabled" id="complemento" maxlength="256" value="Cond Pt belo 2" />
         <label for="complemento" required autocomplete="off" writingsuggestions="disabled" title="Complemento" data-title="Complemento"></label>
       </div>
     </div>
     <input type="file" id="imagem" name="imagem" accept="image/*" />
     <div class="footer">
       <button type="submit" id="back" formaction="/table.php" type="button" style="margin-bottom: 8rem; margin-top: 4rem; margin-right: 2rem;">
         <i class="fa fa-arrow-left" aria-hidden="true"></i>
         Voltar
       </button>
       <button type="submit" id="submit" style="margin-bottom: 8rem; margin-top: 4rem">
         <i class="fa fa-save" aria-hidden="true"></i>
         Salvar
       </button>
     </div>
   </form>
   <script src="./js/cpf_mask_validate.js"></script>
   <script src="./js/telefone_mask.js"></script>
   <script src="./js/multiple_select.js"></script>
   <script src="./js/cep_mask.js"></script>

<!--   <script>-->
<!--     document.getElementById('programadorForm').onsubmit = function(event) {-->
<!--       event.preventDefault();-->
<!---->
<!--       var formData = new FormData(this);-->
<!---->
<!--       fetch(this.action, {-->
<!--           method: this.method,-->
<!--           body: formData-->
<!--         })-->
<!--         .then(response => response.text())-->
<!--         .then(data => {-->
<!--           alert(data);-->
<!--         })-->
<!--         .catch(error => {-->
<!--           console.error('Erro:', error);-->
<!--         });-->
<!--     };-->
<!--   </script>-->
 </body>

 </html>