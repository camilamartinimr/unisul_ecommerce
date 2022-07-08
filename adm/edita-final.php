<?php 
session_start();
include("adm-head.php");

@$varsubcat = $_GET['subcat'];
@$varideia = $_GET['ideia'];
@$varfinal = $_GET['final'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Editar Produto Final</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
     <!--   <form class="produtoideia"  method="get" >
                   
   <?php/*   if($varsubcat != null || isset($varideia) || isset($varfinal)){         ?>
            <form method="get" name="ideia"> 
               <div class="form-group">        
                <label for="ideia">Selecione a ideia do produto</label>
                   <select  class="form-control" onchange="if(this.value != 0) { this.form.submit(); }"  onsubmit="false" name="ideia" >
                         <option>Ideia</option>
                         <?php 
                           /* $ideiasql = "SELECT idprodutoideia, nomeprodutoideia FROM produtoideia WHERE idsubcategoria = $varsubcat 
                            ORDER BY nomeprodutoideia ASC";
                            $ideiaquery=mysqli_query($con,$ideiasql);
                            $ideialinhas = mysqli_num_rows($ideiaquery); 
                                for($x = 0;$x < $ideialinhas ;$x++)   {
                                $ideia=mysqli_fetch_assoc($ideiaquery);
                                $idprodutoideia = $ideia['idprodutoideia'];
                                $nomeprodutoideia = $ideia['nomeprodutoideia'];
                                  $selected1 = '';    
                                  if(!empty($varideia) and $varideia == $idprodutoideia){
                                        $selected1 = ' selected="selected"';
                                  } 
                                //  echo "<option  value='{$idprodutoideia}'> {$nomeprodutoideia}</option>";
                             echo '<option value='.$idprodutoideia.$selected1.'>'.$nomeprodutoideia.'</option>';             
                                } */ ?>
                        </select>
                      </div>
                   </form>
                       
                       
                       
                       
                      <?php//  }  ?> 
          
                 --> 
                      
               
                
             <?php   if($varfinal != null){                             
                       $finalsql2 = "SELECT * FROM produtofinal WHERE idprodutofinal = $varfinal";                       
                       $finalquery2=mysqli_query($con,$finalsql2);
                       $finallinhas2 = mysqli_num_rows($finalquery2); 
                       for($x = 0;$x < $finallinhas2 ;$x++)   {
                            $final2=mysqli_fetch_assoc($finalquery2);
                             $idprodutofinal2 = $final2['idprodutofinal'];
                             $foto1 = $final2['foto1'];
                             $foto2 = $final2['foto2'];
                             $foto3 = $final2['foto3'];
                             $preco = $final2['preco'];
                             $desconto = $final2['desconto']; 
                             $variacao = $final2['variacao'];
                       }
                
                 ?>                                      
                 <script>
                    
                    $(function(){
                       $('.final').submit(function(){
                                    var formData = new FormData($(this)[0]);
                                    $.ajax({
                                       url: 'edita-final-p.php',
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
                                     
              <form class="final" >
           
              <div class="form-group">
                  <input type="hidden" name="subcat" value=" <?php echo $varfinal ?> ">
                  
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
                                 <input type="hidden" value="<?php echo $varfinal ?>" name="idprodutofinal">
                                  <label for='foto1'>Foto 1</label>
                                  <input  type='file'   class='form-control-file btn-sm'  name='foto1' required>
                                   <label for='foto2'>Foto 2</label>
                                  <input type='file'   onchange="verificaExtensao(this)" class='form-control-file btn-sm' name='foto2' required>
                                   <label for='foto3'>Foto 3</label>
                                  <input type='file'  onchange="verificaExtensao(this)" class='form-control-file  btn-sm' name='foto3' required>
                                  
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
                                   <label for='preco' data-toggle="tooltip" data-placement="right" title="Valor sem desconto" >Preço[?] </label>
                                  <input type='text' value="<?php echo $preco?>" class='form-control' id="valor" onkeyup="formatarMoeda();"  name='preco' required>
                                  
                                 
                                  
                                  
                                  <label for='deconto' data-toggle="tooltip" data-placement="right" title="Somente valores inteiros. Se não hover desconto, digitar 0.">Desconto[?]</label>
                                  <input type='text' value="<?php echo $desconto?>" class='form-control' name='desconto'   >
                                  <label for='variacao' data-toggle="tooltip" data-placement="right" title="Ex.: 30 ml, 50 ml, Rosa, Azul">Variação [?]</label>
                                  <input type='text' value="<?php echo $variacao?>" class='form-control' name='variacao'><br>
                                   <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
                                   <button type='reset' class='btn btn-primary btn-sm'>Limpar Campos</button>
                                   <div class="recebeDados"></div>
                                  </div>
                  </form>
             
         
         
         
       <?php  }?>
                                
                                
                               
             
            
   
      
   
    
 

</div>


</body>
</html>