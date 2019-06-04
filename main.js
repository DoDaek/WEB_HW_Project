var addModal = document.getElementById('myModal-Add');

var addModalOpenButton = document.getElementById('openAdd');
addModalOpenButton.addEventListener('click', addButtonClick);

function addButtonClick() {
    addModal.style.display = 'block';
}

window.onclick = function() {
    if (event.target == addModal) {
        addModal.style.display = 'none';
    }
}