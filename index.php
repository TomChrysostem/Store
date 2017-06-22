<?php
	require_once("header.php");
?>
<script type="text/javascript">
jQuery(document).ready(function()
{
    $('.slider').glide({
        autoplay: 3500,
        hoverpause: false,	//set to false for nonstop rotate
        arrowRightText: '&rarr;',
        arrowLeftText: '&larr;'
    });
});
</script>
<div id="w">
	<div class="slider">
		<ul class="slides">
			<li class="slide">
				<figure>
					<img src="img/img2.jpg" alt=""/>
				</figure>
			</li>
			<li class="slide">
				<figure>
					<img src="img/img3.jpg" alt=""/>
				</figure>
			</li>
			<li class="slide">
				<figure>
					<img src="img/img4.jpg" alt=""/>
				</figure>
			</li>
			<li class="slide">
				<figure>
					<img src="img/img5.jpg" alt="">
				</figure>
			</li>
			<li class="slide">
				<figure>
					<img src="img/photo1.jpg" alt="">
				</figure>
			</li>
		</ul>
	</div>
</div>
<?php
	require_once("footer.php");
?>