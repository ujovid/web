let rows = 0;
const tbl = document.createElement('table');

function allow_buttons(){
    var addbutton = document.getElementById('addRow');
    var delbutton = document.getElementById('deleteRow');
    var inputfield = document.getElementById('number');
    addbutton.disabled = !addbutton.disabled;
    delbutton.disabled = !delbutton.disabled;
    inputfield.disabled = !inputfield.disabled;
}

function addRow(){
    let row = tbl.insertRow();
    row.insertCell().append(rows);
    row.insertCell().append("строка "+rows);
    row.insertCell().append("строка "+rows);
    rows += 1;
}

function createTable(){
    if (document.getElementById('table')){
        alert("Таблица уже создана");

    }
    else{
        allow_buttons();
        tbl.innerHTML = "<table>";
        tbl.setAttribute('id', 'table');
        document.body.append(tbl);
        rows += 1;
        addRow();

    }
}

function deleteRow(){
    if (document.getElementById('number').value === "") {
        alert("Напишите номер строки для удаления")
    }
    row_number = document.getElementById('number').value;
    try {
        tbl.deleteRow(row_number - 1);
    }
    catch (e) {
        alert("Номер строки введен неверно");
    }
}

