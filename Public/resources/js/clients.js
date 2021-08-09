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
          console.log(res.data.message)
          console.log(res.data.token);
          sessionStorage.setItem("token", res.data.token)
          document.location.href = './magasin.html'
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: res.data.message
          })
          console.log(res.data.message)
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

  const seconnecter = document.getElementById('seconnecter')
  const deconnecter = document.getElementById('deconnecter')
  if (sessionStorage.getItem("token") != null) {
    seconnecter.remove();
  }else{
    deconnecter.remove();
  }
  deconnecter.addEventListener('click',()=>{sessionStorage.removeItem('token'); })
