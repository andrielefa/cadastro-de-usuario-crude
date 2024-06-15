<?php
require("classes.php");

$acao = "I";
$inputid = "";
$nome = "";
$email = "";
$senha = "";
$mensagem = "";


if (isset($_POST["acao"])){

    $acao = $_POST["acao"];

    $nome = $_POST["ednome"];
    $email = $_POST["edemail"];

    if ($_POST["acao"] == "I"){

        $senha = $_POST["edsenha"];

        $sql = "insert into tbusuarios (nomecompleto, email, senha) 
						values 
					('$nome', '$email', md5('$senha'))	
					";
        mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));

        $acao = "A";

        $sql = "select last_insert_id() as ultimoid";
        $res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));

        while ($row = mysqli_fetch_array($res)){
            $id = $row["ultimoid"];
        }

        $inputid = "
			<input type='hidden' name='id' value='$id'>
			";

        $mensagem = "Usuário incluído com sucesso!";

    }


    if ($_POST["acao"] == "A"){
        $id = $_POST["id"];

        $inputid = "
			<input type='hidden' name='id' value='$id'>
			";

        $sql = "update tbusuarios set 
						nomecompleto = '$nome', 
						email = '$email' 
						
					where id = '$id'";
        mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));

        $mensagem = "Usuário atualizado com sucesso!";


        $sql = "select last_insert_id() as ultimoid";
        $res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));

        while ($row = mysqli_fetch_array($res)){
            $id = $row["ultimoid"];
        }
    }
    if ($_POST["acao"] == "E"){
        $id = $_POST["id"];

        $inputid = "";

        $sql = "delete from tbusuarios where id = '$id'";
        mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
        $acao = "I";

        $nome = "";
        $email = "";
        $senha = "";

        $mensagem = "Usuário excluído com sucesso!";

    }



}else{

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "select * from tbusuarios where id = '$id'";
        $res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));

        $acao = "A";

        $inputid = "
			<input type='hidden' name='id' value='$id'>
			";

        while ($row = mysqli_fetch_array($res)){
            $nome = $row["nomecompleto"];
            $email = $row["email"];
        }


    }
}

?>

<h1>Usuário</h1>

<hr>
<a href="usuario_lista.php">Listar</a>
<hr>

<form action="usuario_form.php" method="POST" id="form1">

    <table border='1' width="400">
        <input type="hidden" name="acao" id="acao" value="I">

        <?
        echo "
		$inputid
		";

        ?>



        <tr>
            <td><b>Nome</b></td>
            <td><input type="text" name="ednome" id="ednome" value=""required></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><input type="text" name="edemail" id="edemail" value="" required></td>
        </tr>
        <?
        if ($acao == "I"){

        ?>

        <tr>
            <td><b>Senha</b></td>
            <td><input type="text" name="edsenha" id="edsenha" required></td>
        </tr>
        <tr>
            <td><b>Digite a senha novamente</b></td>
            <td><input type="text" name="edsenha1" id="edsenha1" required></td>
        </tr>
            <?
        }
        ?>

        <input type="button" onclick="verificar()"  value="Salvar"/>
        <?
        if ($acao == "A"){
            ?>
            <input type="button" onclick="excluir()"  value="Excluir"/>
            <input type="button" onclick="atualizasenha(<?echo $id;?>)"  value="Alterar senha"/>
            <?
        }
        ?>

    </table>

    <br>

    <input type="button" onclick="verificar()"  value="Salvar"/>
</form>


<script>

    function validaremail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    function verificar(){
        nome = document.getElementById("ednome");
        email = document.getElementById("edemail");


        senha = document.getElementById("edsenha");
        senha1 = document.getElementById("edsenha1");


        if (nome.value == ""){
            alert("O nome é obrigatório!");
            return;
        }
        if (email.value == ""){
            alert("O email é obrigatório!");
            return;
        }

        if (!validaremail(email.value)){
            alert("O email é inválido! Favor colocar no formato 'a@b.c'");
            return;
        }



        if (senha.value == ""){
            alert("O valor da senha é obrigatório!");
            return;
        }

        if (senha.value == senha1.value){
            formulario = document.getElementById("form1");
            formulario.submit();

        }else{
            alert('Por favor, preencha as senhas com mesmo valor, pois elas são diferentes!!!! ');
        }

    }


    function excluir(){

        varacao = document.getElementById("acao");
        varacao.value = "E";
        formulario = document.getElementById("form1");
        formulario.submit();
    }
    function atualizasenha(id){
        window.location.replace('usuario_atualizasenha.php?&id='+id);
    }


</script>

