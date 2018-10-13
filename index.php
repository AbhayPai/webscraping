<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Index Page</title>
</head>
<body>
	<?php
		$pageone = "http://webscraping.local/tobescraped/pageone.html";
		$pagetwo = "http://webscraping.local/tobescraped/pagetwo.php";
		$external = "https://abhaypai.github.io/boilerplate-webpack-js/";

		function getBody($url) {
			$bodyData = [];
			$countBodyTag = '';
			$tag = "body";
			$errorMsg = "<p>No <strong>$tag</strong> tag found in the url or something is wrong in definingtag. $url</p>";

		    $doc = new DOMDocument;
		    $doc->preserveWhiteSpace = FALSE;

		    @$doc->loadHTMLFile($url);

		    $countBodyTag = $doc->getElementsByTagName($tag)->length;

		    if($countBodyTag >= 1) {
		    	for ($i=0; $i < $countBodyTag; $i++) {
		    		$bodyData = $doc->saveHtml($doc->getElementsByTagName($tag)->item(0));
		    	}
		    } else {
		    	$bodyData = $errorMsg;
		    }

		    return $bodyData;
		}
	?>
	<h1>This is <a href="https://github.com/AbhayPai/webscraping/blob/master/tobescraped/pageone.html" target="_blank" title="External">Internal</a> url with html page.</h1>
	<?php
		print getBody($pageone);
	?>
	<h1>This is <a href="https://github.com/AbhayPai/webscraping/blob/master/tobescraped/pagetwo.php" target="_blank" title="External">Internal</a> url with php page.</h1>
	<?php
		print getBody($pagetwo);
	?>
	<h1>This is <a href="https://abhaypai.github.io/webpack-skeleton" target="_blank" title="External">External</a> url page.</h1>
	<?php
		print getBody($external);
	?>
</body>
</html>
