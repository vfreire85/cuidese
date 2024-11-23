<?php
            session_start();
            require_once 'conn.php';
     
            if(ISSET($_POST['update_user'])){
                    if($_POST['id'] != "" || $_POST['senha'] != ""){
                            try{
                                    $id = $_POST['id'];
                                    $senha = $_POST['senha'];
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "UPDATE usuarios SET usuario_senha='".$senha."' WHERE usuario_id='".$id."'";
                                    $conn->exec($sql);
                            }catch(PDOException $e){
                                    echo $e->getMessage();
                            }
                            $_SESSION['message']=array("text"=>"Senha alterada!","alert"=>"info");
                            $conn = null;
                            header('location:redefine.html');
                    }else{
                            echo "
                                    <script>alert('Complete os campos necessários!')</script>
                            ";
                    }
            }
    ?>
