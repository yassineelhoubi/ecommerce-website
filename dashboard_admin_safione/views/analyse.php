<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../layout/css/style.css">

  <title>Dashboard admin</title>
</head>

<body>



  <!-- Sidebar -->
  <?php
  include '../includes/templates/sidebar.php'
  ?>
  <!-- end sidebar -->


  <!-- main -->
  <div class="main float-end">
    <div id="analyse">
      <!-- header -->
      <div class="w-100 card-header mb-3">
        <h4 class="text-center">Analyse</h4>
      </div>
      <!-- end header -->
      <!-- body -->
      <div class="container mt-5 p-4">
        <div class="row m-auto">
          <!-- card1 -->
          <div class="col-6 ">
            <div class="card p-5 ps-2 pe-2">
              <div class="card-body ">
                <h4 class="text-center">Nombre de 
                  commande effectuée</h4>
                  <h4 class="text-center">22</h4>
              </div>
            </div>
          </div>
          <!-- card 2 -->
          <div class="col-6 ">
            <div class="card p-5 ps-2 pe-2 ">
              <div class="card-body">
                <h4 class="text-center">Nombre de commandeslivrées</h4>
                <h4 class="text-center">22</h4>
              </div>
            </div>
          </div>
          <!-- card 3 -->
          <div class="col-12 mt-4">
            <div class="card p-5 ps-2 pe-2">
              <div class="card-body ">
                <h4 class="text-center">Nombre d'inscription</h4>
                <h4 class="text-center">22</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end body -->
    </div>
  </div>
  <!-- end main -->







  <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>