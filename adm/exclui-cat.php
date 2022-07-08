<?php 
include("adm-head.php");
@$varcat = $_GET['cat'];

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
                if($varcat != null){    ?>
                   
                  <script>
                    $(function(){
                       $('.categoria').submit(function(){

                                    $.ajax({
                                       url: 'exclui-cat-p.php',
                                       type: 'POST',
                                       data: $('.categoria').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.categoria')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>  
                <?php 
                            $catsql = "SELECT * FROM categoria WHERE idcategoria = $varcat";
                            $catquery=mysqli_query($con,$catsql);
                            $catlinhas = mysqli_num_rows($catquery); 
                                for($x = 0;$x < $catlinhas ;$x++)   {
                                    $categoria=mysqli_fetch_assoc($catquery);
                                    $idcategoria = $categoria['idcategoria'];
                                    $nomecategoria = $categoria['nomecategoria'];
                                }
           ?>
        <form class="categoria">
              <div class='form-group'>
                    <label for="submit">Tem certeza que deseja excluir a categoria <?php echo $nomecategoria ?> ?</label>
                    <br>
                     <input type="hidden" name="cat" value="<?php echo $varcat ?>">
                     <button type='submit' class='btn btn-primary btn-sm'>Sim</button>
                     
                </div>
         </form>     
                                  
              <?php  } ?>
               
       <div class="recebeDados"></div>
     
      
   </div>
    
 

</div>


</body>
</html>