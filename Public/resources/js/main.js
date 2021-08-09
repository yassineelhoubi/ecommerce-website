

/* categories */

async function create_catego() {

    obj = {
        category_name: document.getElementById('catego_name_add').value,
        token : sessionStorage.getItem('token')
    }
    await axios.post('http://localhost/projet_fil_rouge/Category/create_catego', obj)
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
        category_name: document.getElementById('category_name_update').value,
        token : sessionStorage.getItem('token')
    }
    await axios.put('http://localhost/projet_fil_rouge/Category/update_catego', obj)
    getAll_catego()
    $('#updateModal').modal('hide');
}

async function delete_catego(id) {

    Swal.fire({
        title: 'Voulez vous vraiment supprimer cette categorie ? ',
        text: "Attention Les produits de cette categorie sera supprimés aussi ! ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'supprimer!',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
            Confirm_deletion_catego(id)
            Swal.fire({
                position: 'center',
                icon: 'success',    
                title: "La categorie à été supprimé.",
                showConfirmButton: false,
                timer: 1000
              })
        }else{
            Swal.fire({
                position: 'center',
                icon: 'warning',    
                title: "La categorie n'a pas été supprimé.",
                showConfirmButton: false,
                timer: 1000
              })
        }
    })
    

}
async function Confirm_deletion_catego(id){
    obj = {
        idCategory : id,
        token : sessionStorage.getItem('token')
    }
    await axios.post('http://localhost/projet_fil_rouge/Category/delete_catego/' , obj)

    getAll_catego()
}

/* -------------------------------------------------------------------------------------------------------------- */
/* new product */



function getAll_catego_for_select() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
        .then((res) => {
            for(i in res.data.message){
                if(res.data.state == false){
                    output = '<option value="0">aucune catégorie </option>'
                }else{
                    output += '<option value="'+res.data.message[i].idCategory+'">'+res.data.message[i].category_name+'</option>'
                }
            }
            document.getElementById('select_categories').innerHTML = output
        });
}

function uploadImg() {
   
    var formData = new FormData();
    var imgFile = document.getElementById('inputfile').files[0];
    if (imgFile === undefined) {
        return null;
    } else {
        var today = new Date();
        var date = today.getFullYear() + '' + (today.getMonth() + 1) + '' + today.getDate();
        var time = today.getHours() + '' + today.getMinutes() + '' + today.getSeconds()
        var nameTemp = date.toString() + time.toString();
        var ext = imgFile.name.split('.').pop();
        var imgName = nameTemp + '.' + ext;

        formData.append('imgName', imgName);
        formData.append('imgFile', imgFile);
        event.preventDefault();
        axios.post('http://localhost/projet_fil_rouge/product/upload_img', formData)

            
        return imgName;
    }

}
/* create */

function create_product() {
    event.preventDefault()

   
    var imgName = uploadImg();
    
    obj = {
        idCategory: document.getElementById('select_categories').value,
        name: document.getElementById('name').value,
        quantity: document.getElementById('quantity').value,
        price: document.getElementById('select_price').value,
        description: document.getElementById('description').value,
        img: imgName,
        token : sessionStorage.getItem('token')

    }
    axios.post('http://localhost/projet_fil_rouge/product/create_product', obj)
        .then((res) => {
            if(res.data.state == true){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: res.data.message,
                    showConfirmButton: false,
                    timer: 1000
                  })
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: res.data.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
            document.getElementById('form_new_product').reset();
        });
}
/* list Product */

