
document.getElementById('inputfile').addEventListener('change', 
function () {
    var valuefile = document.getElementById('inputfile').value;
    var namefile = valuefile.split("\\");
    document.getElementById('spanfile').innerHTML = namefile[namefile.length - 1];
})