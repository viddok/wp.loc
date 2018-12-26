<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">
            <?php
            $copyright = __('Copyright') . '&copy; ' . bloginfo() . ' ' . date('Y');
            echo $copyright;
            ?>
        </p>
	</div>
	<!-- /.container -->
</footer>

<?php wp_footer() ?>
</body>

</html>