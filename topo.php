<?php session_start();?>
 <div class="container-fluid  fixed-top bg-light " >
  <div class="container">
      <div class="row py-1 " >
       <div class="col-12">
          <div class="text-center" id="fretegratis" ><small><span class="deeppink" >FRETE GRÁTIS</span> nas compras acima de R$ 139,00</small></div>
        </div>
        <div>
<div  class="aviso bg-warning rounded shadow text-center"  /><small>Este site tem fins educativos.</small> NÃO REALIZA VENDAS. </div>
</div>
   </div>
    <div class="row pt-1 pb-2">
        <div class="col-3"><a href="index.php"><img id='logo' src="img/site/logo_fuchsia.png" alt="" ></a></div>
        <div class="col-6">
           
  <form action="produtos.php" method="post">        
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="pesquisa" placeholder="Oi, o que você procura hoje? :)"  aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class=" btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
   </form>        
          
        </div>
        <div class="col-2 pt-1"></div>
        <?php 
            $itens = 0;
            if(isset($_SESSION['carrinho'])){
                $max = sizeof($_SESSION['carrinho']);
                for($linha = 0; $linha < $max ;$linha++) {
                       $itens += $_SESSION['carrinho'][$linha]['quantidade']; 
               }

            }
         ?>
        <div class="col-1 "><a href="carrinho.php"><i class="fas fa-shopping-bag sacola  "></i><div class="numitens pt-1 "><?php echo $itens ?></div></a> 
       <!--  <a href="<?php// echo $_SERVER['REQUEST_URI']?>?destroy=1">DESTROY</a>-->
        <?php  if(@$_GET['destroy'] == '1'){ 
                            
                            session_destroy();
                    
        }  ?>
        </div>
    </div>
   
   
       <div class="row" id='menu'>
            <div class="col-12">
            
            <nav class="navbar navbar-expand-lg navbar-light ">
             
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                   
                   <?php 
                          //$sql = "SELECT c.*, s.* FROM categoria AS c INNER JOIN subcategoria AS s ON c.idcategoria = s.idcategoria" ;
                          $sql = "SELECT * FROM categoria" ;
                          $result=mysqli_query($con,$sql);
                          $numlinhas = mysqli_num_rows($result); 
                          for($x = 0;$x < $numlinhas ;$x++)   {
                              $cat=mysqli_fetch_assoc($result);
                              $idcat = $cat['idcategoria'];
                              echo"
                              <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='produtos.php?menu={$cat['idcategoria']}' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                  {$cat['nomecategoria']}
                                </a>
                                
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                  
                                  $sqlsub = "SELECT * FROM subcategoria WHERE idcategoria = $idcat" ;
                                  $resultsub=mysqli_query($con,$sqlsub);
                                  $numlinhassub = mysqli_num_rows($resultsub);
                                  for($z = 0;$z < $numlinhassub ;$z++)   {
                                      $sub=mysqli_fetch_assoc($resultsub);
                                      echo"
                                  <a class='dropdown-item' href='produtos.php?cat={$cat['idcategoria']}&sub={$sub['idsubcategoria']}'>{$sub['nomesubcategoria']}</a>";
                                  }
                                  
                               echo"
                               <a class='dropdown-item' href='produtos.php?cat={$cat['idcategoria']}'>Todos</a>
                               </div>
                              </li>
                              ";
                          }
                        
                       
                   ?>
                   
                   
                    
                
            
                   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="produtos.php?menu=Maquiagem" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Marcas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      
                  <?php 
                          $sqlmarca = "SELECT marca from produtoideia group by marca " ;
                          $resultmarca=mysqli_query($con,$sqlmarca);
                          $numlinhasmarca = mysqli_num_rows($resultmarca);
                          for($x = 0;$x < $numlinhasmarca ;$x++)   {
                               $marcas=mysqli_fetch_assoc($resultmarca);
                               $marca = urlencode($marcas['marca']);
                               $newst = urldecode($marca);
                               echo "<a class='dropdown-item' href='produtos.php?marca={$marca}'>{$newst}</a>";
                              
                               
                 
                 // Processes \r\n's first so they aren't converted twice.
                
                          }
                        
                       
                   ?>
                      </div>
                  </li>
                         <li class="nav-item">
                            <a class="nav-link" href="produtos.php?ofertas=ofertas">Ofertas</a>
                          </li>
                         </ul>
                      </div>
                    </nav>

                </div> 
    
        </div>
   
 
   
   </div>
</div>
   

    
 


 



   