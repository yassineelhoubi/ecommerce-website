/* const { default: axios } = require("axios"); */

function initialize() {
    ChangeUrl(1)
    getAll_catego();
    getAll_product(0,20)
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
/* ------------------------------- */
/* for pagination */
const ChangeUrl = (n) =>{
    window.history.pushState({},'',`?page=${n}` );
} 

var numberOfPage  ;

BackPagination = () =>{
    var item = location.search.substr(1).split('=')
    pagenumber = item[1]-1;
    if(pagenumber != 0){
        const start =pagenumber*20-20;
        const end = pagenumber*20;

        getAll_product(start,end)
        ChangeUrl(pagenumber)
    }
}
NextPagination = () =>{
    var item = location.search.substr(1).split('=')
    pagenumber = parseInt(item[1])+1;
    if(pagenumber <= numberOfPage){
        const start =pagenumber*20-20;
        const end = pagenumber*20;

        getAll_product(start,end)
        ChangeUrl(pagenumber)
    }
}
/*--------------------------------------  */


async function getAll_product(start,end) {
    output = "";
    await axios.get('http://localhost/projet_fil_rouge/Product/getAll_product_store')
        .then((res) => {
            /* -------------- */
            /* for pagination */

            let lengthProductBy20 = Math.ceil(res.data.message.length/20)
            numberOfPage = lengthProductBy20 ;
            btn = "";
            for(i=1 ; i <= lengthProductBy20 ; i++){
                btn += `<a href="#"><button class="mybtn secondary-border" onclick="getAll_product(${(i*20)-20},${i*20}),ChangeUrl(${i})">${i}</button></a>`
            }
            document.getElementById('pagination').innerHTML= '<a href="#"><button  onclick="BackPagination()"  class="mybtn secondary-border">&laquo;</button></a>'+ btn + '<a href="#"><button onclick="NextPagination()" class="mybtn secondary-border">&raquo;</button></a>'
            let the20FirstPeoduct = (res.data.message).slice(start,end)
            /*  ----------*/
            const txtvalue = document.getElementById('txt_search').value
            if(txtvalue === ''){

                for (i in the20FirstPeoduct) {

                    output +=
                    '<div name="card" class="col">' +
                    '<input name="category_name" type="hidden" value="'+the20FirstPeoduct[i].idCategory+'">'+                 
                    '<div class="card  product shadow_card">' +
                    '  <div class="border border-bottom img-card d-flex justify-content-center align-items-center card">' +
                    '<a href="produit.html?=' + the20FirstPeoduct[i].idProduct + '">' +
                    '<img src="../../resources/img/product/' + the20FirstPeoduct[i].img + '" class="img-fluid" alt="" />' +
                    '</a>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<h6 class="card-title fw-bold mt-2">' +
                    the20FirstPeoduct[i].name +
                    '</h6>' +
                    '<div class="d-flex justify-content-between mt-3">' +
                    '<button onclick="create_order(' + the20FirstPeoduct[i].idProduct + ')" class="mybtn size-btn-card secondary-raduis secondary-border">' +
                    'Ajouter' +
                    '</button>' +
                    '<h6  class="pt-1"><span name="price">' + the20FirstPeoduct[i].price + '</span> DH</h6>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div> ';
                    
                    
                }
                
                
            }else{
                document.getElementById('pagination').innerHTML= ""
                var regex  = new RegExp(txtvalue , "i");
                // console.log(res.data.message)
                for(i in res.data.message){
                    result_data = res.data.message[i].name
                   result_data.search(regex);
                   if(result_data.search(regex) != -1)
                   output +=                    
                   '<div name="card" class="col">' +
                   '<input name="category_name" type="hidden" value="'+res.data.message[i].idCategory+'">'+
                   '<div class="card  product shadow_card">' +
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
                   '<h6  class="pt-1"><span name="price">' + res.data.message[i].price + '</span> DH</h6>' +
                   '</div>' +
                   '</div>' +
                   '</div>' +
                   '</div> '
                } 
                
            }

        });

        document.getElementById('body_product').innerHTML = output
}

async function top_product(){
    output ="";
    await axios.get('http://localhost/projet_fil_rouge/Product/top_product')
    .then((res)=>{
        for (i in res.data.message) {
            output +=
                '<div class="col">' +
                '<div class="card  product shadow_card">' +
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
        
    })
    document.getElementById('top_product').innerHTML = output
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
            document.getElementById('category').innerHTML = res.data.message.category_name

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
                    '<div class="col-3 secondary-border  secondary-raduis d-flex p-0">'+
                    '<input type="number" class="col-12 border-0 text-center secondary-raduis"onchange="update_quantity('+res.data.product[i].id_line_cmd+')"  id="'+res.data.product[i].id_line_cmd+'" value="'+res.data.product[i].quantity+'" min="1">'+

                  '</div>'+
                    '</div>' +
                    '</div>' +
                    '<div class="row ms-1 justify-content-end ">' +

                    '<button onclick="drop('+res.data.product[i].id_line_cmd+')" class="mybtn-icon col-2 p-0 secondary-border secondary-raduis"><img class="btn-img img-fluid"' +
                    'src="../../resources/img/icons/supprimer.png" alt=""></button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
            }
            calcPrice   = res.data.calcPrice;
            delivery    = res.data.delivery;
            totalPrice  = res.data.totalPrice;
            idOrder     = res.data.product[0].idOrder; 

        })
        document.getElementById('cart').innerHTML = output;

        if(totalPrice != undefined ){

            document.getElementById('calcPrice').innerHTML = calcPrice + '.00 <span>MAD</span>'; 
            document.getElementById('delivery').innerHTML = delivery + '.00 <span>MAD</span>'; 
            document.getElementById('totalPrice').innerHTML = totalPrice + '.00 <span>MAD</span>'; 
            document.getElementById('btn_validate').setAttribute('onclick','validate('+idOrder+')');

        }

}
function drop(id){
        Swal.fire({
            title: 'Voulez vous vraiment supprimer ce produit? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'supprimer!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                connfirm_drop_product(id)
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Supprimé avec succès',
                    showConfirmButton: false,
                    timer: 1000
                })
            } else {
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

function connfirm_drop_product(id){
    axios.delete('http://localhost/projet_fil_rouge/Cart/drop/' + id)

    get_all_cart()
}
/* this variable for clear the timeout in the function update_quantity */
var varTime;

async function update_quantity(id){
    obj ={
        new_quantity : document.getElementById(id).value,
    }
    await axios.put('http://localhost/projet_fil_rouge/Cart/update_quantity_cart/'+id , obj)
    .then((res)=>{
        if(res.data.state == false){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: res.data.message,
                showConfirmButton: false,
                timer: 1700
            })
        }
    })
    clear_Timeout()
     varTime = setTimeout(function(){ get_all_cart() },500);
    
    // 
}
function clear_Timeout(){
clearTimeout(varTime)
}

