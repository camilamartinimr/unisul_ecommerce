<?php
    
    function url_where_var(string $where, string $var_nome='', string $var_valor=''){
        $resultado = '';

        if($var_valor != ''){
            $resultado = " $var_nome = $var_valor" ;
            
            if ($where != ''){
                $resultado = " $where AND $resultado ";
            }
        }
        return $resultado;
    }

    function url_where(string $cat=null, string $subcat=null, string $marca=null) {
        $resultado = '';

        if($cat != null)
            $resultado = url_where_var($resultado, 'i.idcategoria', $cat);
        // echo $resultado;
        
        if($subcat !=null)
            $resultado = url_where_var($resultado, 'i.idsubcategoria', $subcat);
       // echo $resultado;
        if($marca !=null)
            $resultado = url_where_var($resultado, 'i.marca', "'".$marca."'");
        
               
        if ($resultado != '')
            $resultado = " WHERE $resultado";
       // echo $resultado;
        
        return $resultado;
    }


?>