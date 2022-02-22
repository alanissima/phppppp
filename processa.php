<?php
    // inicia sessao
    session_start();
    include_once("conexao.php");
    
    //filter_input recebe os dados do formulario; limpar os dados que vem do form
    $nome = filter_input(INPUT_STRING,'nome',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_STRING,'email',FILTER_SANITIZE_STRING);
    
    $result_usuario = "INSERT_INTOP usuario (nome, email, created) VALUES ('$nome','$email',NOME())";
    $result_usuario = mysqli_query($conn,$result_usuario);

    // se inserir com sucesso aparesenta mensagem
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<p style='colr:green;'>Usuário cadastrado com sucesso</p>";
        header("Location:index.php");
    } else{
        $_SESSION['msg'] = "<p style='colr:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location:index.php");
    }

    