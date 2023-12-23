<?php
    require_once ("conecta.php");

    if (isset($_POST['register'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = ($_POST['senha']);
    
        $sql = "INSERT INTO usuariodoador (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conn->query($sql) === TRUE) {
           
            header("Location: Login.html");
            exit(); 
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
