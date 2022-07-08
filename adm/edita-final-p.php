<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
              $foto1 =  $_FILES['foto1']['name']  ; 
              $foto2 =  $_FILES['foto2']['name']  ;
              $foto3 =  $_FILES['foto3']['name']  ;
              $preco =  $_POST['preco']  ; 
              $desconto =  $_POST['desconto']  ;
              $variacao =  $_POST['variacao']  ;
              $idprodutofinal =  $_POST['idprodutofinal']  ;
              
              $uploaddir = '../img/';
              $uploadfile1 = $uploaddir . basename($foto1);  
              $uploadfile2 = $uploaddir . basename($foto2);
              $uploadfile3 = $uploaddir . basename($foto3); 
              
               if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile1) && move_uploaded_file($_FILES['foto2']['tmp_name'], $uploadfile2) && move_uploaded_file($_FILES['foto3']['tmp_name'], $uploadfile3)) {
              
              $sql = "UPDATE produtofinal SET foto1 = '$foto1', foto2 = '$foto2', foto3 = '$foto3', preco = $preco, desconto = $desconto, 
              variacao =  '$variacao'  WHERE idprodutofinal = $idprodutofinal;";
             
                      if(mysqli_query($con, $sql) === TRUE){

                               echo "Dados produtofinal editados com sucesso! <a href='produtofinal.php'>Voltar à lista</a>";


                      }else{
                          echo"Problema ao excluir Produto Final" .$sql . "<br>" . mysqli_error($con);
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