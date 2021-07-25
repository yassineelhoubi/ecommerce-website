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

  <div id="produit">


    <!-- produit -->
    <div class="container p-lg-5 p-4 mt-5 mb-5 secondary-border primary-raduis  " id="card-container-product">
      <div class="row m-0  col-12" id="card-container-product-column">
        <div id="div-img"
          class="col-lg-4 col-md-10 col-12 p-0 me-lg-3  secondary-border primary-raduis  d-flex justify-content-center">
          <img class=" primary-raduis" id="imgf" src="../layout/img/product/8001499044010-768x511.jpg" alt="">
        </div>
        <div class="col-lg-7 col-12 d-flex flex-column justify-content-between m-lg-3  ">
          <h4 class="mt-lg-0  mt-4 ">CARAFE AVEC COUVERCLE ORANGE 1 LITRE</h4>
          <h4 class=" mt-lg-0  mt-4">00.00 MAD</h4>
          <div class="row mt-lg-0  mt-4">
            <h4 class="col-4">Quantity</h4>
            <input class=" secondary-border secondary-raduis col-4  " type="number" min="1" value="1">
          </div>
          <button class="mybtn size-btn primary-border secondary-raduis mt-lg-0  mt-4">Ajouter au panier</button>
        </div>
      </div>
      <div class="row me-0  col-12 m-0 mt-4">
        <h4>Description</h4>
        <div  class=" primary-raduis secondary-border" id="description-aria-product">
        <p>Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ipsum, consequatur illo reiciendis beatae excepturi numquam omnis pariatur dolores magnam magni tenetur odio ad suscipit quasi voluptatem saepe cum obcaecati. sit amet consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod nulla fuga quis aut saepe nostrum recusandae porro ipsam aspernatur possimus sunt, distinctio sequi labore cum dolore reiciendis beatae animi tempore? adipisicing elit. Aliquid fugiat reprehenderit tempore odio, sint nam iure repellat fugit autem. Facilis iure magnam quibusdam recusandae dolor quis repudiandae sed vitae animi.</p>
        </div>

      </div>
    </div>

    <!-- end product -->




  </div>
  <!-- Footer -->
  <?php
  include '../includes/templates/footer.php'
  ?>
  <!-- end footer -->

  <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>