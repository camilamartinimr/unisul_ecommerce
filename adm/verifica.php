<?php
session_start();
include("conexao.php");

if(isset($_POST) && !empty($_POST)){
        $strpass = 'Lda35ogAd89';
        $user  = $_POST['user'];
        $pwd = $_POST['pwd'];
        $pwd_strpass = hash_hmac("sha256", $pwd, $strpass);
       
        
        $sql = "SELECT * FROM login WHERE user = '$user' ";
        
                $result=mysqli_query($con, $sql)  ; 
                $numlinhas = mysqli_num_rows($result);
                if($numlinhas != 0){
                    for($i = 0; $i < $numlinhas ;$i++)   {
                            $login = mysqli_fetch_assoc($result);
                            $bdpass = $login['pass'];
                            $bdname = $login['name'];
                            $bduser = $login['user'];


                                        if (password_verify($pwd_strpass, $bdpass)) {
                                            $_SESSION['login'] = array("usuario"=>$bdname);
                                            header('Location: bem-vindo.php');

                                        }else {
                                            echo "Senha Incorreta.";
                                        }



                    }
                
     }else{
            echo "Usuário Inválido";
           }       
       
     
     
       
 
 }else{
      echo 'problemas no post';
 }

?>