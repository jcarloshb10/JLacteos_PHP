<div class="container">
<?php
                $correo_comp = $_POST["correo_fl"];
                //include('resetPassword.php');
                $key = $_POST["password"];
                $key2 = $_POST["confirm_password"];

                if(!empty($key) && !empty($key2)){
                    
                    $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                    $sqll7 = "SELECT * from claves_aux where nombres like '$correo_comp'";
                    $resultt7 = mysqli_query($bd_aux, $sqll7);            
                    $mostrar7=mysqli_fetch_array($resultt7);

                    if($mostrar7==NULL)
                    {
                        echo "<div class='alert alert-danger' role='alert'><b>No permitido!!</b><br>volver a la página de ingreso..</div>";
   
                    }else{
                        $correo_recu = $mostrar7['nombres'];

                        if($key !== $key2){
                            echo "<div class='alert alert-danger' role='alert'><b>Inválido!</b><br>Contraseñas no coinciden..</div>";
                            
                        }else{  
                                
                                $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 

                                $sqll = "SELECT nombres, claves from persona where nombres like '$correo_recu'";
                                $resultt = mysqli_query($bd, $sqll);     
                                $mostrar=mysqli_fetch_array($resultt);
                                
                                $sqll2 = "SELECT nombres, claves from persona_comprador where nombres like '$correo_recu'";
                                $resultt2 = mysqli_query($bd, $sqll2); 
                                $mostrar_2=mysqli_fetch_array($resultt2);   
                                
                                $data = array(
                                    $key => md5($key)
                                );
                                
                                
                                if($mostrar!=NULL){
                                    $update = "update persona set claves = '$key' where nombres like '$correo_recu'";
                                    $resulttq = mysqli_query($bd, $update); 

                                    $sqll5 = "SELECT nombres, claves from persona where claves like '$key'";
                                    $resultt5 = mysqli_query($bd, $sqll5);  
                                    
                                }
                                elseif($mostrar_2!=NULL){
                                    $update = "update persona_comprador set claves = '$key' where nombres like '$correo_recu'";
                                    $resulttq = mysqli_query($bd, $update); 

                                    $sqll5 = "SELECT nombres, claves from persona_comprador where claves like '$key'";
                                    $resultt5 = mysqli_query($bd, $sqll5);   
                                    
                                }
      
                                if($resulttq){

                                    echo "<div class='alert alert-success' role='alert'><b>Cambio exitoso!</b><br>La contraseña ha sido cambiada.</div>";
                                    
                                    echo "<script language='JavaScript'>";
                                    echo "location = 'index.php'";
                                    echo "</script>";
                                }else{
                                    echo "<div class='alert alert-danger' role='alert'><b>Acceso inválido!</b><br>No fue posible realizar el cambio.</div>";
                                    
                                }
                                
                                $con_res2 = "delete from claves_aux where nombres like '$correo_comp'";
                                $ress3 = mysqli_query($bd_aux,$con_res2);
                                mysqli_close($bd);
                                mysqli_close($bd_aux);
                            
                        }

                    }           
                        
                }else{
                    echo "<div class='alert alert-danger' role='alert'><b>Incorrecto!</b><br>Ingresar valores en los campos.</div>";
                    
                }
            
        ?>
        </div>
        