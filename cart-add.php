<?php 
session_start();
if(isset($_POST) && !empty($_POST)){

    $idprodutofinal = $_POST['idprodutofinal'];
    $nomeproduto = $_POST['nomeproduto'];
    $variacao = $_POST['variacao'];
    $preco = $_POST['preco']; 
    $foto = $_POST['foto'];


    if(!isset($_SESSION['carrinho'])){
        //se carrinho ainda não foi definido, cria um array
        $_SESSION['carrinho'] = array();
        $item = array("idprodutofinal"=>intval ($idprodutofinal),
                        "nomeproduto"=>$nomeproduto,
                        "variacao"=>$variacao,
                        "preco"=>$preco,
                        "foto"=>$foto,
                        "quantidade"=>1);
                        array_push($_SESSION['carrinho'], $item);

    }else{
        $max = sizeof($_SESSION['carrinho']);
        $encontrou=false;
        for($linha = 0; $linha < $max ;$linha++) {
               //percorre e verifica se o item já está no vetor 
               if($_SESSION['carrinho'][$linha]['idprodutofinal']==$idprodutofinal){
                        $_SESSION['carrinho'][$linha]['quantidade'] += 1;
                        
                        $encontrou = true;
               }


    }
    if(!$encontrou){
                   $item = array("idprodutofinal"=>intval ($idprodutofinal),
                    "nomeproduto"=>$nomeproduto,
                    "variacao"=>$variacao,
                    "preco"=>$preco,
                     "foto"=>$foto,
                    "quantidade"=>1);
                    array_push($_SESSION['carrinho'], $item);
    }
    }
    if($_SESSION['carrinho']){
        echo"Produto adicionado à sacola! <a href='carrinho.php'>Ver Sacola</a>";
    }else{
        var_dump($_SESSION['carrinho']);
    }
}else{
    echo"ERRO";
}
?>    


