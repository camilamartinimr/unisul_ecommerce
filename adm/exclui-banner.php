<?php 
include("adm-head.php");
//include("../laravel-url.php");


@$varbanner= $_GET['banner'];


?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Excluir Banner Página Inicial</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
            
    <?php if(isset($varbanner)){ ?>
                      
       <script>
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })                                               
        </script>       
               <script>
                    $(function(){
                       $('.excluibanner').submit(function(){

                                    $.ajax({
                                       url: 'exclui-banner-p.php',
                                       type: 'POST',
                                       data: $('.excluibanner').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.excluibanner')[0].reset();
                                    return false;   // impede atualização da página

                               });

                     });
                </script>                                     
                   <?php 
                            $sql = "SELECT * FROM banner WHERE idbanner = $varbanner";
                            $query=mysqli_query($con,$sql);
                            $linhas = mysqli_num_rows($query); 
                                for($x = 0;$x < $linhas ;$x++)   {
                                    $banner=mysqli_fetch_assoc($query);
                                    $idbanner = $banner['idbanner'];
                                    $descricao = $banner['descricao']; 
                            }
               ?>
            
              <form class="excluibanner" >
               <div class="form-group">
              <label for="banner"> Tem certeza que deseja excluir o banner <br> <?php echo $descricao ?>?</label>              
             <input type="hidden" name="banner" value="<?php echo $varbanner ?>  "> <br>
             <button type='submit' class='btn btn-primary btn-sm'>Sim</button>
                                   
     
    
    <?php  }  ?>   <div class="recebeDados"></div>

</div>


</body>
</html>