<?php 
include("adm-head.php");
//include("../laravel-url.php");
@$varsubcat = $_GET['subcat'];
?>

<body>
  <?php include("adm-topo.php"); ?>
 <div class="container mt-5">
  <div class="row">
      <div class="col-lg-6 py-4 text-right "><h1>Produto Final</h1>  </div>
       <div class="col-lg-3 py-4 text-left "><a href="insere-final.php"> Inserir Novo Produto Final</a></div>
       <div class="col-lg-3 py-4 text-left "> 
                <form method="get" >
                 <div class="form-group">
                  
                   <select onchange="if(this.value != 0) { this.form.submit(); }" onsubmit="false" class="form-control" name="subcat" >
                         <option>Filtrar</option>
                         <?php 
                       
                            $subcatsql = "SELECT s.*, c.* FROM subcategoria AS s INNER JOIN categoria AS c ON c.idcategoria = s.idcategoria ORDER BY nomecategoria ASC";
                            $subcatquery=mysqli_query($con,$subcatsql);
                            $subcatlinhas = mysqli_num_rows($subcatquery); 
                                for($x = 0;$x < $subcatlinhas ;$x++)   {
                                $subcategoria=mysqli_fetch_assoc($subcatquery);
                                $idsubcategoria = $subcategoria['idsubcategoria'];
                                $nomecategoria = $subcategoria['nomecategoria'];
                                $nomesubcategoria = $subcategoria['nomesubcategoria'];
                                     
                                   
                                  echo "<option id value='{$idsubcategoria}'> {$nomecategoria} - {$nomesubcategoria}</option>";
                            } ?>
                             </select>
                            </div>
                          </form>
                      </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
             <table class="table table-hover table-sm">
                  <thead>
                    <tr> 
                      <th scope="col">Produto Final</th>
                      <th scope="col">Variação</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                   
                                  
                           <?php 
                            $finalsql = "SELECT f.idprodutofinal, f.idprodutoideia, f.variacao, i.idprodutoideia, i.nomeprodutoideia FROM produtofinal AS f INNER JOIN produtoideia AS i ON i.idprodutoideia = f.idprodutoideia ORDER BY i.nomeprodutoideia";
                            if(isset($varsubcat)){
                                 $finalsql = "SELECT f.idprodutofinal, f.idprodutoideia, f.variacao, i.idprodutoideia, i.nomeprodutoideia FROM produtofinal AS f INNER JOIN produtoideia AS i ON i.idprodutoideia = f.idprodutoideia AND i.idsubcategoria = $varsubcat ORDER BY i.nomeprodutoideia";
                            }
                            $finalquery=mysqli_query($con,$finalsql);
                            $finallinhas = mysqli_num_rows($finalquery); 
                                for($x = 0;$x < $finallinhas ;$x++)   {
                                    $final=mysqli_fetch_assoc($finalquery);
                                    $idprodutofinal = $final['idprodutofinal'];
                                    $variacao = $final['variacao'];
                                    $nomeproduto = $final['nomeprodutoideia']; ?>
                                 
                                       
                                       <tr>
                                          <td scope='row'><?php echo  $nomeproduto ?></td>
                                          <td><?php echo  $variacao ?></td>
                                          <td><a href="edita-final.php?final=<?php echo $idprodutofinal ?>">Editar</a></td>
                                          <td><a href="exclui-final.php?final=<?php echo $idprodutofinal ?>">Excluir</a></td>
                                      </tr>
                            
                            <?php     }?>
                            
                  </tbody>
                </table>
         </div>
      </div>
  </div>



</body>
</html>