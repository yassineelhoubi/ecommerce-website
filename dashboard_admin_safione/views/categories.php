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
    <div id="categories">
      <!-- header -->
      <div class="w-100 card-header mb-5">
        <h4 class="text-center">Liste des Categories</h4>
      </div>
      <!-- end header -->
      <!-- body -->
      <div class="container text-center"><button class="mybtn size-btn primary-border primary-raduis " data-bs-toggle="modal"
        data-bs-target="#newCategorieModal">Ajouter
          categorie</button> </div>
      <div class="container  ps-5 pe-5 mt-5">
        <div class="container  ps-5 pe-5 ">

          <table class="table table-bordered secondary-border  text-center">
            <thead>
              <tr>
                <th class="col-12 ">Nom de catégorie</th>
                <th>Modifier</th>
                <th>supprimer</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alimentaire</td>
                <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal"
                    data-bs-target="#updateModal">
                    <img class="btn-img img-fluid" src="../layout/img/icons/modifier-le-fichier.png" alt=""></button>
                </td>
                <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"><img
                      class="btn-img img-fluid" src="../layout/img/icons/supprimer.png" alt=""></button></td>
              </tr>
              <tr>
                <td>Alimentaire</td>
                <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal"
                    data-bs-target="#updateModal">
                    <img class="btn-img img-fluid" src="../layout/img/icons/modifier-le-fichier.png" alt=""></button>
                </td>
                <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"><img
                      class="btn-img img-fluid" src="../layout/img/icons/supprimer.png" alt=""></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



      <!--new categorie Modal -->
      <div class="modal fade" id="newCategorieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une Catégorie</h5>
              <button type="button" class="mybtn-icon secondary-raduis secondary-border" data-bs-dismiss="modal"
                aria-label="Close"><img src="../layout/img/icons/cancel.png" style="width: 20px;" alt=""></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <label class="mb-2" for="">
                  <h5>Nom de catégorie : </h5>
                </label>
                <input class="secondary-border secondary-raduis w-100" type="text" placeholder="Nom de catégorie...">
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" class="mybtn size-btn secondary-raduis secondary-border">Ajouter</button>
            </div>

          </div>
        </div>
      </div>
      <!-- end new categorie Modal -->


      <!--update Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier la catégorie</h5>
              <button type="button" class="mybtn-icon secondary-raduis secondary-border" data-bs-dismiss="modal"
                aria-label="Close"><img src="../layout/img/icons/cancel.png" style="width: 20px;" alt=""></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <label class="mb-2" for="">
                  <h5>Nom de catégorie : </h5>
                </label>
                <input class="secondary-border  secondary-raduis w-100" type="text" value="Alimentaire">
              </div>
            </div>
            <div class="modal-footer">

              <button type="button" class="mybtn size-btn secondary-raduis secondary-border">Modifier</button>
            </div>

          </div>
        </div>
      </div>
      <!-- end update Modal -->
      <!-- end body -->
    </div>
  </div>
  <!-- end main -->







  <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>