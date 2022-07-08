<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          
              $subcat =  $_POST['subcat']  ;  
              $idideia =  $_POST['ideia']  ; 
              $foto1 =  $_FILES['foto1']['name']  ; 
              $foto2 =  $_FILES['foto2']['name']  ;
              $foto3 =  $_FILES['foto3']['name']  ;
              $preco =  $_POST['preco']  ; 
              $desconto =  $_POST['desconto']  ; 
              $variacao =  $_POST['variacao']  ; 
       
              $uploaddir = '../img/';
              $uploadfile1 = $uploaddir . basename($foto1);  
              $uploadfile2 = $uploaddir . basename($foto2);
              $uploadfile3 = $uploaddir . basename($foto3); 
           
              if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile1) && move_uploaded_file($_FILES['foto2']['tmp_name'], $uploadfile2) && move_uploaded_file($_FILES['foto3']['tmp_name'], $uploadfile3)) {
              
                    $sql = "INSERT INTO produtofinal (idprodutofinal, idprodutoideia, foto1, foto2, foto3, preco, desconto, variacao) 
                        VALUES (NULL, $idideia, '$foto1', '$foto2', '$foto3',  $preco, $desconto, '$variacao')";

                      if(mysqli_query($con, $sql) === TRUE){
                          echo "Dados produtofinal inseridos com sucesso! <a href='produtofinal.php'>Voltar à lista</a>";
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


