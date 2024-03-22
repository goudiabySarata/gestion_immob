$(document).ready(function() {
    $('#loginModalLink').click(function () {
        $('#loginModal').modal('show');
    });
});
function confirmDelete(bienId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce bien?")) {
        document.getElementById('deleteForm' + bienId).submit();
    } else {
        event.preventDefault();
    }
}
