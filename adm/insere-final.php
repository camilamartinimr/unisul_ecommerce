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
      <div class="col-lg-12 py-4 text-center "><h1>Inserir Produto Final</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
       <form class="produtoideia"  method="get" >
          <div class="form-group">
                  <label for="subcategoria">Selecione a Subcategoria do produto</label>
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
                            } 
                              echo"</select>
                                  </div>
                               </form>";
           
         if($varsubcat != null){        ?>
              <script>
                    $(function(){
                       $('.final').submit(function(){
                                    var formData = new FormData($(this)[0]);
                                    $.ajax({
                                       url: 'insere-final-p.php',
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
                                    $('.final')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>  
                   
             <script>
                 $(function () {
                  $('[data-toggle="tooltip"]').tooltip()
                 })
             </script>          
                                     
              <form class="final" enctype="multipart/form-data" >
           
              <div class="form-group">
                  <input type="hidden" name="subcat" value="$varsubcat">
                  <label for="ideia">Selecione a ideia do produto</label>
                   <select  class="form-control" name="ideia" >
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
                            }?></select> 
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
                              
                                 <div class="form-group">
                                  <label for='foto1'>Foto 1</label>
                                  <input  type='file' onchange="verificaExtensao(this)" class='form-control-file btn-sm'  name='foto1' required>
                                   <label for='foto2'>Foto 2</label>
                                  <input type='file' onchange="verificaExtensao(this)" class='form-control-file btn-sm' name='foto2' required>
                                   <label for='foto3'>Foto 3</label>
                                  <input type='file' onchange="verificaExtensao(this)" class='form-control-file  btn-sm' name='foto3' required>
                                  
                                  <script>
                                      function formatarMoeda() {
                                          var elemento = document.getElementById('valor');
                                          var valor = elemento.value;

                                          valor = valor + '';
                                          valor = parseInt(valor.replace(/[\D]+/g,''));
                                          valor = valor + '';
                                         // valor = valor.replace(/([0-9]{2})$/g, ",$1");
                                          valor = valor.replace(/([0-9]{2})$/g, ".$1");

                                        /*  if (valor.length > 6) {
                                            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                                          } */

                                          elemento.value = valor;
                                        }
                                     //https://pt.stackoverflow.com/questions/241620/formatar-valor-em-dinheiro-enquanto-digita-com-javascript-puro
                                  </script>
                                  
                                  </div></div></div>
                                  <div class="col-lg-6 px-5">
                                   <label for='preco'>Preço</label>
                                  <input type='text' class='form-control' id="valor" onkeyup="formatarMoeda();"  name='preco' >
                                  
                                  <script>
                                      function formatarInteiro() {
                                          var elemento = document.getElementById('desconto');
                                          var desconto = elemento.value;

                                        
                                         desconto = parseInt(desconto, 10);
                                          
                                         elemento.value = desconto;
                                      
                                        }
                                     //https://pt.stackoverflow.com/questions/241620/formatar-valor-em-dinheiro-enquanto-digita-com-javascript-puro
                                  </script>
                                  
                                  
                                  
                                  <label for='deconto'>Desconto</label>
                                  <input type='text' class='form-control' name='desconto' id="desconto" onkeyup="formatarInteiro();">
                                  <label for='variacao' data-toggle="tooltip" data-placement="right" title="Ex.: 30 ml, 50 ml, Rosa, Azul">Variação [?]</label>
                                  <input type='text'class='form-control' name='variacao'><br>
                                   <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
                                   <button type='reset' class='btn btn-primary btn-sm'>Limpar Campos</button>
                                   <div class="recebeDados"></div>
                                  </div>
                  </form>
             
         
         
         
       <?php  }?>
                                
                                
                               
             
            
   
      
   
    
 

</div>


</body>
</html>