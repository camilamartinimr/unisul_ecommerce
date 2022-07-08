<?php 
include("adm-head.php");
//include("../laravel-url.php");

?>

<body>
  <?php include("adm-topo.php"); ?>
 <div class="container mt-5">
  <div class="row">
      <div class="col-lg-6 py-4 text-right "><h1>Categorias</h1>  </div>
       <div class="col-lg-6 py-4 text-left "><a href="insere-cat.php"> Inserir Nova Categoria</a></div>
        </div>
        <div class="row">
          <div class="col-lg-12">
             <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Nome Categoria</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      
                      </tr>
                  </thead>
                  <tbody>
                   
                      <?php 
                            $catsql = "SELECT * FROM categoria";
                            $catquery=mysqli_query($con,$catsql);
                            $catlinhas = mysqli_num_rows($catquery); 
                                for($x = 0;$x < $catlinhas ;$x++)   {
                                    $categoria=mysqli_fetch_assoc($catquery);
                                    $idcategoria = $categoria['idcategoria'];
                                    $nomecategoria = $categoria['nomecategoria'];?>
                                       
                                       <tr>
                                          <td scope='row'><?php echo  $nomecategoria ?></td>
                                          <td><a href="edita-cat.php?cat=<?php echo $idcategoria ?>">Editar</a></td>
                                          <td><a href="exclui-cat.php?cat=<?php echo $idcategoria ?>">Excluir</a></td>
                                      </tr>
                            
                            <?php     }?>
                            
                  </tbody>
                </table>
         </div>
      </div>
  </div>



</body>
</html>