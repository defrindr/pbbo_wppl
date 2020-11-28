<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>test</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= \Yii::$app->request->baseUrl."/css/grid.css" ?>">
	<link rel="stylesheet" type="text/css" href="<?= \Yii::$app->request->baseUrl."/css/base.css" ?>">
	<style type="text/css">
		html{
			font-family: Poppins;
		}
		body {
			height: 100vh;
			margin: 0;
			font-size: 14px;
			color: #666;
		}
		h1 {
			font-size: 24px;
			margin: 0;
			color: #fa6155;
		}
		h2 {
			font-size: 42px;
			margin: 0;
		}
		.error_page {
			height: calc(100% - 36px);
		}
		.error_page img {
			width: 100%;
			height: auto;
			margin: auto;
		}
		.error_text {
			color: #aaa;
		}
		a {
			color: #55a3d1;
			padding: 5px 0;
			text-decoration: none;
		}
		.container {
			width: 80%;
			margin: auto;
		}

		.box_error {
			margin: auto!important;
			height: 100%;
			padding: 40px;
			border-radius: 10px;
			transition: .3s;
			box-shadow: 0 0 20px #eaeaea;
			border: 1px solid transparent;
		}

		.box_error:hover {
			border: 1px solid #eaeaea;
		}

	</style>
</head>
<body>
	<div class="error_page">
		<div class="container pv-6">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<img src="<?= \Yii::$app->request->baseUrl. "/uploads/error_image.png" ?>">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 box_error">
					<h1><?= $content ?> </h1>
					<h2>Ohhh snap...</h2>
					<p class="error_text">Something went wrong, Please call Administrator.</p>
					<a href="#">Go to home page.</a>
					<div class="ball"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>