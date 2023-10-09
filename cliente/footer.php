<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<nav class="d-flex">
					<ul class="m-0 p-0">
						<li><a href="#">Home</a></li>
						<li><a href="#">APC Tecnologia</a></li>
						<li><a href="#">Sobre</a></li>
						<li><a href="#">Sociais</a></li>
						<ul>
				</nav>
			</div>

			<div class="col-md-6">
				<p class="copyright d-flex justify-content-end">
					Desenvolvedores | Valdery Silva | Gideone Berg | Thamíris Albuquerque
				</p>
			</div>
		</div>
	</div>

</footer>
</div>
</div>



<!----------html code compleate----------->









<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$("#sidebar-collapse").on('click', function() {
			$('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		});

		$(".more-button,.body-overlay").on('click', function() {
			$('#sidebar,.body-overlay').toggleClass('show-nav');
		});

	});
</script>





</body>

</html>