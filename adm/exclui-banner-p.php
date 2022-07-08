<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
        
             
              $banner =  $_POST['banner']  ; 
                         
              
            $sql = "DELETE FROM banner WHERE idbanner = $banner";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Banner excluido com sucesso! <a href='banner.php'>Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              } 
              
             
          }

      

?>


