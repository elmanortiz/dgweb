	<nav>
		<!-- Navigation Bar Desktop -->
		<div class="hidden-xs hidden-sm">
			<div class="container-fluid" id="mainnav" style="background-color: #FFF; height: 100px; border-bottom: 1px solid #ddd;">
				<div class="pull-left" style="color: #FFF;">
					<a href="index.php"><img src="recursos/img/logo2.png" style="width: 160px; margin-top: 20px; margin-left: 50px;"></a>
				</div>
				<div class="pull-right" style="margin-top: 40px;">
					<ul class="mainlinks" style="display: inline;">
						<a href="index.php" class="links"><li <?php if ($activePage =="index") {?>style="color: #262626; background-color: #ddd;" <?php } ?> >
							Home
						</li></a>
						<a href="about.php" class="links"><li <?php if ($activePage =="about") {?>style="color: #262626; background-color: #ddd;" <?php } ?> >
							About Us
						</li></a>
						<a href="services.php" class="links"><li <?php if ($activePage =="services") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Services
						</li></a>
						<a href="portfolio.php" class="links"><li <?php if ($activePage =="portfolio") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Portfolio
						</li></a>
						<a href="blog.php" class="links"><li <?php if ($activePage =="blog") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Blog
						</li></a>
						<a href="team.php" class="links"><li <?php if ($activePage =="team") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Team
						</li></a>
						<a href="contact.php" class="links"><li <?php if ($activePage =="contact") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Contact
						</li></a>
						<a href="careers.php" class="links"><li <?php if ($activePage =="careers") {?>style="color: #262626; background-color: #ddd;" <?php } ?>>
							Careers
						</li></a>
					</ul>
				</div>
			</div>
		</div>
	</nav>

    <script>
    $(document).ready(function(){
       $(window).bind('scroll', function() {
       var navHeight = $( window ).height() - 100;
         if ($(window).scrollTop() > navHeight) {
           $('nav').addClass('navbar-fixed-top');
         }
         else {
           $('nav').removeClass('navbar-fixed-top');
         }
      });
    });
    </script>

	<!-- Navigation Bar Mobile -->
	<nav class="navbar navbar-default hidden-md hidden-lg">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img src="recursos/img/logo2.png" style="height: 25px;"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- End Navigation Bar Mobile -->