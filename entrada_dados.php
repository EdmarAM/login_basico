<?php
    require_once ("conecta.php");

    if (isset($_POST['register'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = ($_POST['senha']);
    
        $sql = "INSERT INTO usuariodoador (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conn->query($sql) === TRUE) {
            // Registro bem-sucedido, redirecione para a página de login
            header("Location: Login.html");
            exit(); // Certifique-se de sair para evitar a execução adicional do código
        } else {
            echo "Erro no registro: " . $conn->error;
        }
    }
    

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $sql = "SELECT id, nome, senha FROM usuariodoador WHERE email='$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($senha == $row['senha']) {
                // Login bem-sucedido, redirecione para a página inicial
                header("Location: home.html");
                exit();
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuário não encontrado!";
        }
    }
    
    $conn->close();
    ?>