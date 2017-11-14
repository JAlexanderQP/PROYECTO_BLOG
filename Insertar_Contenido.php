<?php 
//Metodo 1 Procedimental
$miConexion = mysqli_connect("localhost", "root", "", "bbddblog");

// Comprobamos la conexxion
if (!$miConexion) {
    echo "La conexion ha fallado" . mysqli_error();
    exit();    
}

if ($_FILE['imagen']['error']) {
   
    switch ($_FILE['imagen']['error']) {
        case 1:
            //Error en exceso en el tamaño
            echo "El tamaño del archivo excede el tamaño del servidor";

        case 2:
            //Error tamaño archivo en el formulario
            echo "El tamaño del archivo excede las 2MB";

            break;
        case 3:
            //Corrupsion de earchivo
            echo "El envio del archivo se interrumpio";
            break;

        case 4:
            //No hay fichero
            echo "No se ha envia ningun archivo";        

            break;       
        
    }

}else {
    echo "Entrada subida correctamente<br>";

    if ((isset($_FILE['imagen']['name'])) || ($_FILE['imagen']['error'])== UPLOAD_ERR_OK) {
       $destino_de_ruta = "imagenes/";
       move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILE['imagen']['name']);

       echo "El archivo" . $_FILE['imagen']['name'] . " se ha copiado correctamente al servidor";
      }else {
          echo "El archivo no se ha podido copia al servidor";
      }
}


$sql="INSERT INTO contenido Titulo, Fecha, Comentario, Imagen VALUES ('Titulo', 'Fecha', 'Comentario', 'Imagen')";


?>