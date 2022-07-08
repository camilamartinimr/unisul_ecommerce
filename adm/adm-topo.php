<?php session_start();
if(isset($_SESSION['login']['usuario'])){
@$sair = $_GET['sair'];
 
 

?>
 <div class="container-fluid  fixed-top bg-light  " >
  <div class="container">
    
  
    <div class="row pt-1 pb-2">
        <div class="col-3"><a href="bem-vindo.php"><img  src="../img/site/logo_fuchsia.png" alt="" class='logo' ></a></div>
        <div class="col-6">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="banner.php">Banner</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="categoria.php">Categoria</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="subcategoria.php">Subcategoria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produtoideia.php">Produto Ideia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produtofinal.php">Produto Final</a>
      </li>
      
    </ul>
    
  </div>
</nav>
        </div>
         <div class="col-3 p-3">
          <?php 
         
                print_r($_SESSION['login']['usuario']);
           
                echo "                 <a href='{$_SERVER['REQUEST_URI']}?sair=true'>Sair</a>";
                if($sair == 'true'){
                    session_destroy();
                   // header("Refresh:0");
                }
          
         ?>
         </div>
        
        </div> </div></div>
        
       
      
<?php    } else{
     header('Location: index.php');
}

?>