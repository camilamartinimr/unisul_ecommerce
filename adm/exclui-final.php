<?php 
include("adm-head.php");
//include("../laravel-url.php");


@$varfinal = $_GET['final'];


?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Excluir Produto Final</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
      
    <?php     if($varfinal != null){        ?>
             <script>
                    $(function(){
                       $('.final').submit(function(){

                                    $.ajax({
                                       url: 'exclui-final-p.php',
                                       type: 'POST',
                                       data: $('.final').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.final')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>         
              <form class="final" >
                  
                    <?php  
                            $finalsql = "SELECT f.idprodutofinal, f.idprodutoideia, f.variacao, i.idprodutoideia, i.nomeprodutoideia FROM produtofinal AS f INNER JOIN produtoideia AS i ON i.idprodutoideia = f.idprodutoideia 
                            AND f.idprodutofinal= $varfinal";
                         
                            $finalquery=mysqli_query($con,$finalsql);
                            $finallinhas = mysqli_num_rows($finalquery); 
                                for($x = 0;$x < $finallinhas ;$x++)   {
                                    $final=mysqli_fetch_assoc($finalquery);
                                    $idprodutofinal = $final['idprodutofinal'];
                                    $variacao = $final['variacao'];
                                    $nomeproduto = $final['nomeprodutoideia']; 
                                }
                              ?>
           
              <div class="form-group">
                  <input type="hidden" name="final" value="<?php echo $varfinal ?>">
                    <label for="ideia">Deseja excluir o produto Final <br> <?php echo $nomeproduto  .' ' . $variacao ?> ?</label>
                   
                              <br>
                              
                                   <button type='submit' class='btn btn-primary btn-sm'>Sim</button>
                                   <div class="recebeDados"></div>
                                  </div>
                  </form>
             
         
         
         
       <?php  }?>
                                
                                
                               
             
            
   
      
   
    
 

</div>


</body>
</html>