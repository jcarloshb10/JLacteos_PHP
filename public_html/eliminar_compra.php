<?php
    
    $correo_comp = $_POST["correo_fl"];
    
    include("conecta_registro.php");
    $bd_propu = conectar_registro();

    $compra="";
    $ide_prop = $_POST["txtIden"];

    $ssql = "select correo, producto, cantidad, precio, comprador, ide from inventario where ide like '$ide_prop'";      
    $rres= mysqli_query($bd_propu,$ssql);
    $rresult3 = mysqli_fetch_array($rres);

    if($rresult3!=NULL){

        $corr = $rresult3['correo'];
        $correo = $rresult3['comprador'];

        $con_res2 = "delete from inventario where ide like '$ide_prop'";
        $ress3 = mysqli_query($bd_propu,$con_res2);
  
        $product = $rresult3['producto'];
        $canti = $rresult3['cantidad'];
        $preci = $rresult3['precio'];
        $id = $rresult3['ide'];

        $con_res2_0 = "insert into canceladas values ('$corr','$product','$canti','$preci','$correo','$id');";
        $ress3_0 = mysqli_query($bd_propu,$con_res2_0);

        mysqli_close($bd_propu);

        if($ress3){

            $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
            $sql_comp = "select mensajes from persona_comprador where nombres like '$correo'";
            $sql_comp_2 = mysqli_query($bd,$sql_comp); 
        
            $sql_comp_3 = mysqli_fetch_array($sql_comp_2);  
            $sql_comp_4 = $sql_comp_3['mensajes'];

            $compra = "CANCELADA: ".$rresult3['correo']."*".$rresult3['producto']."*".$rresult3['cantidad']."*".$rresult3['precio']."*".$rresult3['comprador'];

            if($sql_comp_4 == "" || $sql_comp_4==NULL)
            {
                $ssql_bd = "update persona_comprador set mensajes = '$compra' where nombres like '$correo'";
                $rres_bd = mysqli_query($bd,$ssql_bd);  
            }
            else{
                $ssql_bd = "update persona_comprador set mensajes = concat('$sql_comp_4','|','$compra') where nombres like '$correo'";
                $rres_bd = mysqli_query($bd,$ssql_bd);  
            }

            $sql_comp_0 = "select cont_mensajes from persona_comprador where nombres like '$correo'";
            $sql_comp_2_0 = mysqli_query($bd,$sql_comp_0); 
        
            $sql_comp_3_0 = mysqli_fetch_array($sql_comp_2_0);  
            $sql_comp_4_0 = $sql_comp_3_0['cont_mensajes'];
            $cont_new = $sql_comp_4_0 + 1;


            $ssql_bd_0 = "update persona_comprador set cont_mensajes = '$cont_new' where nombres like '$correo'";
            $rres_bd_0 = mysqli_query($bd,$ssql_bd_0); 

            $sql_comp_8 = "select mensajes from persona where nombres like '$corr'";
            $sql_comp_2_8 = mysqli_query($bd,$sql_comp_8); 
        
            $sql_comp_3_8 = mysqli_fetch_array($sql_comp_2_8);  
            $sql_comp_4_8 = $sql_comp_3_8['mensajes'];

            if($sql_comp_4_8 == "" || $sql_comp_4_8==NULL)
            {
                $ssql_bd_7 = "update persona set mensajes = '$compra' where nombres like '$corr'";
                $rres_bd_7 = mysqli_query($bd,$ssql_bd_7);  
            }
            else{
                $ssql_bd_8 = "update persona set mensajes = concat('$sql_comp_4_8','|','$compra') where nombres like '$corr'";
                $rres_bd_8 = mysqli_query($bd,$ssql_bd_8);  
            }

            $sql_comp_7 = "select cont_mensajes from persona where nombres like '$corr'";
            $sql_comp_2_7 = mysqli_query($bd,$sql_comp_7); 
        
            $sql_comp_3_7 = mysqli_fetch_array($sql_comp_2_7);  
            $sql_comp_4_7 = $sql_comp_3_7['cont_mensajes'];
            $cont_new = $sql_comp_4_7 + 1;

            $ssql_bd_0_7 = "update persona set cont_mensajes = '$cont_new' where nombres like '$corr'";
            $rres_bd_0_7 = mysqli_query($bd,$ssql_bd_0_7); 
            
            mysqli_close($bd);
            
            echo "<script language='JavaScript'>";                     
            echo "location = 'web_administrador.php?user1=$correo_comp'";
            echo "</script>";
        }


    }else{

        echo "<div class='alert alert-danger' role='alert'>No válida o ya fue cancelada.</div>";
        echo "<script language='JavaScript'>";                     
        echo "location = 'web_administrador.php?user1=$correo_comp'";
        echo "</script>";

    }
    
?>
