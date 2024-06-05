<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<header class="p-10 text-7xl text-sky-950 text-center bg-gradient-to-r 
					from-green-500 from-50% via-lightgreen-500 via-90% to-white-500 to-90%">
		Quehaceres.com
	</header>

	<?php echo $this->content(); ?>
	
	<footer>
		<div class="bg-gradient-to-r from-white from-10% via-lightgreen-500 via-90% to-green-500 to-90% h-24
		flex items-center justify-center">
			<p class="text-3xl italic text-purple-600 ">
			By Gabriel & Rossana
			</p>
		</div>
	</footer>
</body>

</html>