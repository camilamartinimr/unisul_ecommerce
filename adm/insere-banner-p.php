<?php 
  include("conexao.php");
 
      if(isset($_POST) && !empty($_POST)){
             
            $ideia = $_POST['ideia']  ; 
            $descricao = $_POST['descricao']  ; 

            $imagem = $_FILES['imagem']['name']  ; 
           
            $dest_dir = '../img/site/';
            $dest_imagem = $dest_dir . basename($imagem); 
            
          

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dest_imagem)) {
               // echo "Arquivo válido e enviado com sucesso.\n";
                $sql = "INSERT INTO banner (idbanner, idproduto, imagem, descricao) 
                VALUES (NULL, $ideia, '$imagem', '$descricao')";

                  if(mysqli_query($con, $sql) === TRUE){
                      echo "Dados banner inseridos com sucesso! <a href='banner.php'>Voltar à lista</a> ";
                  }else{
                      echo"Erro" .$sql . "<br>" . mysqli_error($con);
                      mysqli_close($con);
                  } 


            } else {
                //echo "Possível ataque de upload de arquivo!\n";
                 echo "Erro no upload da imagem.";
            }

     //   echo 'Aqui está mais informações de debug:';
     //   print_r($_FILES);

      }

      

?>


