"use strict";
Node.prototype.remove = function() {  // - полифил для elem.remove(); document.getElementById('elem').remove();
    this.parentElement.removeChild(this);
};

const _URL_ = document.location.origin;
const _DIR_ = document.location.href.split('/')[3];
const _ROOT_ = _URL_ + '/'; //http://localhost/HUF_DB_Dev/

/*
debug(_URL_, "_URL_");
debug(_DIR_, "_DIR_");
debug(_ROOT_, "_ROOT_");
*/

function debug(variable, str="")
{
    if ( str ) {
        console.log(str + " = " + variable);
    } else {
        console.log(variable);
    }
}

function isInteger(num) {
    return (num ^ 0) === num;
}

function formatDate(date,format) {
    let dd = date.getDate();
    if (dd < 10) dd = '0' + dd;

    let mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;

    let yy = date.getFullYear();

    if ( format === 'Y-m-d' ) return yy + '-' + mm + '-' + dd;
    return dd + '.' + mm + '.' + yy;
}