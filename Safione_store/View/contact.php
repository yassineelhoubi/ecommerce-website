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

  <div class="mt-5 mb-5 p-3" id="contact">


    <div class="container contact-form primary-border primary-raduis  ">
      <div class="contact-image">
        <img src="../layout/img/icon/041-customer service.png" alt="rocket_contact" />
      </div>
      <form method="post" class=" p-lg-5 p-md-5 pt-4">
        <div class="row">
          <h3 class="text-center mb-5">Service clientèle <span id="safione">SafiOne</span></h3>
        </div>

        <div class="row mb-3 mb-lg-0">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="txtName" class="form-control secondary-raduis secondary-border mb-3"
                placeholder="Votre Nom *" value="" />
            </div>
            <div class="form-group">
              <input type="text" name="txtEmail" class="form-control secondary-raduis secondary-border mb-3"
                placeholder="Votre Address Email *" value="" />
            </div>
            <div class="form-group">
              <input type="text" name="txtPhone" class="form-control secondary-raduis secondary-border mb-3"
                placeholder="Votre Numéro de Téléphone *" value="" />
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea name="txtMsg" class="form-control secondary-border secondary-raduis"
                placeholder="Votre Message *" style="width: 100%; height: 150px;"></textarea>
            </div>
          </div>
        </div>
        <div class="col-4 mx-auto  mt-lg-3">

          <input type="submit" name="btnSubmit" class="mybtn w-100 secondary-raduis primary-border"
            value="Envoyer le Message" />

        </div>
      </form>
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