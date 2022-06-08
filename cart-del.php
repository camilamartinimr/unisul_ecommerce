 <?php 
     session_start();
if(isset($_POST) && !empty($_POST)){

    $idprodutofinal = $_POST['idprodutofinal'];
  
    $max = sizeof($_SESSION['carrinho']);
   
    for($linha =0; $linha<$max; $linha++){
        if($_SESSION['carrinho'][$linha]['idprodutofinal'] == $idprodutofinal){
             unset($_SESSION['carrinho'][$linha]);
           

        }
    }
    sort($_SESSION['carrinho']);  
    
}else{
    echo "falha no Post!";
}
?>
<script>
       window.location.assign("carrinho.php")
 </script>