<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          
               
              $idsubcategoria =  $_POST['idsubcategoria'];
              $nomesubcategoria =  $_POST['nomesubcategoria'];
            
              
             $sql = "UPDATE subcategoria SET nomesubcategoria = '$nomesubcategoria' WHERE idsubcategoria = $idsubcategoria;";
             
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Subcategoria " . $nomesubcategoria .  " salva com sucesso! <a href='subcategoria.php'>Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

      

?>


