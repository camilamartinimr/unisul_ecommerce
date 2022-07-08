<?php 
include("adm-head.php");
@$varideia = $_GET['ideia'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Excluir Produto Ideia</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
        
                                
             <?php 
                if($varideia != null){    ?>
                   
                  <script>
                    $(function(){
                       $('.ideia').submit(function(){

                                    $.ajax({
                                       url: 'exclui-ideia-p.php',
                                       type: 'POST',
                                       data: $('.ideia').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.ideia')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>  
                
                   <?php 
                            $ideiasql = "SELECT idprodutoideia, nomeprodutoideia FROM produtoideia 
                            WHERE idprodutoideia = $varideia";
                            
                           
                            $ideiaquery=mysqli_query($con,$ideiasql);
                            $ideialinhas = mysqli_num_rows($ideiaquery); 
                                for($x = 0;$x < $ideialinhas ;$x++)   {
                                    $ideia=mysqli_fetch_assoc($ideiaquery);
                                    $idprodutoideia = $ideia['idprodutoideia'];
                                    $nomeprodutoideia = $ideia['nomeprodutoideia']; 
                                }    
                             ?>        
                
        <form class="ideia">
              <div class='form-group'>
                    <label for="submit">Tem certeza que deseja excluir o produto ideia <br> <?php echo $nomeprodutoideia ?>?</label>
                    <br>
                     <input type="hidden" name="ideia" value="<?php echo $varideia ?>">
                     <button type='submit' class='btn btn-primary btn-sm'>Sim</button>
                     
                </div>
         </form>     
                                  
              <?php  } ?>
               
       <div class="recebeDados"></div>
     
      
   </div>
    
 

</div>


</body>
</html>