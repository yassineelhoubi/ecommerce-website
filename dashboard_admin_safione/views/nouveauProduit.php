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
        <div id="Produit">
            <!-- header -->
            <div class="w-100 card-header mb-5">
                <h4 class="text-center">Ajouter un Nouveau Produit</h4>
            </div>
            <!-- end header -->
            <!-- body -->
            <div class="container mt-5 p-5">
                <div class="row">
                    <!-- nom & prix -->
                    <div class="col-6">
                        <div class="row ps-2 mb-4">
                            <label for="nom" class="col-3 col-form-label">Nom</label>
                            <div class="col-9">
                                <input name="nom" type="text" placeholder="Nom"
                                    class="w-100 form-control secondary-raduis secondary-border">
                            </div>
                        </div>
                        <div class="row ps-2 mb-4">
                            <label for="prix" class="col-3 col-form-label">Prix</label>
                            <div class="col-9">
                                <input name="prix" placeholder="Prix" type="text"
                                    class="form-control secondary-raduis secondary-border">
                            </div>
                        </div>
                    </div>
                    <!-- categorie & qte -->
                    <div class="col-6">
                        <div class="row ps-2 mb-4">
                            <label for="Nom" class="col-3 col-form-label">categorie </label>
                            <div class="col-9">
                                <select name="categorie" id=""
                                    class="w-100 form-control secondary-raduis secondary-border">
                                    <option value="" disabled selected>Categorie</option>
                                    <option value="">yassine</option>
                                </select>
                            </div>
                        </div>
                        <div class="row ps-2 mb-4">
                            <label for="qte" class="col-3 col-form-label">Quantité</label>
                            <div class="col-9">
                                <input name="qte" placeholder="Quantité" type="number"
                                    class="form-control secondary-raduis secondary-border">
                            </div>
                        </div>
                    </div>
                    <!-- add img -->
                    <div class="col-12">
                        <div class="row ps-2 mb-4 justify-content-between">
                            <label for="" class="col-1 col-form-label ">Images</label>

                            <div class="  col-10 col-byme row-img  ">
                                <div class="secondary-border secondary-raduis d-flex justify-content-between">
                                    <span id="spanfile" class="spanfile">choisire une images</span>

                                    <label class="input-grp-img">
                                        <input id="inputfile" type="file" />
                                        <div class="mybtn-icon secondary-raduis secondary-border h-100 text-center ">
                                            <img width="30" class="img-btn-touch img-fluid "
                                                src="../layout/img/icons/touchscreen.png" alt=""></div>
                                    </label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- description -->
                    <div class="col-12">
                        <div class="row ps-2 mb-4 justify-content-between">
                            <label for="desc" class="col-1 col-form-label">Description</label>
                            <div class="col-10 col-byme">

                                <textarea name="desc" id="" placeholder="Description" cols="30" rows="10"
                                    class="form-control secondary-raduis secondary-border"></textarea>

                            </div>
                        </div>
                    </div>
                    <!-- btn ajouter -->
                    <div class="col-12 ">

                        <button
                            class="mybtn float-end size-btn secondary-border secondary-raduis col-auto ajouter-btn ">Ajouter</button>

                    </div>
                </div>
            </div>



            <!-- end body -->
        </div>
    </div>
    <!-- end main -->

    <script src="../layout/js/Produit.js"></script>






    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>