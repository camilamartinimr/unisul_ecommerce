<?php 
ini_set('display_errors', '0');
 session_start();
include("laravel-url.php");
include("head.php");

if(!isset($_SESSION['carrinho'][0]) ){
    $carrinhovazio = true;
}else{
     $carrinhovazio = false;
}



?>

<body>
<?php include("topo.php");


?>
    



<div class="container">
     
      
        <?php 
  
            if(@$carrinhovazio == true){
                
                echo "<div class='row'><div class='col-12 text-center  '>Sua sacola está vazia :( <br><br> <a class=' btn  text-white comprar ' href='index.php'> ESCOLHER PRODUTOS </a> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  </div></div>";
            }else{
                echo"<div class='row'>
                        <div class=' col-6'>Produto</div>
                        <div class=' col-1'>Preço</div>
                        <div class=' col-2 text-center'>Quantidade</div>
                        <div class=' col-2'>Total</div>
                        <div class=' col-1'>Excluir</div>
                    </div>
                    <hr>";
                
                
                 //var_dump($_SESSION['carrinho']);
                
                  
                 $lixeira =  '<i>far fa-trash-alt </i> ' ;      
                 $max = sizeof($_SESSION['carrinho']);
                 for($linha =0; $linha<$max; $linha++){
                     $precoformatado = number_format($_SESSION['carrinho'][$linha]['preco'], 2, ',', '.');   
                     $total =  floatval( ($_SESSION['carrinho'][$linha]['preco']) * ($_SESSION['carrinho'][$linha]['quantidade']))   ;
                     $totalformatado = number_format($total, 2, ',', '.');
                     $totalitens += $_SESSION['carrinho'][$linha]['quantidade'];
                     $subtotal += $_SESSION['carrinho'][$linha]['preco'] * $_SESSION['carrinho'][$linha]['quantidade'] ;
                     $subtotalformatado = number_format($subtotal, 2, ',', '.');   
                     echo"   
                
                           <div class='row'>
                            <div class=' col-1'> <img src='img/{$_SESSION['carrinho'][$linha]['foto']}' class='img-fluid' alt=''> </div>
                            <div class=' col-5'> {$_SESSION['carrinho'][$linha]['nomeproduto']} - {$_SESSION['carrinho'][$linha]['variacao']} </div>
                            <div class=' col-1'> {$precoformatado} </div>
                            <div class=' col-2 text-center'>{$_SESSION['carrinho'][$linha]['quantidade']}</div>

                            <div class=' col-2'>{$totalformatado}</div>
                            <div class=' col-1'>
                                    <form action='cart-del.php'  method='post'>
                                       <input type='hidden' name='idprodutofinal' value='{$_SESSION['carrinho'][$linha]['idprodutofinal']}'>
                                       <button class=' btn' type='submit'><i class='far fa-trash-alt'></i></button>
                                   </form> 
                               
                            </div>
                        </div><hr>";
                     };
                         
                       echo"   <div class='row'>
                           <div class='col-7 '><a  href='index.php'><button class=' btn' ><i class='fas fa-arrow-left'></i></button> Escolher mais produtos </a></div>
                            <div class='col-2  text-center'>Itens:</div>
                            <div class='col-3 '>Subtotal:</div>
                       </div>
                       <div class='row'>
                           <div class='col-7 '></div>
                            <div class='col-2  text-center'><?php echo '$totalitens' ?></div>
                            <div class='col-3 '><?php echo 'R$: $subtotalformatado' ?></div>
                       </div>
                       <div class='row'>    
                        <div class='col-12  text-right ' ><br><a class=' btn  text-white comprar ' href='#'> FECHAR PEDIDO </a><br><br><br><br><br><br><br><br></div>
                       </div> ";
                 
                        
                     } 
                 
         
                     
        ?>  
       


       
      
      <!-- -->
 </div>
 
<?php include("footer.php"); ?>