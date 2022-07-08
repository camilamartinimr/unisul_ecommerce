<?php 
include("adm-head.php");


?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Inserir Categoria</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
        
        
        <script>
         $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
          </script>  
          
          
          <script>
                    $(function(){
                       $('.categoria').submit(function(){

                                    $.ajax({
                                       url: 'insere-cat-p.php',
                                       type: 'POST',
                                       data: $('.categoria').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDadoscat').html(data);
                                       }

                                    });
                                    $('.categoria')[0].reset();
                                    return false;   // impede atualização da página

                               });

                     });
                </script>                                     
                               
        <form class='categoria'  >
            <div class='form-group'>
             <label for="categoria" data-toggle="tooltip" data-placement="right" title="Ex.: Perfumes,  Cabelos">Nome Categoria [?]</label>
            <input type="text" class="form-control" name="categoria" required><br>
             <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
          

            </div>
        </form>                
                 
               
       <div class="recebeDadoscat"></div>
     
      
   </div>
    
 

</div>


</body>
</html>