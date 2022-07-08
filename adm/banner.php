<?php 
include("adm-head.php");
//include("../laravel-url.php");

?>

<body>
  <?php include("adm-topo.php"); ?>
 <div class="container mt-5">
  <div class="row">
      <div class="col-lg-6 py-4 text-right "><h1>Banners</h1>  </div>
       <div class="col-lg-6 py-4 text-left "><a href="insere-banner.php"> Inserir Novo Banner</a></div>
        </div>
        <div class="row">
          <div class="col-lg-12">
             <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Banner</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      
                      </tr>
                  </thead>
                  <tbody>
                          
                      <?php 
                            $sql = "SELECT * FROM banner";
                            $query=mysqli_query($con,$sql);
                            $linhas = mysqli_num_rows($query); 
                                for($x = 0;$x < $linhas ;$x++)   {
                                    $banner=mysqli_fetch_assoc($query);
                                    $idbanner = $banner['idbanner'];
                                    $descricao = $banner['descricao']; ?>
                                       
                                       <tr>
                                          <td scope='row'><?php echo  $descricao ?></td>
                                          <td><a href="edita-banner.php?banner=<?php echo $idbanner ?>">Editar</a></td>
                                           <td><a href="exclui-banner.php?banner=<?php echo $idbanner ?>">Excluir</a></td>                  
                                        
                                      </tr>
                            
                            <?php     }?>
                            
                  </tbody>
                </table>
         </div>
      </div>
  </div>



</body>
</html>