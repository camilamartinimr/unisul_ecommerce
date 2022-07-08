<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          //if(array_key_exists('subcategoria', $_POST) && !empty($_POST['subcat'])){
               
              $idcategoria =  $_POST['idcategoria'];
              $nomecategoria =  $_POST['nomecategoria'];
            
              
             $sql = "UPDATE categoria SET nomecategoria = '$nomecategoria' WHERE idcategoria = $idcategoria;";
             
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Categoria " . $nomecategoria .  " salva com sucesso! <a href='categoria.php'>Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

      

?>


