const modal = document.getElementById('modal');
const openModalCreate = document.getElementById('btn-create');
const closeModalCreate = document.getElementById('closeModalBtn');

openModalCreate.onclick = function() {
    modal.style.display = "block";
}
closeModalCreate.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    