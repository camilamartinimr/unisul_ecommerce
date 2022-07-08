<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
             
              $banner =  $_POST['banner']  ; 
              $imagem =  $_FILES['imagem']['name']  ; 
              $descricao =  $_POST['descricao']  ; 
                 
            $uploaddir = '../img/site/';
            $uploadfile = $uploaddir . basename($imagem);  
              
           
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
               // echo "Arquivo válido e enviado com sucesso.\n";  
                $sql = "UPDATE banner SET imagem = '$imagem', descricao = '$descricao' WHERE idbanner = $banner";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Dados banner editados com sucesso! <a href='banner.php'>Voltar à lista</a>  ";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              } 
              
             } else {
              //  echo "Possível ataque de upload de arquivo!\n";
                 echo "Erro no upload da imagem";
            }

           // echo 'Aqui está mais informações de debug:';
           // print_r($_FILES);

             
             
          }

       
?>




     