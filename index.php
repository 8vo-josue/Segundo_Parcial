<!doctype html>
<html lang="en">
  <head>
    <title>Productos</title>
    <link rel="shortcut icon" href="imagenes/logo.png">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body style="background-color:#FFF9C4 ;" >     
    <div class="col">
    <br>
    <br>
    <div><h1 align="center" class="p-3 mb-2 bg-info text-dark" >UNIVERSIDAD MARIANO GÁLVEZ </h1></div>
     <br>
     <br>
    </div> 
           
  <h1><div align="center" style="background-color:#FDFEFE"> <img src="imagenes/logo.png"  width="1000px" height="300" /></div></h1>
      <div class="container">
          <form class="d-flex" action="crud_producto.php" method="POST" >
            <div class="col">
            <div class="mb-3">
                <label for="lbl_id" class="form-label" ><b>ID</b></label>
                <input type="text" name="txt_id" id="txt_id" class="form-control" value="0"  readonly>
                <br> 
              </div>
              <div class="mb-3">
                <label for="lbl_producto" class="form-label"><b>Producto</b></label>
                <input type="text" name="txt_producto" id="txt_producto" class="form-control" placeholder="Ejemplo: Movil, tablet, Laptop, Accesorios, Impresoras " required>
              </div>
              <div class="mb-3">
                <label for="lbl_marca" class="form-label"><b>Marcas</b></label>
                <select class="form-select" name="drop_marca" id="drop_marca">
                  <option value=0> ---- Marcas ---- </option>
                  <?php 
                   include("datos_conexion.php");
                   $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                   $db_conexion -> real_query ("SELECT idMarca as id,Marca FROM marcas;");
                  $resultado = $db_conexion -> use_result();
                  while ($fila = $resultado ->fetch_assoc()){
                    echo "<option value=". $fila['id'].">". $fila['Marca']."</option>";
                  }
                  $db_conexion ->close();
                  ?>
                </select>
              <div class="mb-3">
                <label for="lbl_descripcion" class="form-label"><b>Descripcion</b></label>
                <input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" placeholder="Ejemplo: Ram: 4GB Rom:1TB, Tamaño pantalla: 14'' " required>
              </div>
              <div class="mb-3">
                <label for="lbl_precio_costo" class="form-label"><b>Precio Costo</b></label>
                <input type="number" name="txt_precio_costo" id="txt_precio_costo" class="form-control" placeholder="Ejemplo: 2222.22" required>
              </div>
              <div class="mb-3">
                <label for="lbl_precio_venta" class="form-label"><b>Precio venta</b></label>
                <input type="number" name="txt_precio_venta" id="txt_precio_venta" class="form-control" placeholder="ejemplo: 9999.99" required>
              </div>
            
              <div class="mb-3">
                <label for="lbl_existencia" class="form-label"><b>Existencia</b></label>
                <input type="number" name="txt_existencia" id="txt_existencia" class="form-control" placeholder="ejemplo: 3" required>
              </div>
              <div class="mb-3"   align="center">
              <br>
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-info btn-lg btn-block" value = "Agregar">
                <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success btn-lg btn-block" value = "Modificar">
                <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger btn-lg btn-block" onclick="javascript:if(!confirm('Seguro que desea eliminar el producto?'))return false" value = "Eliminar">
                <a href="/Parcial2"  class="btn btn-warning btn-lg btn-block">Cancelar</a>
            </div>
            </div>
          </form>
    <table class="table table-striped table-inverse table-responsive" border="4">
      <thead class="thead-inverse">
      <br> 
      <div class="col">
     
				<div><h3 class="p-3 mb-2 bg-secondary text-white" align="center">Lista de Productos en Bodega</h3></div>
                
      </div> 
        <tr>
          <th>Producto</th>
          <th>Marca</th>
          <th>Descripcion</th>
          <th>Precio Costo</th>
          <th>Precio venta</th>
          <th>Existencia</th>
        </tr>
        </thead>
        <tbody id="tabla_productos">
         <?php 
         include("datos_conexion.php");
         $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
         $db_conexion -> real_query ("SELECT p.idProducto as id, p.producto, m.Marca, p.descripcion, p.precio_costo, p.precio_venta, p.existencia, p.idMarca
         FROM productos as p inner join marcas as m on p.idMarca = m.idMarca order by p.idProducto;");
        $resultado = $db_conexion -> use_result();
        while ($fila = $resultado ->fetch_assoc()){
          echo "<tr data-id=". $fila['id']." data-idp=". $fila['idMarca'].">";  
          echo "<td>". $fila['producto']."</td>";
          echo "<td>". $fila['Marca']."</td>";
          echo "<td>". $fila['descripcion']."</td>";
          echo "<td>". $fila['precio_costo']."</td>";
          echo "<td>". $fila['precio_venta']."</td>";
          echo "<td>". $fila['existencia']."</td>";
          echo "</tr>";
        }
        $db_conexion ->close();
         ?>
        </tbody>
    </table>
   
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function limpiar(){
        $("#txt_id").val(0);
        $("#txt_producto").val('');
        $("#drop_marca").val('1');
        $("#txt_descripcion").val('');
        $("#txt_precio_costo").val('');
        $("#txt_precio_venta").val('');
        $("#txt_existencia").val('');
        
    }
    $('#tabla_productos').on('click','tr td',function(evt){
        var target,id,idp,producto,descripcion,precio_costo,precio_venta,existencia;
        target = $(event.target);
        id = target.parent().data('id');
        producto = target.parent("tr").find("td").eq(0).html();
        idp = target.parent().data('idp');
        descripcion = target.parent("tr").find("td").eq(2).html();
        precio_costo = target.parent("tr").find("td").eq(3).html();
        precio_venta = target.parent("tr").find("td").eq(4).html();
        existencia = target.parent("tr").find("td").eq(5).html();
        $("#txt_id").val(id);
        $("#txt_producto").val(producto); 
        $("#drop_marca").val(idp);
        $("#txt_descripcion").val(descripcion);
        $("#txt_precio_costo").val(precio_costo);
        $("#txt_precio_venta").val(precio_venta); 
        $("#txt_existencia").val(existencia);
        $("#modal_empleados").modal('show');     
    });
</script>
</body>
</div>   
<div><h3 class="p-3 mb-2 bg-secondary text-white" align="center">   </h3></div>
<div align="center">
        <h3>Redes Sociales</h3>
        <a href="https://www.facebook.com/compulineguate/" target="_blank"><img src="imagenes/face.png" width="90px" height="90"></a>
        <a href="#" target="_blank"><img src="imagenes/dri.png" width="90px" height="90"></a>
        <a href="#" target="_blank"><img src="imagenes/git.png" width="90px" height="90"></a>
        <a href="https://wa.me/12345678" target="_blank"><img src="imagenes/whatsapp.jpg" width="90px" height="90"></a>
       </div>
       <br>
       <div><h1 align="center" class="p-3 mb-2 bg-info text-dark">Desarrollo Web</h1><div>
</html>
