<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
            
              $final =  $_POST['final']  ; 
              
              $sql = "DELETE FROM produtofinal WHERE idprodutofinal = $final";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Produto Final excluido! <a href='produtofinal.php'>Voltar à lista</a> ";
              }else{
                  echo"Não foi possível excluir o produto final. <a href='produtoideia.php'>Voltar à lista</a>.";  
                  mysqli_close($con);
              }
              
             
          }

      

?>


