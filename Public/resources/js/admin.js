/* login */
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
                if (res.data.role == 'admin') {
                    sessionStorage.setItem("token", res.data.token)
                    sessionStorage.setItem("role", res.data.role)
                    document.location.href = './analyse.html'
                }
                else if(res.data.role != 'admin') {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'données non valides'
                })
                }

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
/* logout */

var logout = document.getElementById('logout')
if(logout){

    logout.addEventListener('click',()=>{
        sessionStorage.removeItem('token');
        sessionStorage.removeItem('role');
        document.location.href = './login.html'
    })
}