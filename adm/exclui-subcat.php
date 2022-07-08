<?php 
include("adm-head.php");
@$varsubcat = $_GET['subcat'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Excluir Subcategoria</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
        
                                
                                                     
      
             
                           
               <?php 
                if($varsubcat != null){    ?>
                   
                  <script>
                    $(function(){
                       $('.subcategoria').submit(function(){

                                    $.ajax({
                                       url: 'exclui-subcat-p.php',
                                       type: 'POST',
                                       data: $('.subcategoria').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.subcategoria')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>  
                
        <form class="subcategoria">
              <div class='form-group'>
                        <?php 
                             $subcatsql = "SELECT * FROM subcategoria WHERE idsubcategoria = $varsubcat";
                            $subcatquery=mysqli_query($con,$subcatsql);
                            $subcatlinhas = mysqli_num_rows($subcatquery); 
                                for($x = 0;$x < $subcatlinhas ;$x++)   {
                                $subcategoria=mysqli_fetch_assoc($subcatquery);
                                $idsubcategoria = $subcategoria['idsubcategoria'];
                               
                                $nomesubcategoria = $subcategoria['nomesubcategoria']; 
                            }
                       ?>
            
                     <label for="submit">Tem certeza que deseja excluir a subcategoria <?php echo $nomesubcategoria ?>?</label>
                    <br>
                     <input type="hidden" name="subcat" value="<?php echo $varsubcat ?>">
                     <input type="submit" class='btn btn-primary btn-sm' value="Sim">
                </div>
         </form>     
                                  
              <?php  } ?>
               
       <div class="recebeDados"></div>
     
      
   </div>
    
 

</div>


</body>
</html>