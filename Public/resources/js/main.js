/* categories */



async function create_catego() {

    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    obj = {
        category_name: document.getElementById('catego_name_add').value
    }
    await axios.post('http://localhost/projet_fil_rouge/Category/create_catego', obj, {
            headers: headers
        })
        .then((res) => {
            console.log(res.data);
        });

    getAll_catego()
    $('#newCategorieModal').modal('hide');

}

function getAll_catego() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
        .then((res) => {
            for (i in res.data.message) {
                if (res.data.state == false) {
                    output = '<tr>' +
                        '<td>Aucune catégorie insérée </td>' +
                        '<td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal"data-bs-target="#updateModal">' +
                        '<img class="btn-img img-fluid" src="../../resources/img/icons/modifier-le-fichier.png"alt=""></button></td>' +

                        '<td><button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border">' +
                        '<img class="btn-img img-fluid" src="../../resources/img/icons/supprimer.png" alt=""></button></td>' +
                        '</tr>'
                } else {
                    output += '<tr>' +
                        '<td>' + res.data.message[i].category_name + '</td>' +
                        '<td>' +
                        '<button onclick="get_catego_toUpdate(' + res.data.message[i].idCategory + ')" class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal" data-bs-target="#updateModal">' +
                        '<img class="btn-img img-fluid" src="../../resources/img/icons/modifier-le-fichier.png" alt="">' +
                        '</button>' +
                        '</td>' +
                        '<td>' + '<button onclick="delete_catego(' + res.data.message[i].idCategory + ')" class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border">' +
                        '<img class="btn-img img-fluid" src="../../resources/img/icons/supprimer.png" alt="">' + '</button>' +
                        '</td>'
                    '</tr>'
                }
            }
            document.getElementById('tbody').innerHTML = output

        });
}

function get_catego_toUpdate(id) {

    axios.get('http://localhost/projet_fil_rouge/Category/get_catego/' + id)
        .then((res) => {
            document.getElementById('category_name_update').value = res.data.message.category_name
            document.getElementById('idCategory_update').value = res.data.message.idCategory
        });

}
async function update_catego() {
    obj = {
        idCategory: document.getElementById('idCategory_update').value,
        category_name: document.getElementById('category_name_update').value
    }
    await axios.put('http://localhost/projet_fil_rouge/Category/update_catego', obj)
        .then((res) => {
            console.log(res.data)
        });
    getAll_catego()
    $('#updateModal').modal('hide');
}
async function delete_catego(id) {
    if (confirm("Voulez vous vraiment supprimer cette categorie ? \n Attention Les produits de cette categorie sera supprimés aussi ! ")) {

        await axios.delete('http://localhost/projet_fil_rouge/Category/delete_catego/' + id)
            .then((res) => {
                console.log(res.data)
            });
        getAll_catego()
    } else {
        alert("La categorie n'a pas été supprimé.")
    }


}

/* -------------------------------------------------------------------------------------------------------------- */
/* new product */



        
function getAll_catego_for_select() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
        .then((res) => {
            for(i in res.data.message){
                output += '<option value="'+res.data.message[i].idCategory+'">'+res.data.message[i].category_name+'</option>'
            }
            document.getElementById('select_categories').innerHTML += output
            console.log(output);
        });
}

function uploadImg() {
    var formData = new FormData();
    var imgFile = document.getElementById('inputfile').files[0];
    /* console.log(formData) */
    if (imgFile === undefined) {
        return null;
    } else {
        var today = new Date();
        var date = today.getFullYear() + '' + (today.getMonth() + 1) + '' + today.getDate();
        var time = today.getHours() + '' + today.getMinutes() + '' + today.getSeconds()
        var nameTemp = date.toString() + time.toString();
        var ext = imgFile.name.split('.').pop();
        var imgName = nameTemp + '.' + ext;
        console.log('time : ' + imgName, 'img', imgFile);
        formData.append('imgName', imgName);
        formData.append('imgFile', imgFile);

        axios.post('http://localhost/projet_fil_rouge/product/upload_img', formData)
            .then((res) => {
                console.log(res.data);
            });
        return imgName;
    }

}

function create_product() {
    event.preventDefault();
    var imgName = uploadImg();
    obj = {

        idCategory: document.getElementById('select_categories').value,
        name: document.getElementById('name').value,
        quantity: document.getElementById('quantity').value,
        price: document.getElementById('select_price').value,
        description: document.getElementById('description').value,
        img: imgName

    }
    axios.post('http://localhost/projet_fil_rouge/product/create_product', obj)
        .then((res) => {
            console.log(res.data);
            Swal.fire(res.data.message)
            document.getElementById('form_new_product').reset();
        });
}

function getAll_product() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Product/getAll_product')
        .then((res) => {
            console.log(res.data.message[0]);
            for(i in res.data.message){
                output +=
                    '<tr>' +
                    '<td>' + res.data.message[i].name + '</td>' +
                    '<td>' + '<img class="img-fluid table-img" src="../../resources/img/product/' + res.data
                    .message[i].img + '" alt="">' + '</td>' +
                    '<td>' + res.data.message[i].category_name + '</td>' +
                    '<td>' + res.data.message[i].price + ' DH</td>' +
                    '<td>' + res.data.message[i].quantity + '</td>' +
                    '<td>' + '<a href="modifierProduit.html">' +
                    '<button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border">' +
                    '<img class="btn-img img-fluid " src="../../resources/img/icons/modifier-le-fichier.png" alt="">' +
                    '</button>' +
                    '</a>' +
                    '</td>' +
                    '<td>' +
                    '<button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal" data-bs-target="#infoModal">' +
                    '<img class="btn-img img-fluid " src="../../resources/img/icons/supprimer.png" alt="">' +
                    ' </button>' +
                    '</td>' +
                    '</tr>'
            }
            document.getElementById('tbody').innerHTML = output
        });
}