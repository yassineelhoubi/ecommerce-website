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
<div id="magasin">
    <!-- selelct and search -->
    <div class="container mt-5 ">
      <div class="row">
        <div class="col-lg-4 col-7 mt-2">
          <select class="form-select secondary-border secondary-raduis form-control">
            <option selected>Selecte catégories</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-lg-3 col-5 mt-2">
          <select class="form-select secondary-border secondary-raduis form-control">
            <option selected>Prix</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-lg-5 col-12 mt-2">
          <div
            class="
              input-search
             
              secondary-border secondary-raduis
              d-flex
              justify-content-between
            "
          >
            <input class="m-1" type="text" style="width: 100%;" placeholder="Rechercher" />
            <button class="mybtn secondary-border secondary-raduis">
              chercher
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- selelct and search -->

    <!-- products -->

    <div class="container mt-5 mb-5">
      <div
        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4  "
      >
        <!-- card -->
        <div class="col">
          <div class="card border border-dark product">
            <img
              src="../layout/img/product/8001499044010-768x511.jpg"
              class="card-img-top border border-bottom"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title fw-bold mt-2">
                BOITE DE PROVISION CARREE TRANSPARENTE
              </h5>
              <div class="d-flex justify-content-between mt-5">
                <button
                  class="mybtn size-btn-card secondary-raduis secondary-border"
                >
                  Ajouter
                </button>
                <h5 class="pt-1">10.00DH</h5>
              </div>
            </div>
          </div>
        </div>
        <!--card  -->
        <div class="col">
          <div class="card border border-dark  product">
            <img
              src="../layout/img/product/8001499044010-768x511.jpg"
              class="card-img-top border border-bottom"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title fw-bold mt-2">
                BOITE DE PROVISION CARREE TRANSPARENTE
              </h5>
              <div class="d-flex justify-content-between mt-5">
                <button
                  class="mybtn size-btn-card secondary-raduis secondary-border"
                >
                  Ajouter
                </button>
                <h5 class="pt-1">10.00DH</h5>
              </div>
            </div>
          </div>
        </div>
        <!--card  -->
        <div class="col">
          <div class="card border border-dark  product">
            <img
              src="../layout/img/product/929591-768x512.jpg"
              class="card-img-top border border-bottom"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title fw-bold mt-2">
                BOITE DE MEDICAMENTS ROUGE 20X13X7 CM
              </h5>
              <div class="d-flex justify-content-between mt-5">
                <button
                  class="mybtn size-btn-card secondary-raduis secondary-border"
                >
                  Ajouter
                </button>
                <h5 class="pt-1">10.00DH</h5>
              </div>
            </div>
          </div>
        </div>
        <!--card  -->
        <div class="col">
          <div class="card border border-dark  product">
            <img
              src="../layout/img/product/8001499044010-768x511.jpg"
              class="card-img-top border border-bottom"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title fw-bold mt-2">
                BOITE DE PROVISION CARREE TRANSPARENTE
              </h5>
              <div class="d-flex justify-content-between mt-5">
                <button
                  class="mybtn size-btn-card secondary-raduis secondary-border"
                >
                  Ajouter
                </button>
                <h5 class="pt-1">10.00DH</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- card -->
      </div>
    </div>
    <!-- end product -->
    <!-- pagination -->
    <div class="container mb-5 pagination d-flex justify-content-center">
      <div class="row d-flex ">
        <button class="mybtn secondary-border">&laquo;</button>
        <button class="mybtn secondary-border">1</button>
        <button class="mybtn secondary-border">2</button>
        <button class="mybtn secondary-border">3</button>
        <button class="mybtn secondary-border">&raquo;</button>
      </div>
    </div>

    <!--end pagination -->

    <!-- Footer -->
    <?php
  include '../includes/templates/footer.php'
  ?>
    <!-- end footer -->

    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