/* order validation */
function validate(id){
    obj = {
        idOrder : id,
        token : sessionStorage.getItem('token')
    }
    axios.post('http://localhost/projet_fil_rouge/Order/validate',obj)
    .then((res)=>{
        if(res.data.state == true){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: res.data.message,
                showConfirmButton: false,
                timer: 3000
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
}
/* ____________________________________________________ */
/* filter */

function filter_price(){
    document.getElementById('select_catego').value = "";
    const select_price = document.getElementById('select_price').value
    const pricecard=document.getElementsByName("price");
    const card=document.getElementsByName("card");

    for(i=0 ; i<card.length ; i++){
      if(select_price == ""){
        card[i].style.display="block";
      }else if(select_price == pricecard[i].innerHTML){
        card[i].style.display="block";
      }else{
        card[i].style.display="none";
      }

    }
  }
  
function filter_catego(){
  document.getElementById('select_price').value = "";
  const select_catego = document.getElementById('select_catego');
  const categoCard = document.getElementsByName('category_name');
  const card=document.getElementsByName("card");
  console.log(categoCard[0].value)
  console.log(select_catego.value)

  for(i=0 ; i < card.length ; i++){
    if(select_catego.value == ""){

      card[i].style.display="block";

    }else if(select_catego.value == categoCard[i].value){

        card[i].style.display="block";

    }else{

        card[i].style.display="none";
    }
  }
}
