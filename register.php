<?php
            session_start();
            require_once 'conn.php';
     
            if(ISSET($_POST['register'])){
                    if($_POST['nome'] != "" || $_POST['id'] != "" || $_POST['senha'] != ""){
                            try{
                                    $nome = $_POST['nome'];
                                    $id = $_POST['id'];
                                    $senha = $_POST['senha'];
                                    $posto = $_POST['posto'];
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "INSERT INTO usuarios (usuario_id, usuario_nome, usuario_senha, posto_id) VALUES ('$id', '$nome', '$senha', '$posto')";
                                    $conn->exec($sql);
                            }catch(PDOException $e){
                                    echo $e->getMessage();
                            }
                            $_SESSION['message']=array("text"=>"Usuário criado!","alert"=>"info");
                            $conn = null;
                            header('location:admin_redefine.html');
                    }else{
                            echo "
                                    <script>alert('Complete os campos necessários!')</script>
                            ";
                    }
            }
    ?>
