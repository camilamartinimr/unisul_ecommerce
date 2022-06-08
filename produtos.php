<?php 
include("head.php");
include("sql_apoio.php");
?>
<body>
<?php include("topo.php"); 
@$cat = $_GET['cat'];
@$sub = $_GET['sub'];
@$mstr = $_GET['marca'];
@$ofertas = $_GET['ofertas'];
    
$order   = array("'", "’", "`");
$replace = array("\'", "\’", "\`");
$marca = str_replace($order, $replace, $mstr);    
  
?>

<div class="container">
    <div class="row">
        
   
    <?php  
         $sql_select = "SELECT f.idprodutofinal, f.idprodutoideia, f.foto1, f.preco, f.desconto, count(f.idprodutofinal), i.idprodutoideia, i.nomeprodutoideia, i.marca, i.idcategoria, i.idsubcategoria";
         $sql_from = " FROM produtofinal AS f INNER JOIN produtoideia AS i ON f.idprodutoideia = i.idprodutoideia ";
         $sql_group_by = " GROUP BY i.idprodutoideia ";
     
        if(isset($_POST) && !empty($_POST)){
            @$pstr = $_POST['pesquisa'];
            @$pesquisa = str_replace($order, $replace, $pstr); 
             $sql_where_pesquisa =" WHERE i.nomeprodutoideia LIKE '%$pesquisa%' OR i.especificacao  LIKE '%$pesquisa%'";
              $sql = "$sql_select $sql_from $sql_where_pesquisa $sql_group_by";
        
        }else if($ofertas == 'ofertas'){
            $sql_where_ofertas =" WHERE f.desconto >= 25";         
            $sql = "$sql_select $sql_from $sql_where_ofertas $sql_group_by";
        }else{
        
            $sql_where = url_where($cat, $sub, $marca);
            $sql = "$sql_select $sql_from $sql_where $sql_group_by";
    
       }
        
    $result=mysqli_query($con, $sql);
   
    $numlinhas = mysqli_num_rows($result);
     if($numlinhas == 0)    {
        
        echo "<div class='col-12  m-4 '>
            <h3 class='text-center'>Ops! Sua busca por </>" .@$pesquisa. " não encontrou nenhum resultado :(</h3>
            </div>";
        
    }
  

    for($x = 0;$x < $numlinhas ;$x++)   {
        
        $produto=mysqli_fetch_assoc($result);
        $idproduto = $produto['idprodutoideia'];
        $calcdesconto = ($produto['desconto'] *  $produto['preco'])/100;
        $calcpreco = $produto['preco'] - $calcdesconto;
        $precoantes = 'R$'. number_format($produto['preco'], 2, ',', '.');
        $preco = number_format($calcpreco, 2, ',', '.');
        $divdesconto = "<span class='float-left hotpink rounded p-1'> -". $produto['desconto']."% </span>";
        if($produto['count(f.idprodutofinal)']!== '1') {
                $divdopcoes = "<p class='bg-light text-center text-muted'>+".$produto['count(f.idprodutofinal)']." opções </p>"; 
            }else{
            $divdopcoes = "<p><br></p>";
        }  
        $nome = mb_strimwidth($produto['nomeprodutoideia'], 0, 60, "");            
        if($produto['desconto'] == 0){$precoantes = ""; $divdesconto = "<span class='float-left p-1'><br></span>";}
        
        echo " 
               <div class='col-3  mb-4 '>
                
                $divdesconto 
                 <a href='produto-detalhe.php?id={$idproduto}'><img src='img/{$produto['foto1']}'class='img-fluid p-2'  ></a>
                 $divdopcoes
                <p class='text-uppercase font-weight-bold'>{$produto['marca']} </p>
                
                <p><a href='produto-detalhe.php?id={$idproduto}'> {$nome}</a></p>
                <span class='tachado'> {$precoantes}  </span>
                <span class='font-weight-bold'> R$ {$preco} </span>  </div>"; 
        }
        
      
    ?>
   
   
   
    
   
   
   
    </div>
</div>

    
    
<?php include("footer.php"); ?>