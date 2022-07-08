<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
            
              $ideia =  $_POST['ideia']  ; 
              
              $sql = "DELETE FROM produtoideia WHERE idprodutoideia = $ideia";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Produto Ideia excluido! <a href='produtoideia.php'>Voltar à lista</a> ";
              }else{
                  echo"Não é possível excluir um produto ideia que contenha produtos finais atrelados. <a href='produtoideia.php'>Voltar à lista</a>.";  
                  mysqli_close($con);
              }
              
             
          }

      

?>


