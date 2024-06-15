<?php
	require("classes.php");
	
	$acao = "I";
	$inputid = "";	
	$nome = "";
	$email = "";
	$senha = "";
	$mensagem = "";
		
	
	if (isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "select * from tbusuarios where id = '$id'";
		$res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
			
		while ($row = mysqli_fetch_array($res)){
			$nome = $row["nomecompleto"];
			$email = $row["email"];
		}
		
	}else{
		if (isset($_POST["id"])){
			$senha = $_POST["edsenha"];
			$id = $_POST["id"];
			
			$sql = "update tbusuarios set senha = md5('$senha') where id = '$id'";
			$res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
			
			
			$sql = "select * from tbusuarios where id = '$id'";
			$res = mysqli_query($dbconexao, $sql) or die("Falha ao rodar sql: $sql - Mensagem: ".mysqli_error($dbconexao));
			
			while ($row = mysqli_fetch_array($res)){
				$nome = $row["nomecompleto"];
				$email = $row["email"];
			}
			$mensagem = "Senha atualizada com sucesso!";
			
		}else{
			die("Acesso não autorizado!");
		}
		
	}
	
?>

<h1>Usuário - Atualizar senha</h1>

<hr>
<a href="usuario_lista.php">Listar</a>
<hr>

<form action="usuario_atualizasenha.php" method="POST" id="form1">

	<table border='1' width="400">
		<input type="hidden" name="acao" id="acao" value="A">
		<input type="hidden" name="id" id="id" value="<?echo $id;?>">
		
		<tr>
			<td><b>Nome</b></td>
			<td><?echo $nome;?></td>
		</tr>
		<tr>
			<td><b>Email</b></td>
			<td><?echo $email;?></td>
		</tr>
		<tr>
			<td><b>Senha</b></td>
			<td><input type="password" name="edsenha" id="edsenha" required></td>
		</tr>
		<tr>
			<td><b>Digite a senha novamente</b></td>
			<td><input type="password" name="edsenha1" id="edsenha1" required></td>
		</tr>
	</table>
	<br>
	<input type="button" onclick="verificar()"  value="Salvar"/>
</form>


<script>

function verificar(){
	senha = document.getElementById("edsenha");
	senha1 = document.getElementById("edsenha1");
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

<?
	if ($mensagem != ""){
		echo "alert('$mensagem');";
	}

?>

</script>

