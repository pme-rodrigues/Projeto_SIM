
function sign(event){

var container = document.getElementById('container');   
var btn_container = document.getElementById('btn-container');

if(event == 'signUp'){
    container.classList.add('right-panel-active');
    btn_container.classList.remove('hidden');
    btn_container.classList.add('visible');
    }
    
else{
    container.classList.remove('right-panel-active');
    btn_container.classList.remove('visible');
    btn_container.classList.add('hidden');
    } 
}

function addpro(event){
    var container = document.getElementById('container');
    var sign = document.getElementById('sign-up-container');
    var sign_pro = document.getElementById('sign-up-container-pro');
    var btn_pat =document.getElementById('btn-patient');
    var btn_pro =document.getElementById('btn-pro');

    if(event == 'add'){
        container.classList.add('pro');
        sign.classList.remove('visible');
        sign.classList.add('hidden');
        sign_pro.classList.remove('hidden');
        sign_pro.classList.add('visible');
        btn_pat.classList.remove('active');
        btn_pro.classList.add('active');
        }
    else {
        container.classList.remove('pro');
        sign.classList.remove('hidden');
        sign.classList.add('visible');
        sign_pro.classList.remove('visible');
        sign_pro.classList.add('hidden');
        btn_pro.classList.remove('active');
        btn_pat.classList.add('active');
    }
}
