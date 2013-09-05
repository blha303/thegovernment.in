<?php
if (isset($_GET['header'])) {
  die("<h1>".base64_decode($_GET['header'])."</h1>");
}
if (isset($_GET['pholder'])) {
  die(base64_decode($_GET['pholder']));
}
if (isset($_GET['term'])) {
  $term = $_GET['term'];
} else {
  $term = "";
}
$url = "https://news.google.com/news/feeds?hl=en&gl=us&authuser=0&q=".$term."&um=1&ie=UTF-8&output=rss";
$rss = new DOMDocument();
$rss->load($url);
$data = "";
foreach ($rss->getElementsByTagName('item') as $node) {
	$item = array (
		'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
		);
	$description = preg_replace('/(<td width[^>]*>)(.*?)(<\/td>)/i', "", $item['desc']);
	$description = preg_replace('/(<div style="padding-top:0.8em;"[^>]*>)(.*?)(<\/div>)/i', "", $description);
	$description = str_replace("<a ", "<a target=\"content\" ", $description);
	$description = str_replace("font-family:arial,sans-serif\"><br />", "font-family:arial,sans-serif\">", $description);
	$data .= '<p>'.$description.'</p>';
}
echo $data;
?>