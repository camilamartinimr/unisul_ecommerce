<?php 
include("adm-head.php");



@$varcat = $_GET['cat'];

?>

<body>
    


<?php include("adm-topo.php"); ?>

  <div class="container mt-5">
  <div class="row">
      <div class="col-lg-12 py-4 text-center "><h1>Inserir Produto Ideia</h1></div>
  </div>
   <div class="row">
       <div class="col-lg-6 px-5">
       
     
                         
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
                           
                  
              if($varcat != null){       
                  $subcatsql = "SELECT * FROM subcategoria  WHERE idcategoria = $varcat ORDER BY nomesubcategoria ASC";
                  $subcatquery=mysqli_query($con,$subcatsql);
                  $subcatlinhas = mysqli_num_rows($subcatquery); ?>
                   
                  <script>
                    $(function(){
                       $('.subcategoria').submit(function(){

                                    $.ajax({
                                       url: 'insere-ideia-p.php',
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
               
               
             <?php   
               echo" 
              
               <form class='subcategoria' name='subcategoria' >
                   
                      <div class='form-group'>
                          <input type='hidden'  name='idcategoria' value='$varcat'>
                          <label for='subcategoria'>Subcategoria </label>
                          <select class='form-control' name='subcat' >";
                             
                           for($y = 0;$y < $subcatlinhas ;$y++)   {
                                $subcategoria=mysqli_fetch_assoc($subcatquery);
                                  echo "<option value='{$subcategoria['idsubcategoria']}'>{$subcategoria['nomesubcategoria']}</option>";
                            } 
               
               echo"   </select>
                   
                        <label for='nomeproduto'>Nome do produto</label>
                      <input type='text' class='form-control' name='nomeproduto'  >
                      <label for='destaque'>Destaque</label>
                       <select name='destaque' class='form-control' >
                          <option value='0'>NÃO</option>
                          <option value='1'>SIM</option>
                      </select>
                       <label for='marca'>Marca</label>
                       <input type='text' name='marca' class='form-control'>

                   </div> </div>
                   
                    <div class='col-lg-6 px-5'>
           <label for='descricao'>Descrição</label>
                      <textarea class='form-control' name='descricao' rows='5'> </textarea>

                       <label for='especificacao'>Especificação</label>
                      <textarea class='form-control' name='especificacao' rows='4'> </textarea><br> 
                      <input type='submit' value='Salvar' class='btn btn-primary btn-sm'><div class='recebeDados'></div>
                      
           
       </div>
              
        </form>";
         }
              ?>
              
     
      
   </div>
    
 

</div>


</body>
</html>