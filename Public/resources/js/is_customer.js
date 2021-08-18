
async function is_customer(){
    obj ={
        token : sessionStorage.getItem('token')
    }
     await axios.post('http://localhost/projet_fil_rouge/User/get_role_token',obj)
    .then((res)=>{
        
        if (res.data.role != "customer" ) {
            document.location.href = './login_reg.html'
          }
    })
    
}
is_customer();