
async function is_admin(){
    obj ={
        token : sessionStorage.getItem('token')
    }
     await axios.post('http://localhost/projet_fil_rouge/User/get_role_token',obj)
    .then((res)=>{
        
        if (res.data.role != "admin" ) {
            document.location.href = './login.html'
          }
    })
    
}
is_admin();