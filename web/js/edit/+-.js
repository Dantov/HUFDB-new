"use strict";

/* Добавление строк в таблицы */
document.querySelectorAll('.add_Table_Row').forEach(domEl => {
    domEl.addEventListener("click", function(event) {
        event.preventDefault();
        addRow(this);
    }, false );
});
function addRow( self )
{
    let pE = self.parentElement.parentElement;
    let tbody = pE.querySelector(".tbody");
    let row = pE.querySelector(".protoRow").cloneNode(true);
        row.classList.remove("d-none","protoRow");
    tbody.appendChild(row);
}

function duplicateRow( self ) {
    let tr = self.parentElement.parentElement;
    let newTr = tr.cloneNode(true);
    tr.parentElement.insertBefore(newTr, tr.nextElementSibling);
}
function deleteRow( self ) {
    self.parentElement.parentElement.remove();
}
/* //Добавление строк в таблицы */

/* Добавление ремонтов */
document.querySelector('#addRepairs').addEventListener('click',function () {

    // посчитали кол-во ремонтов
    let repairButtons = document.getElementById('repairButtons');
    let repairsBody = repairButtons.parentElement;

    let repairCount = repairButtons.getElementsByTagName('button').length;

    let button = document.createElement('button');
        button.setAttribute('class','btn btn-outline-secondary');
        button.setAttribute('type','button');
        button.setAttribute('data-toggle','collapse');
        button.setAttribute('data-target','#repair' + repairCount);
        button.setAttribute('aria-expanded','false');
        button.setAttribute('aria-controls','collapseExample');
        button.innerHTML = '<i class="fas fa-wrench"></i> Ремонт № <sapn>' + repairCount + '</sapn>';

    let newReapir = repairsBody.querySelector('.protoRepair').cloneNode(true);
        newReapir.classList.remove('protoRepair','d-none');
        newReapir.setAttribute('id','repair' + repairCount);
        newReapir.querySelector('.repairNum').innerHTML = repairCount+"";

    repairButtons.insertBefore(button, this);
    repairsBody.appendChild(newReapir);
});
/* //Добавление ремонтов */


function selectChange(self)
{
    let index = self.options.selectedIndex;
    let option = self.options[index];
    let value = option.value;

    option.setAttribute('selected','');

    let table = self.getAttribute('data-table');
    let id = self.getAttribute('data-id');
    let column = self.getAttribute('data-column');

    debug('Здесь будет запрос в таблицу '+ table + 'по ID ' + id + 'в колонку' + column + "Value = "+ value);

}

document.getElementById('modelTypeSelect').addEventListener('change',function (e) {

    let index = this.options.selectedIndex;
    let value = this.options[index].value;

    if ( value == 1 )
    {
        document.querySelectorAll('.ringHide').forEach(domEl => {
            domEl.classList.add('d-none');
        });
        document.querySelectorAll('.ringShow').forEach(domEl => {
            domEl.classList.remove('d-none');
        });
        //document.querySelector('.ringEdit').classList.remove('col-lg-6','pl-lg-0');
    } else {
        document.querySelectorAll('.ringHide').forEach(domEl => {
            domEl.classList.remove('d-none');
        });
        document.querySelectorAll('.ringShow').forEach(domEl => {
            domEl.classList.add('d-none');
        });
        //document.querySelector('.ringEdit').classList.add('col-lg-6','pl-lg-0');
    }

});



/* Размерный ряд */
document.querySelector('.okButtonSR').addEventListener('click',function () {

    let modalBody = this.parentElement.previousElementSibling;
    let sizes = modalBody.querySelectorAll('input');

    sizes.forEach(input => {

        if ( input.checked )
        {
            addSizeRanges(input.getAttribute('value'));
        }

    });

});


function addSizeRanges(size)
{
    let tabsContent = document.getElementById('size-range-tabContent');
    let nav = document.getElementById('size-range-tab');
    let a = document.createElement('a');

    let sizeID = size;
    if ( !isInteger(size) )
    {
        sizeID = size+"";
        sizeID = sizeID.split('.');
        sizeID = sizeID[0] + "-" + sizeID[1];
    }
    a.setAttribute('class','nav-item nav-link pt-1 pb-1 pl-2 pr-2 mr-1 border border-secondary');
    a.setAttribute('data-toggle','tab');
    a.setAttribute('role','tab');
    a.setAttribute('aria-selected','true');
    a.setAttribute('id','nav-size-'+sizeID);
    a.setAttribute('aria-controls','nav-'+sizeID);
    a.setAttribute('href','#nav-'+sizeID);
    a.innerHTML = size;

    let newTabPanel = tabsContent.querySelector('.protoTabPanel').cloneNode(true);
    newTabPanel.classList.remove('protoTabPanel','d-none');
    newTabPanel.setAttribute('id','nav-'+sizeID);
    newTabPanel.setAttribute('aria-labelledby','nav-size-'+sizeID);
    newTabPanel.querySelector('.add_Table_Row').addEventListener("click", function() {
        addRow(this);
    }, false );

    nav.appendChild(a);
    tabsContent.appendChild(newTabPanel);
}

document.querySelector('#dellSizeRange').addEventListener('click',function () {
    let nav = this.parentElement;
    let tabsContent = nav.parentElement.nextElementSibling;

    let removeID = null;

    nav.querySelectorAll('a').forEach(elem => {
        if ( elem.classList.contains('active') )
        {
            removeID = elem.getAttribute('href');
            //debug(removeID,'removeID');
            elem.remove();
            // и еще удалить все связи из таблиц базы ;)
        }
    });

    //debug(removeID,'removeID');
    if ( removeID ) tabsContent.querySelector(removeID).remove();

});
/* // Размерный ряд */

