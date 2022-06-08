<?php 

include("head.php");
include("laravel-url.php");


@$idproduto = $_GET['id'];
@$idvariacao = $_GET['var'];
if(!isset($_GET['var'])){
    $_GET['var'] = 0;
}
    
?>

<body>
<?php include("topo.php"); ?>
<div class="container">
    <div class="row">
 <?php
    
    $sqlideia = "SELECT  * FROM produtoideia 
                WHERE idprodutoideia = $idproduto";
    
        $resultideia=mysqli_query($con,$sqlideia);
        $produtoideia=mysqli_fetch_assoc($resultideia);
 
    $sqlfinal=" SELECT f.*, i.idprodutoideia 
            FROM produtofinal AS f 
            INNER JOIN produtoideia AS i 
            ON f.idprodutoideia = i.idprodutoideia 
            WHERE f.idprodutoideia = $idproduto";
         
        $resultfinal=mysqli_query($con,$sqlfinal) or die(mysqli_error());
        $numlinhas = mysqli_num_rows($resultfinal);
        
        
        $x=$idvariacao;
       
    for($i = 0; $i < $numlinhas ;$i++)   {
          
          $produto = mysqli_fetch_assoc($resultfinal);
          $variacoes[$i] = $produto['variacao'] ; 
          
        
        if( $i == $x){
            $idprodutofinal = $produto['idprodutofinal'];
            $preco = $produto['preco'];
            $variacao = $produto['variacao'] ;
            $desconto = $produto['desconto'];
            $foto1 = $produto['foto1'];
            $foto2 = $produto['foto2'];
            $foto3 = $produto['foto3'];
         }
         
    }
  
            $idprodutoideia = $produtoideia['idprodutoideia'];
            $marca =  $produtoideia['marca'];
            $nomeproduto = $produtoideia['nomeprodutoideia'];
            $descricao = $produtoideia['descricao'];
            $especificacao = $produtoideia['especificacao'];


            $calcdesconto = ($desconto *  $preco)/100;
            $calcpreco = $preco - $calcdesconto;
            $precoantes = 'R$'. number_format($preco, 2, ',', '.');
            $preco = number_format($calcpreco, 2, ',', '.');
            $divdesconto = "<span class='float-right hotpink rounded p-1'>-". $desconto."%</span>";
            if($desconto == 0){$precoantes = ""; $divdesconto = "<span class='float-right p-1'><br></span>";}

        
        ?>
        
        
        <div class="col-2  text-center"> <!-- miniaturas -->
            <div class="py-1">
           <img src="img/<?php echo "$foto1"; ?>" class="img-fluid p-2 ">
            </div>
            <div class="py-1"><img src="img/<?php echo "$foto2"; ?>" class="img-fluid p-2 "></div>
            <div class="py-1"><img src="img/<?php echo "$foto3"; ?>" class="img-fluid p-2 "></div>
        </div>
         
        <div class='col-5  p-2'> <!-- foto grande -->
        <?php echo "$divdesconto";?>
        <img id="foto" src="img/<?php echo "$foto1" ;?>"  class="img-fluid">
        </div>
        
        <div class='col-5  '> <!-- comprar -->
           <p class='text-uppercase font-weight-bold'><?php echo" $marca "; ?> </p>
                <p><?php echo" $nomeproduto - $variacao "; ?></p>
                <span class='tachado'> <?php echo"  $precoantes  "; ?> <br> </span>
                <span> <h5><strong>R$ <?php echo" $preco "; ?></strong></h5></span> 
                <span class='parcelamento'><?php 
                         //valor até 50 2x | até 139 4x | maior igual 140 10x + frete gratis
                
                            switch (TRUE) {
                                case ($calcpreco <= 50):
                                    $parcelas = 2;
                                    $parcelamento = $calcpreco / $parcelas;
                                    break;
                                case ($calcpreco < 149):
                                    $parcelas = 4;
                                    $parcelamento = $calcpreco / $parcelas;
                                    break;
                                case ($calcpreco >= 149):
                                    $parcelas = 10;
                                    $parcelamento = $calcpreco / $parcelas;
                                    break;
                            }
                        $condicao = $parcelas . 'x de R$ '.number_format($parcelamento, 2, ',', '.');
                         echo" $condicao "; ?> 
                 </span>
                   <p class="parcelamento"><small>Ref.: <?php echo $idprodutofinal ?></small></p>
 
<?php 
      if(isset($variacao))  {
       $y = 0; 
        while($y < $numlinhas) {

        $URL = url_queries(['var' => $y],$_SERVER['REQUEST_URI']);
         echo "   
          <label class='btn variacao btn-outline-dark  '>
            <a href='{$URL} ' autocomplete='off'> {$variacoes[$y]} </a>
             </label>";
        $y++; 
       };
     }else{
          echo"";
      }     
?> 
      <div class="pt-3 ">
      <div class="pt-3 ">
                        
<!-------------------------->                        
                    

     <script>
        $(function(){
           $('.envio').submit(function(){
                        
                        $.ajax({
                           url: 'cart-add.php',
                           type: 'POST',
                           data: $('.envio').serialize(),    
                           success: function(data)  {
                              $('.recebeDados').html(data);
                           }
                           
                        });
                        $('.envio')[0].reset();
                        return false;   // impede atualização da página
                        
               
                   });
            
         });
    </script>                            
                       
<form class="envio" action="" method="post">
    <input type="hidden" name="idprodutofinal" value="<?php echo $idprodutofinal ?>">
    <input type="hidden" name="nomeproduto" value="<?php echo $nomeproduto ?>">
     <input type="hidden" name="variacao" value="<?php echo $variacao ?>">
     <input type="hidden" name="preco" value="<?php echo $calcpreco ?>">
    <input type="hidden" name="foto" value="<?php echo $foto1 ?>">
   
    
   <input type="submit" class=" btn comprar text-white" value='COMPRAR'>
</form>                       
<div class="recebeDados"></div>                                       
        
                        
<!-- <script>
       window.location.assign("new target URL")
 </script>

 <a class="btn frete btn btn-outline-dark" href="#" >Calcular Frete</a>-->
      
                   </div>
             </div> 
       </div>
 </div>
     <div class="row"><!-- descricao -->
         <div class="col-7">
         <p><small><?php echo" $descricao "; ?></small> </p>
         <p><small><?php  
                // $str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
                 $order   = array("\r\n", "\n", "\r");
                 $replace = '<br/>';
                 // Processes \r\n's first so they aren't converted twice.
                 $newstr = str_replace($order, $replace, $especificacao);
             echo" $newstr ";     ?> </small>
         </p>
             
      </div>
         <div class="col-5"></div>
     </div>
     
</div>

               
 
<?php include("footer.php"); ?>


 