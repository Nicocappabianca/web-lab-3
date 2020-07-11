var btnCreate = document.getElementById('btn-create'); 
var btnUpdate = document.getElementById('btn-update');
var btnDelete = document.getElementById('btn-delete');
var btnReset = document.getElementById('btn-reset');
var inputName = document.getElementById('name');
var inputSurname = document.getElementById('surname');
var inputBalance = document.getElementById('balance');
var formAbm = document.getElementById('form-abm');

inputName.onkeyup = function(){
    btnReset.disabled = false; 
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        enableAbmButtons();
    }
}

inputSurname.onkeyup = function(){
    btnReset.disabled = false; 
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        enableAbmButtons();
    }
}

inputBalance.onkeyup = function(){
    btnReset.disabled = false; 
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        enableAbmButtons();
    }
}

btnReset.onclick = function (){
    formAbm.reset(); 
    btnReset.disabled = true;
    disableAbmButtons();
}

btnCreate.onclick = function(){
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        formAbm.method = 'get'; 
        formAbm.action = './create-response.html';
        formAbm.submit(); 
    }
}

btnUpdate.onclick = function(){
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        formAbm.method = 'get'; 
        formAbm.action = './update-response.html';
        formAbm.submit(); 
    }
}

btnDelete.onclick = function(){
    if(inputName.checkValidity() && inputSurname.checkValidity() && inputBalance.checkValidity()){
        formAbm.method = 'get'; 
        formAbm.action = './delete-response.html';
        formAbm.submit(); 
    }
}


function enableAbmButtons(){
    btnCreate.disabled = false;
    btnUpdate.disabled = false;
    btnDelete.disabled = false; 
}

function disableAbmButtons(){
    btnCreate.disabled = true;
    btnUpdate.disabled = true;
    btnDelete.disabled = true; 
}