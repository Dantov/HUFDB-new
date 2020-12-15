let dropArea = document.getElementById('drop-area');
let dropAreaSTL = document.getElementById('drop-areaSTL');
let dropAreaAI = document.getElementById('drop-areaAI');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    dropAreaSTL.addEventListener(eventName, preventDefaults, false);
    dropAreaAI.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults (e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, function () {
        highlight(this);
    }, false);
    dropAreaSTL.addEventListener(eventName, function () {
        highlight(this);
    }, false);
    dropAreaAI.addEventListener(eventName, function () {
        highlight(this);
    }, false);
});
['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, function () {
        unhighlight(this);
    }, false);
    dropAreaSTL.addEventListener(eventName, function () {
        unhighlight(this);
    }, false);
    dropAreaAI.addEventListener(eventName, function () {
        unhighlight(this);
    }, false);
});

function highlight(self) {
    let id = self.id;

    switch (id)
    {
        case "drop-area":
            self.classList.add('highlight');
            break;
        case "drop-areaSTL":
            self.classList.add('highlightSTL');
            break;
        case "drop-areaAI":
            self.classList.add('highlightAI');
            break;
    }
}
function unhighlight(self) {
    let id = self.id;

    switch (id)
    {
        case "drop-area":
            self.classList.remove('highlight');
            break;
        case "drop-areaSTL":
            self.classList.remove('highlightSTL');
            break;
        case "drop-areaAI":
            self.classList.remove('highlightAI');
            break;
    }
}

dropArea.addEventListener('drop', handleDrop, false);
function handleDrop(e) {
    let dt = e.dataTransfer;
    let files = dt.files;

    //console.log(files);
    handleFiles(files);
}
function handleFiles(files) {
    files = [...files];
    files.forEach(uploadFile);
    files.forEach(previewFile);
}
function uploadFile(file) {
    let url = 'ВАШ URL ДЛЯ ЗАГРУЗКИ ФАЙЛОВ';
    let formData = new FormData();
    formData.append('file', file);
    console.log(formData);
    // fetch(url, {
    //     method: 'POST',
    //     body: formData
    // })
    // .then(() => { /* Готово. Информируем пользователя */ })
    // .catch(() => { /* Ошибка. Информируем пользователя */ })
}

dropAreaSTL.addEventListener('drop', handleDropSTL, false);
function handleDropSTL(e) {
    let dt = e.dataTransfer;
    let files = dt.files;

    console.log(files);
    handleStlFiles(files);
}
function handleStlFiles(files) {
    files = [...files];
    files.forEach(uploadStlFile);
}
function uploadStlFile(file) {
    let formData = new FormData();
    formData.append('file', file);

    //debug(formData.get('file'));
}


function previewFile(file) {
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function() {
        //img.src = reader.result;

        let imgRow = document.getElementById('proto_image_row').cloneNode(true);
            imgRow.removeAttribute('id');
            imgRow.classList.remove('d-none');
        let img = imgRow.getElementsByTagName('img');
            img[0].src = reader.result;

        document.getElementById('picts').insertBefore(imgRow,document.getElementById('drop-area').parentElement);
    }
}

function removeImg(self)
{
    self.parentElement.remove();
}


/* метки */
document.querySelector('.btnLabels').querySelectorAll('button').forEach(button => {});

/*// метки */