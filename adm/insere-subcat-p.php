<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          //if(array_key_exists('subcategoria', $_POST) && !empty($_POST['subcat'])){
              $idcategoria =  $_POST['idcategoria']  ;   
              $subcategoria =  $_POST['subcategoria']  ; 
              
              $sql = "INSERT INTO subcategoria (idsubcategoria, nomesubcategoria, idcategoria) VALUES (NULL, '$subcategoria', $idcategoria)";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Subcategoria inserida com sucesso <a href='subcategoria.php'>Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

      

?>


