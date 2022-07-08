<?php 
include("adm-head.php");
@$varcat = $_GET['cat'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Editar Categoria</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
        
     <?php if($varcat != ''){ ?>
                <script>
                    $(function(){
                       $('.cat').submit(function(){

                                    $.ajax({
                                       url: 'edita-cat-p.php',
                                       type: 'POST',
                                       data: $('.cat').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDadoscat').html(data);
                                       }

                                    });
                                    $('.cat')[0].reset();
                                    return false;   // impede atualização da página

                               });

                     });
                </script>  
                
                
                
                
                
               <form class="cat">
                    <div class='form-group'>
                          <label for="categoria">Edite a categoria </label>
                          <input type="hidden" value="<?php echo $varcat?>" name="idcategoria" > 
                               
                          <input type="text"   class="form-control" name="nomecategoria"> 
                               <div id="edite"></div>            
                                <br>
                       <input type='submit' value='Salvar' class='btn btn-primary btn-sm'>
                      <input type='reset' value='Limpar Campos' class='btn btn-primary btn-sm'>
                          
                    </div>
               </form>            
                                                 
       <div class="recebeDadoscat"></div>
     
     
     
      
       <?php  }  ?>
   </div>
    
 

</div>


</body>
</html>