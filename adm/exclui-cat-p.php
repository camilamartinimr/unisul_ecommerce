<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
            
              $categoria =  $_POST['cat']  ; 
              
              $sql = "DELETE FROM categoria WHERE idcategoria = $categoria";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Categoria excluida! <a href='categoria.php'>Voltar à lista</a> ";
              }else{
                  echo"Não é possível excluir uma categoria que contenha subcategorias e produtos atrelados. <a href='categoria.php'>Voltar à lista</a>.";  
                  mysqli_close($con);
              }
              
             
          }

      

?>


