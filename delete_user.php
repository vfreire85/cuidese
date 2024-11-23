<?php
            session_start();
            require_once 'conn.php';
     
            if(ISSET($_POST['delete_user'])){
                    if($_POST['id'] != ""){
                            try{
                                    $id = $_POST['id'];
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "DELETE FROM usuarios WHERE usuario_id='".$id."'";
                                    $conn->exec($sql);
                            }catch(PDOException $e){
                                    echo $e->getMessage();
                            }
                            $_SESSION['message']=array("text"=>"Usuário deletado!","alert"=>"info");
                            $conn = null;
                            header('location:admin_redefine.html');
                    }else{
                            echo "
                                    <script>alert('Complete os campos necessários!')</script>
                            ";
                    }
            }
    ?>
