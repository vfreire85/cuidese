<?php
            session_start();
           
            require_once 'conn.php';
           
            if(ISSET($_POST['login'])){
                    if($_POST['id'] != "" || $_POST['id'] != ""){
                            $username = $_POST['id'];
                            $password = $_POST['senha'];
                            $sql = "SELECT * FROM usuario WHERE `username`=? AND `password`=? ";
                            $query = $conn->prepare($sql);
                            $query->execute(array($username,$password));
                            $row = $query->rowCount();
                            $fetch = $query->fetch();
                            if($row > 0) {
                                    $_SESSION['user'] = $fetch['mem_id'];
                                    header("location: home_screen.html");
                            } else{
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
