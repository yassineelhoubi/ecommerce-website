function initialize() {
    getAll_catego();
    getAll_product()
}

async function getAll_catego() {
    output = "";
    await axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
        .then((res) => {
            for (i in res.data.message) {
                output += '<option value="' + res.data.message[i].idCategory + '">' + res.data.message[i].category_name + '</option>'
            }
        });
    document.getElementById('select_catego').innerHTML += output
    output = ""
}

function getAll_product() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Product/getAll_product_store')
        .then((res) => {
            for (i in res.data.message) {
                output +=
                    '<div class="col">' +
                    '<div class="card border border-dark  product shadow_card">' +
                    '  <div class="border border-bottom img-card d-flex justify-content-center align-items-center card">' +
                    '<a href="produit.html?=' + res.data.message[i].idProduct + '">' +
                    '<img src="../../resources/img/product/' + res.data.message[i].img + '" class="img-fluid" alt="" />' +
                    '</a>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<h6 class="card-title fw-bold mt-2">' +
                    res.data.message[i].name +
                    '</h6>' +
                    '<div class="d-flex justify-content-between mt-3">' +
                    '<button onclick="create_order(' + res.data.message[i].idProduct + ')" class="mybtn size-btn-card secondary-raduis secondary-border">' +
                    'Ajouter' +
                    '</button>' +
                    '<h6 class="pt-1">' + res.data.message[i].price + ' DH</h6>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div> '

            }
            document.getElementById('body_product').innerHTML = output

        });
}
/* _____________________________________________________________________________________________ */
// get idProduct from url
function get_id_product() {
    var item = location.search.substr(1).split('=')
    id = item[1];
    get_product(id)
}

function get_product(id) {
    axios.get('http://localhost/projet_fil_rouge/Product/get_product/' + id)
        .then((res) => {
            document.getElementById('name').innerHTML = res.data.message.name
            document.getElementById('price').innerHTML = res.data.message.price + '.00 MAD'
            document.getElementById('img').setAttribute('src', '../../resources/img/product/' + res.data.message.img)
            document.getElementById('description').innerHTML = res.data.message.description
            // document.getElementById('spanfile').innerHTML = res.data.message.img
            // document.getElementById('idProduct').value = res.data.message.idProduct
            // document.getElementById('quantity').value = res.data.message.quantity
        });
}
/* ___________________________________________________________________________________ */
/* Order */
/* Create an order with a known quantity */
function get_id_product_for_create_order() {
    var item = location.search.substr(1).split('=')
    id = item[1];
    create_order(id)
}
/* create order */
function create_order(id) {
    let quantity = document.getElementById('input_counter_quantity')
    if (quantity) {
        quantity = document.getElementById('input_counter_quantity').value
    }
    obj = {
        idProduct: id,
        token: sessionStorage.getItem('token'),
        quantity: quantity
    }
    axios.post('http://localhost/projet_fil_rouge/Order/create', obj)
        .then((res) => {
            if (res.data.auth == false) {
                Swal.fire({
                    title: 'veuillez d\'abord vous connecter',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Go!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = './login_reg.html'

                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: "veuillez d\'abord vous connecter",
                            text: "Puis vous pouvez commander",
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                })

            } else {
                if (res.data.state == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: res.data.message,
                        showConfirmButton: false,
                        timer: 1700
                    })
                }
            }
        })
}
/* _______________________________________________________________ */


/* cart */
function initialize_cart(){
    get_all_cart() ;
    client_auth();
}
async function client_auth(){
    obj = {
        token: sessionStorage.getItem('token'),
    }

   await axios.post('http://localhost/projet_fil_rouge/User/get_info_client_token', obj)
   .then((res)=>{
       Fname = res.data.info.Fname
       Lname = res.data.info.Lname
       Address1 = res.data.info.address1
       console.log(res.data.info)
   })
   document.getElementById('Fullname').innerHTML = Lname + ' ' + Fname;
   document.getElementById('address1').value = Address1;
}
async function get_all_cart() {
    obj = {
        token: sessionStorage.getItem('token'),
    }
    output = "";
   await axios.post('http://localhost/projet_fil_rouge/Cart/index', obj)
        .then((res) => {
            
            for (i in res.data.product) {

                 console.log(res.data.product[i].name)

                output +=
                    ' <div class="container secondary-border pt-2 pb-2 primary-raduis m-0 mb-3 shadow_card">' +
                    '<div class="row ">' +
                    '<div class="col-lg-4 col-md-4  col-12 m-auto">' +
                    '<div ' +
                    'class="container container-img-product d-flex align-items-center justify-content-center secondary-border primary-raduis p-0">' +
                    '<img class="img-product img-fluid  primary-raduis" src="../../resources/img/product/'+res.data.product[i].img+'" '+
                    'alt="">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-7 col-md-7 col-12 d-flex flex-column justify-content-between mt-lg-0 mt-2">' +
                    '<h5>'+res.data.product[i].name+'</h5 >' +
                    '<h6>prix : <span>'+res.data.product[i].price+'</span> MAD</h6>' +
                    ' <div class="container p-0">' +
                    '<div class="row justify-content-between mb-1">' +
                    '<div class="col-6">' +
                    '<h6>Quantity : </h6>' +
                    '</div>' +
                    '<div class="col-3 secondary-border  secondary-raduis  p-0">' +
                    '<input type="number" class="col-6 border-0 text-center w-100 secondary-raduis"  id="'+res.data.product[i].id_line_cmd+'" value="'+res.data.product[i].quantity+'"' +
                    ' min="1">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row ms-1 justify-content-end ">' +

                    '<button class="mybtn-icon col-2 p-0 secondary-border secondary-raduis"><img class="btn-img img-fluid"' +
                    'src="../../resources/img/icons/supprimer.png" alt=""></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
            }
            calcPrice = res.data.calcPrice;
            delivery = res.data.delivery;
            totalPrice = res.data.totalPrice;

        })
        document.getElementById('cart').innerHTML = output;
        if(totalPrice != undefined ){

            document.getElementById('calcPrice').innerHTML = calcPrice + '.00 <span>MAD</span>'; 
            document.getElementById('delivery').innerHTML = delivery + '.00 <span>MAD</span>'; 
            document.getElementById('totalPrice').innerHTML = totalPrice + '.00 <span>MAD</span>'; 
        }

}