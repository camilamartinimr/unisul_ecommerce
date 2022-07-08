<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          //if(array_key_exists('subcategoria', $_POST) && !empty($_POST['subcat'])){
              $categoria =  $_POST['categoria']  ;   
             
              
              $sql = "INSERT INTO categoria (idcategoria, nomecategoria) VALUES (NULL, '$categoria')";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Categoria inserida! <a href='categoria.php'>Voltar à Lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

   

?>


