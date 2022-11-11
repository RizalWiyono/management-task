<?php
    session_start();
    include '../../../src/connection/connection2.php';
    $password = md5($_POST['password']);  
    $email = $_POST['email'];  

        $sql = $pdo->prepare("SELECT * FROM tb_account WHERE email=:a AND password=:b");
        $sql->bindParam(':a', $email);
        $sql->bindParam(':b', $password);
        $sql->execute(); 
        
        $data = $sql->fetch();

        if( !empty($data)){ 
            $_SESSION['password'] = $data['password']; 
            $_SESSION['email'] = $data['email']; 
            $_SESSION['idaccount'] = $data['idaccount']; 
            $_SESSION['role'] = $data['role']; 
            $idAkun = $data['idaccount'];

            if($data['role'] == 'Employee') {
                header("location: ../../user/boards/");   
            }elseif($data['role'] == 'Scrum Master'){
                header("location: ../../scrum-master/boards/");
            }
        }else{ 
            $sqlAdmin = $pdo->prepare("SELECT * FROM tb_organization WHERE email=:a AND password=:b");
            $sqlAdmin->bindParam(':a', $email);
            $sqlAdmin->bindParam(':b', $password);
            $sqlAdmin->execute(); 
            
            $dataAdmin = $sqlAdmin->fetch();

            if( !empty($dataAdmin)){ 
                $_SESSION['password'] = $data['password']; 
                $_SESSION['email'] = $data['email']; 
                $_SESSION['idorganization'] = $data['idorganization'];

                header("location: ../../admin/add-employee/");   
            }else{ 
                header("location: ../login.php?process=failed");
            }
        }

?>