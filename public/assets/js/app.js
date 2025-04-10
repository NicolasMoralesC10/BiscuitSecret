function confirmDeleteUser(id, name) {
    Swal.fire({
        title: "Estás seguro de que deseas eliminar al usuario " + name + "?",
        text: "No podrás revertir esta acción!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6e7881",
        cancelButtonColor: "#7066e0",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sí, eliminar",
    }).then((result) => {
        if (result.isConfirmed) {
            jQuery("#formEliminar" + id).submit();
        }
    });
}

function confirmDelete(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Este producto será eliminado permanentemente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#7066e0",
        cancelButtonColor: "#6e7881",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sí, eliminar",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    var imageModal = document.getElementById("imageModal");
    imageModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var imageUrl = button.getAttribute("data-img-url");
        var imageLabel = button.getAttribute("data-title-img");
        var imageModalLabel = document.getElementById("imageModalLabel");
        var modalImage = document.getElementById("modalImage");
        modalImage.src = imageUrl;
        imageModalLabel.innerHTML = imageLabel;
    });
});
