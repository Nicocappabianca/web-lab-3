var nicolas = {
    name: 'Nicolas',
    surname: 'Cappabianca', 
    birth: '12/06/1997'
}; 

var juan = {
    name: 'Juan',
    surname: 'Perez', 
    birth: '22/07/1995'
}; 

var people = [nicolas, juan]; 

var peopleList = document.getElementById('people-list');
var peopleQty = document.getElementById('people-qty'); 
refreshList(); 

document.getElementById('btn-add').onclick = function(){
    var name_input = document.getElementById('name').value;
    var surname_input = document.getElementById('surname').value;
    var birth_input = document.getElementById('birth').value; 

    if(name_input && surname_input && birth_input){
        people.push({
            name: name_input, 
            surname: surname_input, 
            birth: birth_input
        }); 

        refreshList(); 
        cleanInputs(); 

        peopleList.style.visibility = 'visible'; 

    }
}

document.getElementById('btn-show').onclick = function(){
    peopleList.style.visibility = 'visible'; 
}

document.getElementById('btn-hide').onclick = function(){
    peopleList.style.visibility = 'hidden'; 
}

function refreshList(){
    var newRow = ''; 
    people.forEach(person => {
        newRow += '<tr>'; 
        newRow += '<td>'+person.name+'</td>'; 
        newRow += '<td>'+person.surname+'</td>'; 
        newRow += '<td>'+person.birth+'</td>';
        newRow += '</tr>';          
    });

    peopleList.innerHTML = newRow;
    peopleQty.innerHTML = 'Cantidad de personas cargadas: ' +people.length; 
}

function cleanInputs(){
    document.getElementById('name').value = ''; 
    document.getElementById('surname').value = ''; 
    document.getElementById('birth').value = ''; 
}