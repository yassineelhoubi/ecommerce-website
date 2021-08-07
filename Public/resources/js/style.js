
/* input for img */
document.getElementById('inputfile').addEventListener('change', 
function () {
    var valuefile = document.getElementById('inputfile').value;
    var namefile = valuefile.split("\\");
    document.getElementById('spanfile').innerHTML = namefile[namefile.length - 1];
})


/* counter */
let btnadd = document.querySelector('#add');
let btnsubtract = document.querySelector('#subtract');
let input = document.querySelector('#input-counter');


btnadd.addEventListener('click',()=>{
input.value = parseInt(input.value) + 1 ;
});

btnsubtract.addEventListener('click',()=>{
    if(input.value <= 1)
    {
        input.value = 1
    }
    else
    {
    input.value = parseInt(input.value) - 1 ;
    }
});
