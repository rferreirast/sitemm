
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

</head>

<body>   

    <div class="container-dadosUsuario">      
      <div class="formularioUsuario">
        
       <form method="POST">

        <div class="textoItem"><p>Dados cadastrais</p></div>

        <label for="inumeros">só números:
    
    <input id="inumeros" onkeypress="mascara(this,soNumeros)" /></label>

      <label for="itelefone">telefone: <input id="itelefone" onkeypress="mascara(this,telefone)" maxlength="14" /></label>
    <label for="icpf">cpf:
        <input id="icpf" onkeypress="mascara(this,cpf)" maxlength="14" /></label>
    <label for="icep">cep:
        <input id="icep" onkeypress="mascara(this,cep)" maxlength="9" /></label>
    <label for="icnpj">cnpj:
        <input id="icnpj" onkeypress="mascara(this,cnpj)" maxlength="18" /></label>

    </form>

    </div>

    </div>


</body>

<script>

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

function soNumeros(v){
    return v.replace(/\D/g,"")
}

function telefone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}

function cpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}

function cep(v){
    v=v.replace(/D/g,"")                //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") //Esse é tão fácil que não merece explicações
    return v
}

function cnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}


</script>

</html>

<!--


<select class="form-field" name="estado_cidade">
                                  <option value="Acre">Acre</option>
                                  <option value="Alagoas">Alagoas</option>
                                  <option value="Amapá">Amapá</option>
                                  <option value="Amazonas">Amazonas</option>
                                  <option value="Bahia">Bahia</option>
                                  <option value="Ceará">Ceará </option>
                                  <option value="Distrito Federal">Distrito Federal</option>
                                  <option value="Espirito Santo">Espírito Santo</option>
                                  <option value="Goiás">Goiás</option>
                                  <option value="Maranhão">Maranhão</option>
                                  <option value="Mato Grosso">Mato Grosso</option>
                                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                  <option value="Minas Gerais">Minas Gerais</option>
                                  <option value="Pará">Pará</option>
                                  <option value="Paraíba">Paraíba</option>
                                  <option value="Paraná">Paraná</option>
                                  <option value="Pernambuco">Pernambuco</option>
                                  <option value="Piauí">Piauí</option>
                                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                                  <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                  <option value="Rondônia">Rondônia</option>
                                  <option value="Roraima">Roraima</option>
                                  <option value="Santa Catarina">Santa Catarina</option>
                                  <option selected value="São Paulo">São Paulo</option>
                                  <option value="Sergipe">Sergipe</option>
                                  <option value="Tocantins">Tocantins</option>
                                </select>


-->
