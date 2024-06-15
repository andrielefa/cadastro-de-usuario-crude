


<h1>Usuários</h1>

<hr>

<a href="usuario_form.php">INCLUIR NOVO USUÁRIO</a>

<br><br>

<form method="GET" action="usuario_lista.php">
    Pesquisar usuário <input autofocus placeholder="Pesquise o usuário aqui" title="Digite parte do nome ou do email aqui" type="text" name="edpesquisa" value=""><input type="submit" value="Pesquisar">

</form>
<hr>



<table border='1' width="100%">
    <tr>
        <td><b>ID</b></td>
        <td><b>Nome</b></td>
        <td><b>Email</b></td>
        <td>Comandos</td>
    </tr>


    <tr>
        <td><a href='usuario_form.php?id=12'>08</a></td>
        <td><a href='usuario_form.php?id=12'>Andreza Silva</a></td>
        <td><a href='usuario_form.php?id=12'><span class="__cf_email__" data-cfemail="02636c66716b6e74633a3342656f636b6e2c616d6f">[email&#160;]</span></a></td>
        <td><center>
                <a title='Excluir usuário' href='javascript:apagar(12);'><img height='24' src='delete.png'></a>&nbsp;
                <a title='Alterar senha do usuário' href='javascript:alterar(12);'><img height='24' src='key.png'></a>
            </center>
        </td>

    </tr>
    <tr>
        <td><a href='usuario_form.php?id=16'>07</a></td>
        <td><a href='usuario_form.php?id=16'>guilherme</a></td>
        <td><a href='usuario_form.php?id=16'><span class="__cf_email__" data-cfemail="1f727e6a6d767c7670316c7673697e5f2d2e2d2c317c7072">[email&#160;protected]</span></a></td>
        <td><center>
                <a title='Excluir usuário' href='javascript:apagar(16);'><img height='24' src='delete.png'></a>&nbsp;
                <a title='Alterar senha do usuário' href='javascript:alterar(16);'><img height='24' src='key.png'></a>
            </center>
        </td>

    </tr>
    <tr>
        <td><a href='usuario_form.php?id=10'>06</a></td>
        <td><a href='usuario_form.php?id=10'>Victor</a></td>
        <td><a href='usuario_form.php?id=10'><span class="__cf_email__" data-cfemail="284a475a494a41444468191a1b064b4745">[email&#160;protected]</span></a></td>
        <td><center>
                <a title='Excluir usuário' href='javascript:apagar(10);'><img height='24' src='delete.png'></a>&nbsp;
                <a title='Alterar senha do usuário' href='javascript:alterar(10);'><img height='24' src='key.png'></a>
            </center>
        </td>

    </tr>
    <tr>
        <td><a href='usuario_form.php?id=11'>11</a></td>
        <td><a href='usuario_form.php?id=11'>Andriele</a></td>
        <td><a href='usuario_form.php?id=11'><span class="__cf_email__" data-cfemail="ff929e8a909396899a968d9e8c9693899ecfcbc6bf98929e9693d19c9092">[email&#160;protected]</span></a></td>
        <td><center>
                <a title='Excluir usuário' href='javascript:apagar(11);'><img height='24' src='delete.png'></a>&nbsp;
                <a title='Alterar senha do usuário' href='javascript:alterar(11);'><img height='24' src='key.png'></a>
            </center>
        </td>

    </tr>
</table>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    function apagar(idaexcluir){
        var resposta = confirm("Você quer realmente excluir o usuário?");
        if (resposta) {
            window.location.replace('usuario_lista.php?acao=DEL&edpesquisa=&id='+idaexcluir);
        }
    }
    function alterar(id){
        window.location.replace('usuario_atualizasenha.php?&id='+id);

    }



</script>
