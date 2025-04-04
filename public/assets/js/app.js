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
