<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          //if(array_key_exists('subcategoria', $_POST) && !empty($_POST['subcat'])){
               
              $idprodutoideia =  $_POST['idprodutoideia'];
              $nomeproduto =  $_POST['nomeprodutoideia'];
              $destaque =  $_POST['destaque'];
              $marca =  $_POST['marca'];
              $descricao =  $_POST['descricao'];
              $especificacao =  $_POST['especificacao'];
              
             $sql = "UPDATE produtoideia SET nomeprodutoideia = '$nomeproduto',  descricao = '$descricao', especificacao = '$especificacao', marca = '$marca', destaque = $destaque WHERE idprodutoideia = $idprodutoideia;";
             
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Dados produtoideia editados com sucesso! <a href='produtoideia.php'> Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

      

?>




