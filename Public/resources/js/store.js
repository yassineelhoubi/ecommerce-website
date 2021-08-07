function initialize(){
    getAll_catego();
}

async function getAll_catego(){
    output ="";
    await axios.get('http://localhost/projet_fil_rouge/Category/getAll_catego')
    .then((res)=>{
        for ( i in res.data.message){
            output += '<option value="' + res.data.message[i].idCategory + '">' + res.data.message[i].category_name + '</option>'
            console.log(output)
        }
    });
    document.getElementById('select_catego').innerHTML += output
    
}
