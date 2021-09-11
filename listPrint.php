
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    

  <?php
$ruta_powershell = 'c:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe'; #Necesitamos el powershell
$opciones_para_ejecutar_comando = "-c";#Ejecutamos el powershell y necesitamos el "-c" para decirle que ejecutaremos un comando
$espacio = " "; #ayudante para concatenar
$comillas = '"'; #ayudante para concatenar
$comando = 'get-WmiObject -class Win32_printer |ft name'; #Comando de powershell para obtener lista de impresoras
$lista_de_impresoras = array(); #Aquí pondremos las impresoras
exec(
$ruta_powershell
. $espacio
. $opciones_para_ejecutar_comando
. $espacio
. $comillas
. $comando
. $comillas,
$resultado,
$codigo_salida);

 if ($codigo_salida === 0) {
if (is_array($resultado)) {
#Omitir los primeros 3 datos del arreglo, pues son el encabezado
for($x = 3; $x < count($resultado); $x++){
$impresora = trim($resultado[$x]);
if (strlen($impresora) > 0) # Ignorar los espacios en blanco o líneas vacías
array_push($lista_de_impresoras, $impresora);
}
}
echo "<pre>";
print_r($lista_de_impresoras);
echo "</pre>";
echo "<br>";
foreach ($lista_de_impresoras as $key => $value) {
// code...
print_r($value);
echo "<br>";
}

 } else {
echo "Error al ejecutar el comando.";
}
?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>











