function initialize(){
    getAll_catego();
    getAll_product()
}

async function getAll_catego(){
    output ="";
    await axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
    .then((res)=>{
        for ( i in res.data.message){
            output += '<option value="' + res.data.message[i].idCategory + '">' + res.data.message[i].category_name + '</option>'
        }
    });
    document.getElementById('select_catego').innerHTML += output
    output = ""
}

function getAll_product() {
    output = "";
    axios.get('http://localhost/projet_fil_rouge/Product/getAll_product')
        .then((res) => {
            for(i in res.data.message){
                output +=        
                        '<div class="col">'+
                            '<div class="card border border-dark  product shadow_card">'+
                            '  <div class="border border-bottom img-card d-flex justify-content-center align-items-center card">'+
                            '<a href="produit.html?='+res.data.message[i].idProduct+'">'+
                                '<img src="../../resources/img/product/'+res.data.message[i].img+'" class="img-fluid" alt="" />'+
                            '</a>'+
                              '</div>'+
                              '<div class="card-body">'+
                                '<h6 class="card-title fw-bold mt-2">'+
                                    res.data.message[i].name+
                                '</h6>'+
                                '<div class="d-flex justify-content-between mt-3">'+
                                  '<button onclick="create_order('+res.data.message[i].idProduct+')" class="mybtn size-btn-card secondary-raduis secondary-border">'+
                                    'Ajouter'+
                                  '</button>'+
                                  '<h6 class="pt-1">'+res.data.message[i].price+' DH</h6>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                        '</div> '
                
                }
                document.getElementById('body_product').innerHTML = output
              
        });
}
// get idProduct from url
function get_id_product(){
    var item = location.search.substr(1).split('=')
    id = item[1];
    get_product(id)
}
function get_product(id){
    axios.get('http://localhost/projet_fil_rouge/Product/get_product/'+id)
    .then((res) => {
        document.getElementById('name').innerHTML = res.data.message.name
        document.getElementById('price').innerHTML = res.data.message.price + '.00 MAD'
        document.getElementById('img').setAttribute('src', '../../resources/img/product/'+res.data.message.img)
        document.getElementById('description').innerHTML = res.data.message.description
        // document.getElementById('spanfile').innerHTML = res.data.message.img
        // document.getElementById('idProduct').value = res.data.message.idProduct
        // document.getElementById('quantity').value = res.data.message.quantity
    });
}

/* Order */
 function create_order(id){
     obj ={
         idProduct     : id,
         token  : sessionStorage.getItem('token'),
         quantity : document.getElementById('quantity')
     }
    axios.post('http://localhost/projet_fil_rouge/Order/create',obj)
    .then((res)=>{
        if(res.data.auth == false  ){
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

                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',    
                        title: "veuillez d\'abord vous connecter",
                        text : "Puis vous pouvez commander", 
                        showConfirmButton: false,
                        timer: 2000
                      })
                }
            })

        }else{
            if(res.data.state == true){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: res.data.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
            }else{
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
