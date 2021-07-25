<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../includes/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../layout/css/style.css" />
</head>

<body class="app">
  <!-- navbar -->
  <?php
include '../includes/templates/header.php'
?>
  <!-- end navbar -->
  <div id="index">

    <!-- home -->
    <div class="container mt-5">
      <div class="row justify-content-between">
        <div class="col-lg-5 col-md-11 float-start my-auto">
          <div class="line"></div>
          <h2 class="fw-bold">
            T9ada li bghiti Wa9tma bghiti m3a <span id="safione">SafiOne</span>
          </h2>
          <h5 class="mt-3 fw-bold">Produits de meilleure qualité</h5>
          <h5 class="fw-bold">LIVRAISON À DOMICILE</h5>
          <button class="mt-3 mb-3 mybtn primary-border size-btn primary-raduis">
            Achetez maintenant
          </button>
        </div>
        <div class="col-lg-6 col-md-11 float-end">
          <img class="img-fluid float-end" id="imghome" src="../layout/img/produit-alimentaire.jpg" alt="" />
        </div>
      </div>
    </div>
    <!-- end home -->

    <!-- card -->
    <div class="container mt-5">
      <h1 class="fw-bold text-center">Choisissez votre catégorie</h1>
      <div class="line mx-auto mt-3"></div>
    </div>
    <div class="container mt-5 mb-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 m-lg-5 m-md-0 m-3 ">

        <div class="col">
          <div class="card primary-raduis primary-border card-body m-lg-3">
            <div class="d-flex flex-column align-items-center mt-4">
              <h1 class="card-title fw-bold mt-1">10 MAD</h1>
              <div class="line mb-4"></div>
              <h4 class="fw-bold mb-3">les frais de livraison</h4>
              <div class="col-2 m-auto">
                <img class="img-fluid mb-2" src="../layout/img/icon/054-delivery.png" alt="" />
              </div>
              <h4 class="card-text">Jusqu'à 5 produits : 5DH</h4>
              <h4>Plus de 5 produits : 0DH</h4>
              <button class="mybtn size-btn secondary-raduis secondary-border mt-3 ">Choisir</button>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col">
          <div class="card primary-raduis primary-border card-body m-lg-3">
            <div class="d-flex flex-column align-items-center mt-4">
              <h1 class="card-title fw-bold mt-1">10 MAD</h1>
              <div class="line mb-4"></div>
              <h4 class="fw-bold mb-3">les frais de livraison</h4>
              <div class="col-2 m-auto">
                <img class="img-fluid mb-2" src="../layout/img/icon/054-delivery.png" alt="" />
              </div>
              <h4 class="card-text">Jusqu'à 5 produits : 5DH</h4>
              <h4>Plus de 5 produits : 0DH</h4>
              <button class="mybtn size-btn secondary-border secondary-raduis mt-3 ">Choisir</button>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col">
          <div class="card primary-raduis primary-border card-body m-lg-3">
            <div class="d-flex flex-column align-items-center mt-4">
              <h1 class="card-title fw-bold mt-1">10 MAD</h1>
              <div class="line mb-4"></div>
              <h4 class="fw-bold mb-3">les frais de livraison</h4>
              <div class="col-2 m-auto">
                <img class="img-fluid mb-2" src="../layout/img/icon/054-delivery.png" alt="" />
              </div>
              <h4 class="card-text">Jusqu'à 5 produits : 5DH</h4>
              <h4>Plus de 5 produits : 0DH</h4>
              <button class="mybtn size-btn secondary-raduis secondary-border mt-3 ">Choisir</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Footer -->

  <?php
  include '../includes/templates/footer.php'
  ?>
  <!-- end footer -->

  <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>