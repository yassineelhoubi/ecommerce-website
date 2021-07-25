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
        <div id="listeProduits">
            <!-- header -->
            <div class="w-100 card-header mb-5">
                <h4 class="text-center">Liste des Produits</h4>
            </div>
            <!-- end header -->
            <!-- body -->
            <div class="container text-center"><button class="mybtn size-btn primary-border primary-raduis ">Ajouter
                    Produit</button>
            </div>

            <div class="container ps-4 pe-4 mt-5">
                <table class="table table-bordered secondary-border  text-center ">
                    <thead>
                        <tr>
                            <th>Produits</th>
                            <th>Images</th>
                            <th>Categories</th>
                            <th>Prix (DH)</th>
                            <th>Quantity</th>
                            <th>Modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CARAFE AVEC COUVERCLE ORANGE 1 LITRE</td>
                            <td><img class="img-fluid table-img" src="../layout/img/product/929591-768x512.jpg" alt="">
                            </td>
                            <td>Cuisine</td>
                            <td>20 </td>
                            <td>50</td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"> <img
                                        class="btn-img img-fluid " src="../layout/img/icons/modifier-le-fichier.png"
                                        alt=""></button>
                            </td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"
                                    data-bs-toggle="modal" data-bs-target="#infoModal"> <img class="btn-img img-fluid "
                                        src="../layout/img/icons/supprimer.png" alt=""></button>
                            </td>
                        </tr>
                        <tr>
                            <td>CARAFE AVEC COUVERCLE ORANGE 1 LITRE</td>
                            <td><img class="img-fluid table-img" src="../layout/img/product/8001499044010-768x511.jpg   " alt="">
                            </td>
                            <td>Cuisine</td>
                            <td>20 </td>
                            <td>50</td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"> <img
                                        class="btn-img img-fluid " src="../layout/img/icons/modifier-le-fichier.png"
                                        alt=""></button>
                            </td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"
                                    data-bs-toggle="modal" data-bs-target="#infoModal"> <img class="btn-img img-fluid "
                                        src="../layout/img/icons/supprimer.png" alt=""></button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>


            <!-- end body -->
        </div>
    </div>
    <!-- end main -->







    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>