<?php
    
    include("conecta_registro.php");
    
    $bd_propu = conectar_registro();
    
    $compra="";
    $correo_comp = $_POST["correo_fl"];
    $ide_prop = $_POST["txtIde"];

    $ssql = "select empresa, correo, producto, cantidad, precio, ide from propuestas where ide like '$ide_prop'";      
    $rres= mysqli_query($bd_propu,$ssql);
    $rresult3 = mysqli_fetch_array($rres);

    if($rresult3!=NULL){
        
        $corr = $rresult3['correo'];

        $con_res2 = "delete from propuestas where ide like '$ide_prop'";
        $ress3 = mysqli_query($bd_propu,$con_res2);

        mysqli_close($bd_propu);

        if($ress3){

            $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
            $sqll = "SELECT * from persona_aux where nombres like '$correo_comp'";
            $resultt = mysqli_query($bd_aux, $sqll);            
            $mostrar=mysqli_fetch_array($resultt);  
            $correo_per = "".$mostrar['nombres'];

            $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
            $sql_comp = "select compras from persona_comprador where nombres like '$correo_per'";
            $sql_comp_2 = mysqli_query($bd,$sql_comp); 
        
            $sql_comp_3 = mysqli_fetch_array($sql_comp_2);  
            $sql_comp_4 = $sql_comp_3['compras'];

            if($rresult3['producto']==1){
                $product="Sal Marina KG";
            }elseif($rresult3['producto']==2){
                $product="Azúcar KG";
            }elseif($rresult3['producto']==3){
                $product="Crema LT";
            }elseif($rresult3['producto']==4){
                $product="Cloruro Cálcico LT";
            }elseif($rresult3['producto']==5){
                $product="Cloruro Sódico KG";
            }elseif($rresult3['producto']==6){
                $product="Coagulante KG";
            }elseif($rresult3['producto']==7){
                $product="Vinagre LT";
            }elseif($rresult3['producto']==8){
                $product="Canela KG";
            }elseif($rresult3['producto']==9){
                $product="Esencias de sabores LT";
            }elseif($rresult3['producto']==10){
                $product="Endulzantes artificiales KG";
            }elseif($rresult3['producto']==11){
                $product="Colorante natural LT";
            }elseif($rresult3['producto']==12){
                $product="Leche entera LT";
            }elseif($rresult3['producto']==13){
                $product="Leche descremada LT";
            }elseif($rresult3['producto']==14){
                $product="Leche en polvo KG";
            }elseif($rresult3['producto']==15){
                $product="Tripolifosfato de Sodio. Estabilizante KG";
            }elseif($rresult3['producto']==16){
                $product="Aceite de palma LT";
            }elseif($rresult3['producto']==17){
                $product="Aceite de soya LT"; 
            }elseif($rresult3['producto']==18){
                $product="Ácido sórbico KG Conservante"; 
            }elseif($rresult3['producto']==19){
                $product="Ácido cítrico KG Cinergista"; 
            }

            $compra = "".$rresult3['empresa']."*".$rresult3['correo']."*".$product."*".$rresult3['cantidad']."*".$rresult3['precio'];

            if($sql_comp_4 == "" || $sql_comp_4==NULL)
            {
                $ssql_bd = "update persona_comprador set compras = '$compra' where nombres like '$correo_per'";
                $rres_bd = mysqli_query($bd,$ssql_bd);  
            }
            else{
                $ssql_bd = "update persona_comprador set compras = concat('$sql_comp_4','|','$compra') where nombres like '$correo_per'";
                $rres_bd = mysqli_query($bd,$ssql_bd);  
            }

            $cant = $rresult3['cantidad'];
            $pre = $rresult3['precio'];

            $bd_propue = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas");

            $ssql_pr = "insert into inventario (correo, producto, cantidad, precio, comprador) values ('$corr','$product','$cant','$pre','$correo_per')";      
            $rres= mysqli_query($bd_propue,$ssql_pr);


            mysqli_close($bd_propue);
            mysqli_close($bd);
            mysqli_close($bd_aux);      

            echo "<script language='JavaScript'>";                     
            echo "location = 'web_comprador.php?user1=$correo_comp'";
            echo "</script>";
        }
    }else{

        echo "<div class='alert alert-danger' role='alert'>No válida o ya fue comprada.</div>";
        echo "<script language='JavaScript'>";                     
        echo "location = 'web_comprador.php?user1=$correo_comp'";
        echo "</script>";

    }
   
?>
