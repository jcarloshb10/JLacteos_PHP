<?php
    //sleep(5);
    $correo_comp = $_POST["correo_fl"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="background-color: rgb(12, 13, 97);">
             
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="col-4">
        
                </div>

                <div class="col-3">
                    <nav class="navbar">
                        
                        <button id="btn_logout" onclick="<?php echo "location = 'cerrando.php?user1=$correo_comp'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Cerrar sesión</b>    
                        </button>
                            
                    </nav>
                </div>

            </nav> 

        <div class="row">

                <div align="center" class="col-4" style="padding-top:20px;">
                    <img alt="Image html" width="80%" src="img/colacteos.jpeg"/>
                </div>
                
                <div class="col-7 order-last" align="center" style="padding-top:20px;">
            
                    <div class="container" style="background-color: rgb(248, 243, 241);">  

                            <div id="ventana3" class='alert alert-success' role='alert'>
                                
                                        <div>
                                            <h5 class="modal-title" style="color:blue;">Tus Notas: </h5>
                                        </div>
                                        <div>
                                          <br>
                                        <?php
                                        
                                        if(!isset($_POST["text"])){
                                          echo "<div class='alert alert-danger' role='alert'>No agregó un campo.</div>";
                                          sleep(4);
                                          
                                            echo "<script language='JavaScript'>";
                                            echo "location = 'web_comprador.php?user1=$correo_comp'";
                                            echo "</script>";
                                      }else{
                                          $cuantos = count($_POST["text"]);
                                          $texto = $_POST["text"][0];
                                          if($texto == ""){
                                                  
                                                  echo "<div class='alert alert-danger' role='alert' value='No válido!'>Agregó campo vacío</div>";
                                                   sleep(4);
                                                  
                                                    echo "<script language='JavaScript'>";
                                                    echo "location = 'web_comprador.php?user1=$correo_comp'";
                                                    echo "</script>";
                                                    
                                                    // echo "<script language='JavaScript'>";
                                                    // echo "console.log('1 Y VACIOOOO')";
                                                    // echo "</script>";
                                              }else{
                                                   $i=0;
                                                  $nota = "";
        
                                                  $bd_prop0 = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
        
                                                  $sql_prop0 = "SELECT nombres from persona_aux where nombres like '$correo_comp'";
                                                  $resultt_prop0 = mysqli_query($bd_prop0, $sql_prop0); 
                                                  $mostrar00=mysqli_fetch_array($resultt_prop0); 
                                                  $correo00 = "".$mostrar00['nombres'];
        
                                                  mysqli_close($bd_prop0); 
                                                  
                                                    while($i < $cuantos){
                                                    
                                                    if($_POST["text"][$i]!="" && $_POST["text"][$i]!=NULL){
        
                                                     $nota .= "".$_POST["text"][$i];
                                                      
                                                      echo "<div class='alert alert-success' role='alert'>".$_POST["text"][$i]."</div>";
                                                   
                                                      if($i!=$cuantos-1){
                                                    
                                                        $nota .= "|";
                                                        
                                                      }
                                                    }
                                                    $i++;
                                                    
                                                  }
                                                  
                                                  if($i==$cuantos){
                                                      
                                                      $bd_nota = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
        
                                                      $sql_prop000 = "SELECT notas from persona_comprador where nombres like '$correo00'";
                                                      $resultt_prop000 = mysqli_query($bd_nota, $sql_prop000); 
                                                      $mostrar0000=mysqli_fetch_array($resultt_prop000); 
                                                      $nota_anterior = "".$mostrar0000['notas'];
                                    
                                                      if($nota_anterior=="")
                                                      {
                                                        $sqll01 = "update persona_comprador set notas = '$nota' where nombres like '$correo00'";
                                                        $resultt01 = mysqli_query($bd_nota, $sqll01); 
                                                      }
                                                      else{
                                                       
                                                        $sqll0 = "update persona_comprador set notas = concat('$nota_anterior','|','$nota') where nombres like '$correo00'";
                                                        $resultt0 = mysqli_query($bd_nota, $sqll0); 
                                                      }
                                                     
                                                      mysqli_close($bd_nota);
                                                  }
                                                  
                                              }
                                      }
                                          
                                          
                                        ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="<?php echo "location = 'web_comprador.php?user1=$correo_comp'"; ?>" class="btn btn-default" data-dismiss="modal"  style="box-shadow: 4px 4px rgb(12, 13, 97); color:black;font-family:Roboto;"><b>Regresar</b></button>
                                        </div>       
                                   
                            </div>
                                                   
                    </div>

                </div>              

        </div>
    
        <br><br><br>
        <br><br><br>
        <br><br><br>      
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>