<?php 
include("adm-head.php");
//include("../laravel-url.php");


@$varsubcat = $_GET['subcat'];
@$varideia = $_GET['ideia'];
@$varfinal = $_GET['final'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Editar Produto Ideia</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
                                        
            <?php  
          
           if(isset($varideia)){  
                        $order   = array("'", "’", "`");
                        $replace = array("\'", "\’", "\`");
                       // $marca = str_replace($order, $replace, $mstr);  
               $isql = "SELECT * FROM produtoideia WHERE idprodutoideia = $varideia";
                            $iquery=mysqli_query($con,$isql);
                            $ilinhas = mysqli_num_rows($iquery); 
                                for($x = 0;$x < $ilinhas ;$x++)   {
                                $i1=mysqli_fetch_assoc($iquery);
                                $idprodutoideia = $i1['idprodutoideia'];
                                $nomeprodutoideia = str_replace($order, $replace,$i1['nomeprodutoideia']);
                                $descricao = $i1['descricao'];
                                $marca =str_replace($order, $replace,$i1['marca']);
                                $especificacao = $i1['especificacao'];
                               
                  
                                }
                     ?>
                          <script>
                    $(function(){
                       $('.editaideia').submit(function(){

                                    $.ajax({
                                       url: 'edita-ideia-p.php',
                                       type: 'POST',
                                       data: $('.editaideia').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDados').html(data);
                                       }

                                    });
                                    $('.editaideia')[0].reset();
                                    return false;   // impede atualização da página


                               });

                     });
                </script>           
               <form class="editaideia">     
                  <input type="hidden" name="idprodutoideia" value='<?php echo $idprodutoideia  ?>'>
                     <label for='nomeproduto'>Nome do produto</label>
                      <input type='text' class='form-control' value='<?php echo $nomeprodutoideia  ?>' name='nomeprodutoideia' required >
                      <label for='destaque'>Destaque</label>
                       <select name='destaque' class='form-control' >
                          <option value='0'>NÃO</option>
                          <option value='1'>SIM</option>
                      </select>
                       <label for='marca'>Marca</label>
                       <input type='text' name='marca' value='<?php echo $marca  ?>' class='form-control' required>

                   </div> 
                   
                    <div class='col-lg-6 px-5'>
           <label for='descricao'>Descrição</label>
                      <textarea class='form-control' value='<?php echo $descricao  ?>' name='descricao' rows='5'> </textarea>

                       <label for='especificacao'>Especificação</label>
                      <textarea value='<?php echo $especificacao  ?>' class='form-control' name='especificacao' rows='4'> </textarea><br> 
                      <input type='submit' value='Salvar' class='btn btn-primary btn-sm'>
                      <input type='reset' value='Limpar Campos' class='btn btn-primary btn-sm'>
                      <div class='recebeDados'></div>
                      
           
       </div>
              
        </form>
                       
                   <?php } ?>         
             
            
   
      
   
    
 

</div>


</body>
</html>