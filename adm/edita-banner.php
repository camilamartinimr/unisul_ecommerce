<?php 
include("adm-head.php");
//include("../laravel-url.php");


@$varbanner = $_GET['banner'];


?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Editar Banner Página Inicial</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
            
    <?php if(isset($varbanner)){ ?>
            <script>
                     function verificaExtensao($input) {
                      var extPermitidas = ['jpg', 'png', 'JPG', 'PNG'];
                      var extArquivo = $input.value.split('.').pop();

                      if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
                        alert('Extensão "' + extArquivo + '" não permitida!');
                          $input.value = '';
                      } 
                    }
             </script>
              
                <script>
                    $(function(){
                       $('.inserebanner').submit(function(){
                                    var formData = new FormData($(this)[0]);
                                    $.ajax({
                                       url: 'edita-banner-p.php',
                                       type: 'POST',
                                       data: formData, 
                                       async: false,
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       },
                                       cache: false,
                                       contentType: false,
                                       processData: false    

                                    });
                                    $('.inserebanner')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>  
             
               <form class="inserebanner" enctype="multipart/form-data" >
               <div class="form-group">
                <label for='imagem'  >Imagem Banner</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="20000" />
                <input type='file' onchange="verificaExtensao(this)" class='form-control-file btn-sm' name='imagem' required>
                
                <label for='descricao'>Descrição do Banner</label> 
                <input type="text"  class="form-control" name="descricao">
                <input type="hidden" name="banner" value="<?php echo $varbanner ?>  "> <br>
                      <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
                      <button type='reset' class='btn btn-primary btn-sm'>Limpar Campos</button>
                                   
           </div>
           </form>
    
    
    <?php  }  ?>   <div class="recebeDados"></div>

</div>


</body>
</html>