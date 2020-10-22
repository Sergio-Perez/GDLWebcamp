<?php 
 $id = $_GET["id"];

 if(!filter_var($id, FILTER_VALIDATE_INT)){
     header("location:../404.html");
     exit();
 }
    include_once "funciones/sesiones.php";

    include_once "funciones/funciones.php";

    include_once "templates/header.php";
    include_once "templates/barraSuperior.php";
    include_once "templates/navegacion.php";


?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar registro de usuario manualmente
                        <span>Rellena el formulario para editar a un usuario registrado. </span>
                    </h1>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <!-- Default box -->

                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edita registro de usuario.</h3>
                        </div>
                        <?php
                            $sql = " SELECT * FROM registrados WHERE ID_Registrado = $id ";
                            $resultado = $conn->query($sql);
                            $registrado =$resultado->fetch_assoc();                                               
                        ?>                        
                        <!-- form start -->
                        <form class="editar-registrado" role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nombre_registrado">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $registrado["nombre_registrado"];?>">
                                    </div>
                                    <div id="error"></div> 
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $registrado["apellido_registrado"];?>">
                                    </div>
                                    <div id="error"></div> 
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $registrado["email_registrado"];?>">
                                    </div>
                                    <div id="error"></div> 
                                </div>

                                <?php 
                                    $pedido = $registrado["pases_articulos"];
                                    $boletos = json_decode( $pedido,true);
                                   
                                                                  
                                
                                ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="paquetes" id="paquetes">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Elige la cantidad de entradas</h3>
                                                <br>
                                            </div>
                                            <ul class="lista-precios clearfix row ">
                                                <li class="col-md-4">
                                                    <div class="tabla-precio text-center">
                                                        <h3>Pase por Día (Viernes)</h3>
                                                        <br>
                                                        <p class="numero">$30</p>
                                                        <ul>
                                                            <li>Bocadillos Gratis</li>
                                                            <li>Todas la conferencias</li>
                                                            <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_dia">Entradas deseadas</label>
                                                            <input value="<?php echo $boletos["un_dia"]?>" type="number"  class="form-control" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0" >
                                                            <input type="hidden"  value="30" name="boletos[un_dia][precio]">
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="col-md-4">

                                                    <div class="tabla-precio text-center">
                                                        <h3>Todos los días</h3>
                                                        <br>
                                                        <p class="numero"> $50</p>
                                                        

                                                        <ul>
                                                            <li>Bocadillos Gratis</li>
                                                            <li>Todas la conferencias</li>
                                                            <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_completo">Entradas deseadas</label>
                                                            <input  value="<?php echo $boletos["pase_completo"]?>" type="number"  class="form-control" min="0" id="pase_completo" size="3"  name="boletos[completo][cantidad]" placeholder="0">
                                                            <input type="hidden"   value="50" name="boletos[completo][precio]">

                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-md-4">

                                                    <div class="tabla-precio text-center">
                                                        <h3>Pase por 2 días (Viernes y sábado)</h3>
                                                        <p class="numero">$45</p>
                                                        <ul>
                                                            <li>Bocadillos Gratis</li>
                                                            <li>Todas la conferencias</li>
                                                            <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_dosdias">Entradas deseadas</label>
                                                            <input type="number"   value="<?php echo $boletos["pase_dias"]?>" class="form-control" min="0" id="pase_dosdias" size="3" name="boletos[dos_dias][cantidad]"  placeholder="0">
                                                            <input type="hidden"    value="45" name="boletos[dos_dias][precio]">

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--paquetes-->
                                    </div><!--form-group-->

                                </div><!--card-body-->
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Elige los talleres</h3>
                                            <br>
                                        </div>
                                        <div id="eventos" class="eventos clearfix">
                                            <div class="caja">
                                                <?php 
                                                    $eventos = $registrado["talleres_registrados"];
                                                    $id_eventos_registrados = json_decode($eventos,true);
                                                ?>
         
                                                <?php 
                                                try {
                                                    $sql  = "SELECT eventos.* , categoria_evento.cat_evento ,invitados.nombre_invitado, invitados.apellido_invitado ";
                                                    $sql .= " FROM eventos ";
                                                    $sql .= " JOIN categoria_evento ";
                                                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                                                    $sql .= " JOIN invitados ";
                                                    $sql .= " ON eventos.id_inv = invitados.invitados_id ";
                                                    $sql .= " ORDER BY eventos.fecha_evento , eventos.id_cat_evento, eventos.hora_evento";
                                                    $resultado = $conn->query($sql);
                                                } catch (\Exception $e) {
                                                    echo $e->getMessage();
                                                }

                                                $eventos = $resultado->fetch_assoc();

                                                $eventos_dias = array();
                                                while($eventos = $resultado->fetch_assoc()){
                                                    $fecha = $eventos["fecha_evento"];
                                                    setlocale(LC_ALL,"es_ES"); // Para MAC
                                                    setlocale(LC_TIME, 'spanish, UTF-8'); // Para Windows
                                                    setlocale(LC_TIME, 'es_ES.UTF-8'); // Para Ubuntu
                                                    $dia_semana = (strftime("%A", strtotime($fecha)));
                                                    
                                                    $categoria = $eventos["cat_evento"];

                                                    $dia = array (
                                                        "nombre_evento" => $eventos["nombre_evento"],
                                                        "hora" => $eventos["hora_evento"],
                                                        "id" => $eventos["evento_id"],
                                                        "nombre_invitado" => $eventos["nombre_invitado"],
                                                        "apellido_invitado" => $eventos["apellido_invitado"],
                                                    );
                                                    $eventos_dias[$dia_semana]["eventos"][$categoria][] = $dia;

                                                } ?>
                                                <?php 
                                                foreach($eventos_dias as $dia => $eventos) { ?>
                                                <div id="<?php echo str_replace("á","a",$dia);?>" class="contenido-dia clearfix">
                                                    <h4 class="text-center nombre-dia"><?php echo $dia?></h4>
                                                    <div class="row clearfix">

                                                        <?php
                                                    
                                                        foreach($eventos["eventos"] as $tipo => $evento_dia):?>                            
                                                            <div class="col-md-4">
                                                                <p class="nombre-evento"><?php echo $tipo ?>:</p>

                                                                <?php foreach($evento_dia  as $evento){ ?>
                                                                    <div class="icheck-success">                                                                                                                      
                                                                        <input <?php echo (in_array( $evento["id"], $id_eventos_registrados["eventos"]) ? "checked" : ""); ?> type="checkbox"  name="registro_evento[]" id="<?php echo $evento["id"];?>" value="<?php echo $evento["id"];?> " >
                                                                        <label for ="<?php echo $evento["id"];?>">
                                                                            <time><?php echo $evento["hora"];?> </time> <option><?php echo $evento["nombre_evento"];?> </option> 
                                                                            <span class="autor"><?php echo $evento["nombre_invitado"] . " " . $evento["apellido_invitado"];?></span>
                                                                        </label>
                                                                    </div>
                                                                <?php } // foreach  $evento_dia?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <!--contenido-dia-->

                                                    </div>
                                                </div>
                                                <?php }?>
                                                            
                                                            <!--.caja-->
                                            </div>
                                                <!--#eventos-->

                                                <div id="resumen" class="resumen clearfix ">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Pagos y Extras</h3>
                                                        <br>
                                                    </div>
                                                    <div class="caja clearfix row">
                                                        <div class="extras col-md-6">
                                                            <div class="orden">
                                                                <label for="camisa_evento">Camisa del evento $10 <small>(promoción 7% dto.)</small></label> <br>
                                                                <input value="<?php echo $boletos["camisas"]?>" type="number" class="form-control" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size=3 placeholder="0">
                                                                <input type="hidden" value="10" name="pedido_extra[camisas][precio]">

                                                            </div>
                                                            <div class="orden">
                                                                <label for="etiquetas">Paquete de 10 etiquetas <small>(HTML, CSS3, JavaScript, Chrome)</small></label> <br>
                                                                <input value="<?php echo $boletos["etiquetas"]?>"  type="number" class="form-control" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size=3 placeholder="0">
                                                                <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">

                                                            </div>
                                                            <div class="orden">
                                                                <label for="regalo">Seleccione un regalo</label> <br>
                                                                <select id="regalo" name="regalo" class="form-control select2" required>
                                                                    <option value="">---Seleccione un regalo---</option>
                                                                    <option value="2" <?php echo ($registrado["regalo"] == 2 ) ? "selected" : "" ?> >Etiquetas</option>
                                                                    <option value="1" <?php echo ($registrado["regalo"] == 1 ) ? "selected" : "" ?> >Pulsera</option>
                                                                    <option value="3" <?php echo ($registrado["regalo"] == 3 ) ? "selected" : "" ?> >Pluma</option>

                                                                </select>
                                                            </div>
                                                                <!--orden-->
                                                            <br>
                                                            <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                                        </div>
                                                             <!--extras-->
                                                            
                                                        <div class="total col-md-6">
                                                            <p>Resumen</p>
                                                            <div id="lista-productos"></div>

                                                            <p>Total Ya Pagado: <span> <?php echo (float) $registrado["total_pagado"] ?> </span></p>
                                                            <p>Total</p>
                                                            <div id="suma-total"></div>
                                                            <input type="hidden" class=" "name="total_pedido" id="total_pedido">
                                                        </div>
                                                        <!--total-->
                                                    </div>
                                                    <!--caja-->

                                                </div>
                                                <!--resumen-->
                                        </div><!--eventos-->
                                    </div><!--form-group-->                                                      
                                </div><!-- /.card-body -->

  
                                <div class="card-footer">
                                    <input type="hidden" name="registro" value="actualizar">
                                    <input type="hidden" name="id_registro" value="<?php echo $registrado["ID_Registrado"];?>">
                                    <input type="hidden" name="fecha_registro" value="<?php echo $registrado["fecha_registro"];?>">

                                    <button type="submit" class="btn btn-primary"  id="btnRegistro" >Añadir</button>
                                </div>
                                
                         </form>
                    </div><!--card-primary-->
                </div>           <!-- /.card-body -->

            </div><!--col-md-8-->
        </div>  <!-- /.card -->

    </section>
            <!-- /.content -->
</div><!-- /.content-wrapper -->


<?php 
include_once "templates/footer.php";



?>