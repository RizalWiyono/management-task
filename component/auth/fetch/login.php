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
            $_SESSION['idorganization'] = $data['idorganization']; 
            $_SESSION['role'] = $data['role']; 
            $idAkun = $data['idaccount'];

            if($data['role'] == 'Employee') {
                header("location: ../../user/boards/");   
            }elseif($data['role'] == 'PM'){
                header("location: ../../scrum-master/boards/");
            }elseif($data['role'] == 'Admin'){
                header("location: ../../admin/add-employee/");   
            }
        }else{  
            header("location: ../login.php?process=failed");
        }

?>