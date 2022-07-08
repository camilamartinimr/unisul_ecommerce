<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
            
              $subcategoria =  $_POST['subcat']  ; 
              
              $sql = "DELETE FROM subcategoria WHERE idsubcategoria = $subcategoria";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Subategoria excluida! <a href='subcategoria.php'>Voltar à lista</a> ";
              }else{
                  echo"Não é possível excluir uma subcategoria que contenha produtos atrelados. <a href='subcategoria.php'>Voltar à lista</a>.";  
                  mysqli_close($con);
              }
              
             
          }

      

?>