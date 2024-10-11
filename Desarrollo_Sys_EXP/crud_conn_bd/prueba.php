<?php
include './conexion.php';
$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (isset($_POST['id_sintoma'])) //busqueda por id
  {
    $sql = $pdo->prepare("SELECT * FROM solucion_falla Where id_solucion in (1)");
    //$sql->bindValue(':id', 1);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    //header('Content-Type: application/json');
    $datos = $sql->fetchAll();
    foreach ($datos as $value) {
      echo '
    <div class="row justify-content-center p-3 enfermedad mt-3 mb-3">

      <div class="col-10">
        <h2 class="text-center text-indigo mt-4">
          ' . $value['nombre'] . '
        </h2>
      </div>
      <div class="w-100"></div>
      <div class="col-10">
        <p>
          ' . $value['descripccion'] . '
        </p>
      </div>

      <div class="w-100"></div> 

      <div class="col-10">
        <h2 class="text-center text-indigo mt-4">
          Causas
        </h2>
      </div>  
      <div class="w-100"></div>
      <div class="col-10">         
        <p>
          ' . $value['causas'] . '
        </p>
      </div>

      <div class="w-100"></div>

      <div class="col-10">   
        <h2 class="text-center text-indigo mt-4">
          Recomendaciones
        </h2>
      </div>
      <div class="w-100"></div>
      <div class="col-10">            
        <p>
          ' . $value['recomendaciones'] . '
        </p>
      </div>

    </div>
    ';
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


  $sql = $pdo->prepare("SELECT * FROM solucion_falla Where id_solucion in (1)");
  //$sql->bindValue(':id', 1);
  $sql->execute();
  $sql->setFetchMode(PDO::FETCH_ASSOC);
  header("HTTP/1.1 200 OK");
  //header('Content-Type: application/json');
  $datos = $sql->fetchAll();
  foreach ($datos as $value) {
    echo '
    <div class="row justify-content-center p-3 enfermedad mt-3 mb-3">

      <div class="col-10">
        <h2 class="text-center text-indigo mt-4">
          ' . $value['nombre'] . '
        </h2>
      </div>
      <div class="w-100"></div>
      <div class="col-10">
        <p>
          ' . $value['descripccion'] . '
        </p>
      </div>

      <div class="w-100"></div> 

      <div class="col-10">
        <h2 class="text-center text-indigo mt-4">
          Causas
        </h2>
      </div>  
      <div class="w-100"></div>
      <div class="col-10">         
        <p>
          ' . $value['causas'] . '
        </p>
      </div>

      <div class="w-100"></div>

      <div class="col-10">   
        <h2 class="text-center text-indigo mt-4">
          Recomendaciones
        </h2>
      </div>
      <div class="w-100"></div>
      <div class="col-10">            
        <p>
          ' . $value['recomendaciones'] . '
        </p>
      </div>

    </div>
    ';
  }
}
