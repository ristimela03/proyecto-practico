<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
include("bd.php");

$Id=(isset($_POST['Id']))?$_POST['Id']:"";
$Identificacion=(isset($_POST['tipo_identificacion']))?$_POST['tipo_identificacion']:"";
$TerceroA=(isset($_POST['tipo_tercero']))?$_POST['tipo_tercero']:"";
$Departamento=(isset($_POST['departamento']))?$_POST['departamento']:"";
$Ciudad=(isset($_POST['ciudad']))?$_POST['ciudad']:"";
$Contribuyente=(isset($_POST['tipo_contribuyente']))?$_POST['tipo_contribuyente']:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";



switch($accion){
    case "Agregrar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO tipos_lista (tipo_identificacion,tipo_tercero,departamento,ciudad,tipo_contribuyente) VALUES (:tipo_identificacion,:tipo_tercero,:departamento,:ciudad,:tipo_contribuyente);");
        $sentenciaSQL->bindParam(':tipo_identificacion',$Identificacion);
        $sentenciaSQL->bindParam(':tipo_tercero',$Tercero);
        $sentenciaSQL->bindParam(':departamento',$Departamento);
        $sentenciaSQL->bindParam(':ciudad',$Ciudad);
        $sentenciaSQL->bindParam(':tipo_contribuyente',$Contribuyente);


        header("location:terceros.php");
        
        break;

    case "Modificar":
        $sentenciaSQL= $conexion->prepare("UPDATE tipos_lista SET tipo_identificacion=:tipo_identificacion WHERE Id=:Id");
        $sentenciaSQL->bindParam(':tipo_identificacion',$Identificacion);
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE tipos_lista SET tipo_tercero=:tipo_tercero WHERE Id=:Id");
        $sentenciaSQL->bindParam(':tipo_tercero',$Tercero);
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE tipos_lista SET departamento=:departamento WHERE Id=:Id");
        $sentenciaSQL->bindParam(':departamento',$Departamento);
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE tipos_lista SET ciudad=:ciudad WHERE Id=:Id");
        $sentenciaSQL->bindParam(':ciudad',$Ciudad);
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE tipos_lista SET tipo_contribuyente=:tipo_contribuyente  WHERE Id=:Id");
        $sentenciaSQL->bindParam(':tipo_contribuyente',$Contribuyente);
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        
        header("location:terceros.php");
           
        

        break;
        
    case "Cancelar":
        header("location:terceros.php");
        break;
        
    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM tipos_lista WHERE Id=:Id");
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();
        $Ter=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $Identificacion=$Ter['tipo_identificacion'];
        $Tercero=$Ter['Tipo_tercero'];
        $Departamento=$Ter['departamento'];
        $Ciudad=$Ter['ciudad'];
        $Contribuyente=$Ter['tipo_contribuyente'];

        break; 

    case "Borrar":
        
        $sentenciaSQL= $conexion->prepare("DELETE  FROM tipos_lista WHERE Id=:Id");
        $sentenciaSQL->bindParam(':Id',$Id);
        $sentenciaSQL->execute();

        

        
        break; 
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM tipos_lista");
$sentenciaSQL->execute();
$listaTer=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del Tercero
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
    <div class = "form-group">
    <label for="Id">Id:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $Id;?>" name="txtId" id="Id"  placeholder="Id">
    </div>

    <div class="form-group">
      <label  for="tipo_identificacion">Tipo de identificacion:</label>
              
        <option>*Cedula de ciudadania</option>
        <option>*Tarjeta de identidad</option>
        <option>*Nit</option>
        <option>*Pasaporte</option>
        <input type="text" required class="form-control" value="<?php echo $Identificacion;?>" name="tipo_identificacion" id="tipo_identificacion"  placeholder="TIPO DE IDENTIFICACION">
      
    </div>

    <div class="form-group">
      <label for="tipo_tercero">Tipo de tercero:</label>
      <option>*Paciente</option>
        <option>Empleado</option>
        <option>Contratista</option>
        <option>Otro</option>
        
        <input type="text" required class="form-control" value="<?php echo $TerceroA;?>" name="tipo_tercero" id="tipo_tercero"  placeholder="TIPO DE TERCERO">
        
      
    </div>

    <div class="form-group">
      <label for="departamento">Departamento:</label>
      
        <option>*Amazonas</option>
        <option>*Antioquia</option>
        <option>*Arauca</option>
        <option>*Cundinamarca</option>
        <input type="text" required class="form-control" value="<?php echo $Departamento;?>" name="departamento" id="departamento"  placeholder="DEPARTAMENTO">
    </div>

    <div class="form-group">
      <label for="ciudad">Ciudad</label>
      
        <option>*leticia</option>
        <option>*Medellin</option>
        <option>*Saravena</option>
        <option>Bogota</option>
        <input type="text" required class="form-control" value="<?php echo $Ciudad;?>" name="ciudad" id="ciudad"  placeholder="CIUDAD">
    </div>

    <div class="form-group">
      <label for="tipo_contribuyente">Tipo de contribuyente</label>
      
        <option>*Gran contribuyente</option>
        <option>*Responsable de IVA</option>
        <option>*Regimen especial</option>
        <option>Otro</option>
        <input type="text" required class="form-control" value="<?php echo $Contribuyente;?>" name="tipo_contribuyente" id="tipo_contribuyente"  placeholder="TIPO DE CONTRIBUYENTE">
    </div>

    

    

    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" <?php echo ($accion=="seleccionar")?"disabled":"";?> value="Agregrar" class="btn btn-success">Agregar</button>
        <button type="submit" name="accion"  value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion"  value="Cancelar" class="btn btn-info">Cancelar</button>
    </div>
    </form>
    
        </div>
        
    </div>


    
    
    
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>tipo identificacion</th>
                <th>tipo tercero</th>
                <th>departamento</th>
                <th>ciudad</th>
                <th>tipo contribuyente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaTer as $Tercero) { ?>
            <tr>
                <td><?php echo $Tercero['Id'];?> </td>
                <td><?php echo $Tercero['tipo_identificacion'];?></td>
                <td><?php echo $Tercero['tipo_tercero'];?></td>
                <td><?php echo $Tercero['departamento'];?></td>
                <td><?php echo $Tercero['ciudad'];?></td>
                <td><?php echo $Tercero['tipo_contribuyente'];?></td>
            
                <td>
 

                <form  method="post">
                    <input type="hidden" name="Id" id="Id" value="<?php echo $Tercero['Id'];?>"> 

                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>


                </form>
            
            
            </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>