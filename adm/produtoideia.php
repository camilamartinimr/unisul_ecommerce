<?php 
include("adm-head.php");
//include("../laravel-url.php");
@$varsubcat = $_GET['subcat'];
?>

<body>
  <?php include("adm-topo.php"); ?>
 <div class="container mt-5">
  <div class="row">
      <div class="col-lg-6 py-4 text-right "><h1>Produto Ideia</h1>  </div>
        <div class="col-lg-3 py-4 text-left "><a href="insere-ideia.php"> Inserir Novo Produto Ideia</a></div>
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
                      <th scope="col">Produto Ideia</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                   
                    
                            <?php 
                            $ideiasql = "SELECT idprodutoideia, nomeprodutoideia FROM produtoideia 
                            ORDER BY nomeprodutoideia ASC";
                             if(isset($varsubcat)){
                                 $ideiasql = "SELECT idprodutoideia, nomeprodutoideia FROM produtoideia WHERE idsubcategoria= $varsubcat
                                              ORDER BY nomeprodutoideia ASC";
                            }
                            $ideiaquery=mysqli_query($con,$ideiasql);
                            $ideialinhas = mysqli_num_rows($ideiaquery); 
                                for($x = 0;$x < $ideialinhas ;$x++)   {
                                $ideia=mysqli_fetch_assoc($ideiaquery);
                                $idprodutoideia = $ideia['idprodutoideia'];
                                $nomeprodutoideia = $ideia['nomeprodutoideia']; ?>
                                       
                                       <tr>
                                          <td scope='row'><?php echo  $nomeprodutoideia ?></td>
                                        
                                          <td><a href="edita-ideia.php?ideia=<?php echo $idprodutoideia ?>">Editar</a></td>
                                          <td><a href="exclui-ideia.php?ideia=<?php echo $idprodutoideia ?>">Excluir</a></td>
                                      </tr>
                            
                            <?php     }?>
                            
                  </tbody>
                </table>
         </div>
      </div>
  </div>



</body>
</html>