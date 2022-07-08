<?php 
include("adm-head.php");
//include("../laravel-url.php");


@$varsubcat = $_GET['subcat'];
@$varideia = $_GET['ideia'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Inserir Banner Página Inicial</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
       <form class="subcategoria"  method="get" >
          <div class="form-group">
                  <label for="subcategoria">Selecione a subcategoria do produto relacionado ao banner</label>
                   <select onchange="if(this.value != 0) { this.form.submit(); }" onsubmit="return false" class="form-control" name="subcat" >
                         <option>Subcategoria</option>
                         <?php 
                            $subcatsql = "SELECT s.*, c.* FROM subcategoria AS s INNER JOIN categoria AS c ON c.idcategoria = s.idcategoria ORDER BY nomecategoria ASC";
                            $subcatquery=mysqli_query($con,$subcatsql);
                            $subcatlinhas = mysqli_num_rows($subcatquery); 
                                for($x = 0;$x < $subcatlinhas ;$x++)   {
                                $subcategoria=mysqli_fetch_assoc($subcatquery);
                                $idsubcategoria = $subcategoria['idsubcategoria'];
                                $nomecategoria = $subcategoria['nomecategoria'];
                                $nomesubcategoria = $subcategoria['nomesubcategoria'];
                                  echo "<option id value='{$idsubcategoria}'> {$nomecategoria} - {$nomesubcategoria}</option>";
                            }  ?>
                             </select>
                                  </div>
                               </form>
           
     <?php if(isset($varsubcat)|| isset($varideia)){ ?>
                                
      <form class="ideia" >
                <div class="form-group">
                  <label for="ideia">Selecione o produto relacionado ao banner</label>
                   <select onchange="if(this.value != 0) { this.form.submit(); }"  class="form-control" name="ideia" >
                         <option>Ideia</option>
                         <?php 
                            $ideiasql = "SELECT idprodutoideia, nomeprodutoideia FROM produtoideia WHERE idsubcategoria = $varsubcat 
                            ORDER BY nomeprodutoideia ASC";
                            $ideiaquery=mysqli_query($con,$ideiasql);
                            $ideialinhas = mysqli_num_rows($ideiaquery); 
                                for($x = 0;$x < $ideialinhas ;$x++)   {
                                $ideia=mysqli_fetch_assoc($ideiaquery);
                                $idprodutoideia = $ideia['idprodutoideia'];
                                $nomeprodutoideia = $ideia['nomeprodutoideia'];
                                  echo "<option  value='{$idprodutoideia}'> {$nomeprodutoideia}</option>";
                            }?>
                              
                    </select>                             
      </div>
             </form>                        
             
    <?php  }  ?>    
   
      
    <?php if(isset($varideia)){ ?>
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
                                       url: 'insere-banner-p.php',
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
              
               <form class="inserebanner" enctype="multipart/form-data">
               <div class="form-group">
                <label for='imagem'>Imagem Banner</label>
                <input type='file' onchange="verificaExtensao(this)"  class='form-control-file btn-sm'  name='imagem' required>
                
                <label for='descricao'>Descrição do Banner</label> 
                <input type="text"  class="form-control" name="descricao">
                <input type="hidden" name="ideia" value="<?php echo $varideia ?>  "> <br>
                      <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
                      <button type='reset' class='btn btn-primary btn-sm'>Limpar Campos</button>
                                   
           </div>
           </form>
    
    
    <?php  }  ?>   <div class="recebeDados"></div>

</div>


</body>
</html>