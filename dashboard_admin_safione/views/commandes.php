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
        <div id="commandes">
            <!-- header -->
            <div class="w-100 card-header mb-5">
                <h4 class="text-center">Liste des Commandes</h4>
            </div>
            <!-- end header -->
            <!-- body -->
            <div class="container ps-4 pe-4">
                <table class="table table-bordered secondary-border  text-center">
                    <thead>
                        <tr>
                            <th>N° CMD</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Prix (DH)</th>
                            <th>Status</th>
                            <th>livré</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>987</td>
                            <td>yassine elhoubi</td>
                            <td>7/23/2021</td>
                            <td>50 </td>
                            <td>non-livré</td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"> <img
                                        class="btn-img img-fluid " src="../layout/img/icons/send.png" alt=""></button>
                            </td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"
                                data-bs-toggle="modal" data-bs-target="#infoModal"> <img
                                        class="btn-img img-fluid " src="../layout/img/icons/eye.png" alt=""></button>
                            </td>
                        </tr>
                        <tr>
                            <td>987</td>
                            <td>yassine elhoubi</td>
                            <td>7/23/2021</td>
                            <td>50 </td>
                            <td>non-livré</td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border">
                                    <img class="btn-img img-fluid " src="../layout/img/icons/send.png" alt="">
                                </button>
                            </td>
                            <td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border"
                                    data-bs-toggle="modal" data-bs-target="#infoModal">
                                    <img class="btn-img img-fluid " src="../layout/img/icons/eye.png" alt="">
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <!--indo Modal -->
            <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informations sur la commande</h5>
                            <button type="button" class="mybtn-icon secondary-raduis secondary-border"
                            data-bs-dismiss="modal" aria-label="Close"><img src="../layout/img/icons/cancel.png"
                                style="width: 20px;" alt=""></button>
                        </div>
                        <div class="modal-body">
                            <!-- 1 -->
                            <div class="container secondary-raduis secondary-border d-flex justify-content-between mb-2 ">
                                <div class="col-3 " >
                                    <img  src="../layout/img/product/929591-768x512.jpg" alt="" width="100px" >
                                </div>
                                <div class="col-8 p-1 ">
                                    <h6>title title title zeop,</h6>
                                    <h6><span>quantity : </span> 2</h6>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="container secondary-raduis secondary-border d-flex justify-content-between mb-2 ">
                                <div class="col-3 " >
                                    <img  src="../layout/img/product/929591-768x512.jpg" alt="" width="100px" >
                                </div>
                                <div class="col-8 p-1 ">
                                    <h6>title title title zeop,</h6>
                                    <h6><span>quantity : </span> 2</h6>
                                </div>
                            </div>
                            <!--  -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- end info Modal -->
            <!-- end body -->
        </div>
    </div>
    <!-- end main -->







    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>