<?php
            session_start();
           
            require_once 'conn.php';
           
            if(ISSET($_POST['login'])){
                    if($_POST['id'] != "" || $_POST['senha'] != ""){
                            $username = $_POST['id'];
                            $password = $_POST['senha'];
                            $sql = "SELECT * FROM usuarios WHERE usuario_id='".$username."' AND usuario_senha='".$password."'";
                            $query = $conn->prepare($sql);
                            $query->execute(array($username,$password));
                            $row = $query->rowCount();
                            $fetch = $query->fetch();
                            if($row > 0) {
                                    return true;
                            } else{
                                    return false;
                                    echo "
                                    <script>alert('Usuário ou senha inválidos!')</script>
                                    <script>window.location = 'login_form.html'</script>
                                    ";
                            }
                    }else{
                            echo "
                                    <script>alert('Complete os campos faltantes!')</script>
                                    <script>window.location = 'login_form'</script>
                            ";
                    }
            }
    ?>
