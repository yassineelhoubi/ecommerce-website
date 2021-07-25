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

    <div id="mon_compte" class="mt-5 mb-5 p-3">


        <div class="container contact-form primary-border primary-raduis  ">
            <div class="user-image">
                <img src="../layout/img/icon/user1.png" alt="rocket_contact" />
            </div>
            <div class="p-5 row information">
                <div class="col-12 d-flex flex-column align-items-center">
                    <h3 class="">INFORMATIONS PERSONELLES</h3>
                    <div class="line  mt-3"></div>
                </div>
                <div class="col-lg-6 col-12 ps-lg-5">

                    <h5>Nom : <span> elhoubi</span></h5>
                    <h5>Prenom : <span> yassine</span></h5>
                    <h5>Telephone : <span>0621409091</span></h5>
                    <h5>CINE : <span>HH02022</span></h5>

                </div>
                <div class="col-lg-6 col-12 ps-lg-5 ">

                    <h5>Email : <span>elhoubiyassine@gmail.com</span></h5>
                    <h5>Address 1 : <span>87 RUE ZEPIFZ QU ZFNUOZE OIRJ</span></h5>
                    <h5>Address 2 : <span>87 RUE ZEPIFZ QU ZFNUOZE OIRJ</span></h5>
                </div>
                <div class="col-lg-3 col-6 m-auto mt-2">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="mybtn-icon w-100  secondary-border secondary-raduis"><img class="btn-img img-fluid"
                            src="../layout/img/icon/modifier-le-fichier.png" alt=""></button>
                </div>
            </div>


        </div>




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content primary-border">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informations personelles</h5>
                        <button type="button" class="mybtn-icon secondary-raduis secondary-border"
                            data-bs-dismiss="modal" aria-label="Close"><img src="../layout/img/icon/cancel.png"
                                style="width: 20px;" alt=""></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nom" class="mt-1"> Nom : </label>
                                    <input name="nom" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="yassine">
                                    <label for="genre" class="mt-1"> Genre : </label>
                                    <select  name="genre" class="w-100 secondary-border secondary-raduis form-control ">
                                        <option value="" disabled selected>Genre</option>
                                        <option value="" >Homme</option>
                                        <option value="" >Femme</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="prenom" class="mt-1"> Prenom : </label>
                                    <input name="prenom" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="elhoubi">
                                    <label for="telephone" class="mt-1"> Telephone : </label>
                                    <input name="telephone" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="097654876">
                                </div>

                                <div class="col-12">
                                    <label for="email" class="mt-1"> Email : </label>
                                    <input name="email" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="elhoubiyassine@gmail.com">
                                    <label for="address 1" class="mt-1"> Address 1 : </label>
                                    <input name="address 1" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="87 RUE ZEPIFZ QU ZFNUOZE OIRJ">
                                    <label for="address 2" class="mt-1"> Address 2 : </label>
                                    <input name="address 2" class="w-100 secondary-border secondary-raduis form-control" type="text"
                                        value="87 RUE ZEPIFZ QU ZFNUOZE OIRJ">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="mybtn secondary-raduis secondary-border">Enregistrez</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    </div>
    <!-- Footer -->

    <?php
  include '../includes/templates/footer.php'
  ?>
    <!-- end footer -->

    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>