<?php 
  include("conexao.php");
 
          if(isset($_POST) && !empty($_POST)){
          //if(array_key_exists('subcategoria', $_POST) && !empty($_POST['subcat'])){
              $idcategoria =  $_POST['idcategoria']  ;   
              $idsubcategoria =  $_POST['subcat'];
              $nomeproduto =  $_POST['nomeproduto'];
              $destaque =  $_POST['destaque'];
              $marca =  $_POST['marca'];
              $descricao =  $_POST['descricao'];
              $especificacao =  $_POST['especificacao'];
              
              $sql = "INSERT INTO produtoideia (idprodutoideia, nomeprodutoideia, descricao, especificacao, marca, idcategoria, idsubcategoria, destaque) VALUES (NULL, '$nomeproduto', '$descricao', '$especificacao', '$marca',  $idcategoria, $idsubcategoria, $destaque)";
              
              if(mysqli_query($con, $sql) === TRUE){
                  echo "Dados produtoideia inseridos com sucesso! Agora, insira o Produto Final. <a href='produtoideia.php'> Voltar à lista</a>";
              }else{
                  echo"Erro" .$sql . "<br>" . mysqli_error($con);
                  mysqli_close($con);
              }
              
             
          }

      

?>