function getAll_product() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Product/getAll_product')
        .then((res) => {

            for(i in res.data.message){
                if (res.data.state == false) {
                    output = 
                    '<tr>' +
                    '<td>xx</td>' +
                    '<td>xx</td>' +
                    '<td>xx</td>' +
                    '<td>xx DH</td>' +
                    '<td>xx</td>' +
                    '<td>' + '<a href="#">' +
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
                } else {
                    output +=
                    '<tr>' +
                    '<td>' + res.data.message[i].name + '</td>' +
                    '<td>' + '<img class="img-fluid table-img" src="../../resources/img/product/' + res.data
                    .message[i].img + '" alt="">' + '</td>' +
                    '<td>' + res.data.message[i].category_name + '</td>' +
                    '<td>' + res.data.message[i].price + ' DH</td>' +
                    '<td>' + res.data.message[i].quantity + '</td>' +
                    '<td>' + '<a  href="modifierProduit.html?id='+ res.data.message[i].idProduct +'">' +
                    '<button class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border">' +
                    '<img class="btn-img img-fluid " src="../../resources/img/icons/modifier-le-fichier.png" alt="">' +
                    '</button>' +
                    '</a>' +
                    '</td>' +
                    '<td>' +
                    '<button onclick="delete_product('+ res.data.message[i].idProduct +')" class="mybtn-icon ps-2 pe-2 secondary-raduis secondary-border" data-bs-toggle="modal" data-bs-target="#infoModal">' +
                    '<img class="btn-img img-fluid " src="../../resources/img/icons/supprimer.png" alt="">' +
                    ' </button>' +
                    '</td>' +
                    '</tr>'
                }
                }
                document.getElementById('tbody').innerHTML = output
        });
    
}
function get_id_product(){

var item = location.search.substr(1).split('=')
id = item[1];
get_product_toUpdate(id)
  
}
/* update */
function get_product_toUpdate(id){
    event.preventDefault()
    getAll_catego_for_select()
    axios.get('http://localhost/projet_fil_rouge/Product/get_product/'+id)
    .then((res) => {

        document.getElementById('name').value = res.data.message.name
        document.getElementById('quantity').value = res.data.message.quantity
        document.getElementById('select_categories').value = res.data.message.idCategory
        document.getElementById('price').value = res.data.message.price
        document.getElementById('img').setAttribute('src', '../../resources/img/product/'+res.data.message.img)
        document.getElementById('spanfile').innerHTML = res.data.message.img
        document.getElementById('description').value = res.data.message.description
        document.getElementById('idProduct').value = res.data.message.idProduct
    });
    
}


async function update_product() {
    event.preventDefault();
    var imgName = document.getElementById('inputfile').files[0]

    if(imgName == undefined){
        
        imgName = document.getElementById('spanfile').innerHTML
    }else{
        var imgName = uploadImg()
    }

    obj = {
        idProduct: document.getElementById('idProduct').value,
        idCategory: document.getElementById('select_categories').value,
        name: document.getElementById('name').value,
        quantity: document.getElementById('quantity').value,
        price: document.getElementById('price').value,
        description: document.getElementById('description').value,
        img: imgName,
        token : sessionStorage.getItem('token') 
    }
    await axios.put('http://localhost/projet_fil_rouge/Product/update_product', obj)
        .then((res) => {
        if(res.data.state == true){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: res.data.message,
                showConfirmButton: false,
                timer: 1000
              })
        }else{
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: res.data.message,
                showConfirmButton: false,
                timer: 1500
              })
        }
        })
        get_id_product()
}
/* delete */
 function delete_product(id){
     Swal.fire({
        title: 'Voulez vous vraiment supprimer ce Produit ? ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'supprimer!',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {

            Confirm_deletion_product(id)
            Swal.fire({
                position: 'center',
                icon: 'success',    
                title: "Le Produit à été supprimé.",
                showConfirmButton: false,
                timer: 1000
              })
        }else{
            Swal.fire({
                position: 'center',
                icon: 'warning',    
                title: "Le Produit n'a pas été supprimé.",
                showConfirmButton: false,
                timer: 1000
              })
        }
    })
}
async function Confirm_deletion_product(id){
    obj = {
        idProduct : id,
        token : sessionStorage.getItem('token')
    }
    await axios.post('http://localhost/projet_fil_rouge/Product/delete_product/' , obj)

    getAll_product()
        
}