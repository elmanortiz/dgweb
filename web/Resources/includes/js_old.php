	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="recursos/js/bootstrap.min.js"></script>
	<!-- Javascript Archivos -->
	<script src='recursos/js/scrollReveal.js'></script>
    <script>

      window.sr = new scrollReveal();

    </script>
	<!-- Find Javascript Archivos -->
	<script type="text/javascript">
      $(document).scroll(function () {
          var y = $(this).scrollTop();
          if (y > 200) {
              $('.bottomMenu').fadeIn();
          } else {
              $('.bottomMenu').fadeOut();
          }
      });
    </script>