  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      @if (!auth()->user() || \Request::is('static-sign-up'))
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          © <script>
            document.write(new Date().getFullYear())
          </script>, Hecho por BinaryDreamers <i class="fa fa-eye-evil"></i> Derechos reservados
          <a href="#" class="font-weight-bold" target="_blank">BiscuitSecret </a>&amp; <a style="color: #252f40;" href="#" class="font-weight-bold ml-1" target="_blank">Binary Dreamers</a>.

        </div>
      </div>
      @endif
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->