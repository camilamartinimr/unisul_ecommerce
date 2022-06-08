<?php 
include("head.php");

?>
<body>
<?php include("topo.php"); ?>

<div class="container">
    <div class="row pb-2 ">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
    <?php  
              $sql1 = "SELECT * FROM banner ORDER BY idbanner DESC";
                            $query=mysqli_query($con,$sql1);
                            $linhas = mysqli_num_rows($query); 
                                for($z = 0;$z < $linhas ;$z++)   {
                                    $banner=mysqli_fetch_assoc($query);
                                    $idproduto = $banner['idproduto'];
                                    $imagem = $banner['imagem'];
                                    $descricao = $banner['descricao'];
                                        if($z == 0){
                                             echo " <div class='carousel-item active'>
                                         <a href='produto-detalhe.php?id={$idproduto}'>
                                         <img src='img/site/{$imagem}' class='d-block w-100' alt='{$descricao}'></a> 
                                        </div>";
                                        }else{
                                     echo " <div class='carousel-item '>
                                         <a href='produto-detalhe.php?id={$idproduto}'>
                                         <img src='img/site/{$imagem}' class='d-block w-100' alt='{$descricao}'></a> 
                                        </div>";
                                        }
                                }
      ?>
    
   
  </div>
 
   
     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
   </div>
   <div class="row pt-2">
       <div class="col-12 text-center  bg-light"><strong>Destaques</strong></div>
   </div>
   <div class="row pt-3">
   
      <?php
           $sql = "SELECT f.idprodutoideia, f.preco, f.desconto, f.foto1, count(f.idprodutofinal), i.idprodutoideia, i.nomeprodutoideia, i.marca         FROM produtofinal as f INNER JOIN produtoideia as i ON f.idprodutoideia = i.idprodutoideia WHERE i.destaque = 1         GROUP BY i.idprodutoideia";
           $result=mysqli_query($con,$sql);   
           $numlinhas = mysqli_num_rows($result);
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
</div>

    
    
<?php include("footer.php"); ?>