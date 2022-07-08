<?php 
include("adm-head.php");
@$varcat = $_GET['cat'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Inserir Subcategoria</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
        
        
        <script>
         $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
          </script>  
          
          
          <form class="categoria"  method="get" >
           
              <div class="form-group">
                  <label for="categoria">Selecione a categoria do produto</label>
                   <select onchange="if(this.value != 0) { this.form.submit(); }" onsubmit="return false" class="form-control" name="cat" >
                         <option>Categoria</option>
                         <?php 
                            $catsql = "SELECT * FROM categoria ORDER BY nomecategoria ASC";
                            $catquery=mysqli_query($con,$catsql);
                            $catlinhas = mysqli_num_rows($catquery); 
                                for($x = 0;$x < $catlinhas ;$x++)   {
                                $categoria=mysqli_fetch_assoc($catquery);
                                $idcategoria = $categoria['idcategoria'];
                                $nomecategoria = $categoria['nomecategoria'];
                                  echo "<option id value='{$idcategoria}'> {$nomecategoria}</option>";
                            } 
                            echo"</select>
                                  </div>
                               
                        </form>";
          ?>
          
          
          <?php 
              if($varcat != ''){
                       
            ?>
          
          <script>
                    $(function(){
                       $('.subcategoria').submit(function(){

                                    $.ajax({
                                       url: 'insere-subcat-p.php',
                                       type: 'POST',
                                       data: $('.subcategoria').serialize(),    
                                       success: function(data)  {
                                          $('.recebeDadossubcat').html(data);
                                       }

                                    });
                                    $('.subcategoria')[0].reset();
                                    return false;   // impede atualização da página

                               });

                     });
                </script>                                     
                               
        <form class='subcategoria'  >
            <div class='form-group'>
             <label for="subcategoria" data-toggle="tooltip" data-placement="right" title="Ex.: Shampoo, Condicionador">Nome Subcategoria</label>
            <input type="text" class="form-control" name="subcategoria" required><br>
            <input type="hidden"  name="idcategoria" value="<?php echo $varcat;   ?>">
             <button type='submit' class='btn btn-primary btn-sm'>Salvar</button>
          

            </div>
        </form>                
                 
               
       <div class="recebeDadossubcat"></div>
  <?php    } ?>
      
   </div>
    
 

</div>


</body>
</html>