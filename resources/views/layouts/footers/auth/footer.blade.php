<footer class="footer pt-3  ">
<!-- 
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Este producto será eliminado permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#7066e0",
                cancelButtonColor: "#6e7881",
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sí, eliminar',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            var imageModal = document.getElementById('imageModal');
            imageModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var imageUrl = button.getAttribute('data-img-url');
                var imageLabel = button.getAttribute('data-title-img')
                var imageModalLabel = document.getElementById('imageModalLabel')
                var modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrl;
                imageModalLabel.innerHTML = imageLabel;
            });
        });
    </script> -->
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>, Hecho por BinaryDreamers <i class="fa fa-eye-evil"></i> Derechos reservados
                    <a href="#" class="font-weight-bold" target="_blank">BiscuitSecret </a>&amp; <a style="color: #252f40;" href="#" class="font-weight-bold ml-1" target="_blank">Binary Dreamers</a>.
                </div>
            </div>
        </div>
    </div>
</footer>