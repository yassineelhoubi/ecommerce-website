async function login() {
  var email = document.getElementById('email').value
  var password = document.getElementById('password').value
  obj = {
    email: email,
    password: password
  }

  const response = await axios.post('http://localhost/projet_fil_rouge/User/login', obj)
    .then((res) => {

      if (res.data.state == true) {
        sessionStorage.setItem("token", res.data.token)
        document.location.href = './magasin.html'
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: res.data.message
        })
      }

    });
  return response
}



function register() {
  var obj = {
    email: document.getElementById('email_reg').value,
    password: document.getElementById('password_reg').value,
    Fname: document.getElementById('Fname').value,
    Lname: document.getElementById('Lname').value,
    nbrPhone: document.getElementById('nbrPhone').value,
    gender: document.getElementById('gender').value,
    address1: document.getElementById('address1').value,
    address2: document.getElementById('address2').value
  }

  axios.post('http://localhost/projet_fil_rouge/User/sign_up', obj)
    .then((res) => {
      $('#register').modal('hide');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: res.data.message,
        showConfirmButton: false,
        timer: 1500
      })
    });
}

/* _________________________________________________ */
/* nav bar button */
const seconnecter = document.getElementById('seconnecter')
const deconnecter = document.getElementById('deconnecter')
if (sessionStorage.getItem("token") != null) {
  seconnecter.remove();
} else {
  deconnecter.remove();
}
/* logout */
deconnecter.addEventListener('click', () => {
  sessionStorage.removeItem('token');
})

/* ________________________________________ */
/* Customer account */

function Customer_info(){
  obj ={
      token : sessionStorage.getItem('token')
  }
  axios.post('http://localhost/projet_fil_rouge/User/get_info_customer',obj)
  .then((res)=>{
      document.getElementById('Fname').innerHTML = res.data.Fname;
      document.getElementById('Fname-m').value = res.data.Fname;
      document.getElementById('Lname').innerHTML = res.data.Lname;
      document.getElementById('Lname-m').value = res.data.Lname;
      document.getElementById('nbrPhone').innerHTML = res.data.nbrPhone;
      document.getElementById('nbrPhone-m').value = res.data.nbrPhone;
      document.getElementById('email').innerHTML = res.data.email;
      document.getElementById('email-m').value = res.data.email;
      document.getElementById('address1').innerHTML = res.data.address1;
      document.getElementById('address1-m').value = res.data.address1;
      document.getElementById('address2').innerHTML = res.data.address2;
      document.getElementById('address2-m').value = res.data.address2;
      if(res.data.gender == 'man'){
          document.getElementById('gender').innerHTML = "Homme";
      }else{
          document.getElementById('gender').innerHTML = "Femme";    
      }
      document.getElementById('gender-m').value = res.data.gender;
  })
}
function update_customer_info(){
  obj = {
      token : sessionStorage.getItem('token'),
      Fname : document.getElementById('Fname-m').value,
      Lname : document.getElementById('Lname-m').value,
      gender : document.getElementById('gender-m').value,
      nbrPhone : document.getElementById('nbrPhone-m').value,
      email : document.getElementById('email-m').value,
      address1 :document.getElementById('address1-m').value,
      address2 :document.getElementById('address2-m').value,
  }
}