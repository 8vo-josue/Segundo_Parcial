<?php
     
     if( !empty($_POST) ){
   
    // print_r( $_POST );
     //echo "<hr/>";
        $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_producto = utf8_decode($_POST["txt_producto"]);
        $drop_marca = utf8_decode($_POST["drop_marca"]);
        $txt_descripcion = utf8_decode($_POST["txt_descripcion"]);
        $txt_precio_costo = utf8_decode($_POST["txt_precio_costo"]);
        $txt_precio_venta = utf8_decode($_POST["txt_precio_venta"]);
        $txt_existencia= utf8_decode($_POST["txt_existencia"]);
        
      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO productos(producto,idMarca,descripcion,precio_costo,precio_venta,existencia)
          VALUES('".$txt_producto."',".$drop_marca.", '".$txt_descripcion."', '".$txt_precio_costo."', '".$txt_precio_venta."', '".$txt_existencia."');";
        }
        if(isset($_POST['btn_modificar'])  ){
            $sql = "update productos set producto='". $txt_producto ."',idMarca='". $drop_marca ."',descripcion='". $txt_descripcion ."',precio_costo='". $txt_precio_costo ."',precio_venta='". $txt_precio_venta ."', existencia= ". $txt_existencia." where idProducto =". $txt_id.";";
          }
          if( isset($_POST['btn_eliminar'])  ){
            $sql = "delete from productos  where idProducto = ". $txt_id.";";
          }
        
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
            header('Location: /Parcial2');
              
          }else{
            $db_conexion->close();
          
          }

      }

      ?>