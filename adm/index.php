
<?php 
session_start();
@$sair = $_GET['sair'];
include("adm-head.php");
include("../laravel-url.php");


?>

<body>
    

<div class="container-fluid  fixed-top bg-light  " >
  <div class="container">
    
  
    <div class="row pt-1 pb-2">
       <div class="col-4"></div>
        <div class="col-4 text-center" ><a href="index.php"><img  src="../img/site/logo_fuchsia.png" alt="" class='logo' ></a></div>
     <div class="col-4 text-left">
         <?php 
          
                echo "<a href='{$_SERVER['REQUEST_URI']}?sair=true'>Sair</a>";
                if($sair == 'true'){
                    session_destroy();
                    
                }
            
         ?>
     </div>
  
  </div>
 </div> 
</div> 
 
  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><br><br><h1>Bem-vindo à administração do site Fuchsia</h1>
      <p>Faça o login para começar:</p></div>
    </div>  
              
     <div class="row">
         <div class="col-4"></div>
         <div class="col-4">
             
            <form method="post" action="verifica.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
           </form>
                    </div>
                     <div class="col-4"></div>
                 </div> 
    
  <div class="row">
      <div class="col-lg-12 py-4 text-center ">    
      <p>Em caso de problemas, entre em contato com o desenvolvedor
      <br>pelo e-mail adm@fuchsiaweb.com.br</p>
      <div class="recebeDados"></div>
      </div>  
      
  </div>
  

</div>

</body>
</html>