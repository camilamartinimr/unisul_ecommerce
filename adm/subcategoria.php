<?php 
include("adm-head.php");
//include("../laravel-url.php");

?>

<body>
  <?php include("adm-topo.php"); ?>
 <div class="container mt-5">
  <div class="row">
      <div class="col-lg-6 py-4 text-right "><h1>Subcategorias</h1>  </div>
       <div class="col-lg-6 py-4 text-left "><a href="insere-subcat.php"> Inserir Nova Subcategoria</a></div>
        </div>
        <div class="row">
          <div class="col-lg-12">
             <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Categoria</th>
                      <th scope="col">Subcategoria</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                   
                      <?php 
                             $subcatsql = "SELECT s.*, c.* FROM subcategoria AS s INNER JOIN categoria AS c ON c.idcategoria = s.idcategoria ORDER BY nomecategoria ASC";
                            $subcatquery=mysqli_query($con,$subcatsql);
                            $subcatlinhas = mysqli_num_rows($subcatquery); 
                                for($x = 0;$x < $subcatlinhas ;$x++)   {
                                $subcategoria=mysqli_fetch_assoc($subcatquery);
                                $idsubcategoria = $subcategoria['idsubcategoria'];
                                $nomecategoria = $subcategoria['nomecategoria'];
                                $nomesubcategoria = $subcategoria['nomesubcategoria']; ?>
                                       
                                       <tr>
                                          <td scope='row'><?php echo  $nomecategoria ?></td>
                                          <td><?php echo  $nomesubcategoria ?></td>
                                          <td><a href="edita-subcat.php?subcat=<?php echo $idsubcategoria ?>">Editar</a></td>
                                          <td><a href="exclui-subcat.php?subcat=<?php echo $idsubcategoria ?>">Excluir</a></td>
                                      </tr>
                            
                            <?php     }?>
                            
                  </tbody>
                </table>
         </div>
      </div>
  </div>



</body>
</html>