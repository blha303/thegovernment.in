<?php
$arr = explode("/", $_SERVER['REQUEST_URI']);
if ($arr[1] == "") {
  $ptitle = "Top Stories - Supplied by Google News";
} else {
  $ptitle = ucfirst(urldecode($arr[1]))." Articles - Supplied by Google News";
}
?><!DOCTYPE html>
<html>
<head>
<base target="content">
<style>
p {
  -webkit-margin-before: 0em !important;
  -webkit-margin-after: 0em !important;
  -webkit-margin-start: 0px !important;
  -webkit-margin-end: 0px !important;
}
</style>
<title><?php echo $ptitle; ?></title>
</head>
<?php
?>
<frameset rows="60,*">
  <frame name="title" src="/app/lookup.php?header=<?php echo base64_encode("<h1>".$ptitle."</h1>"); ?>" scrolling="no">
<frameset cols="40%,*">
  <frame name="feed" src="/app/lookup.php?term=<?php echo $arr[1]; ?>" scrolling="auto">
<frameset cols="*">
  <frame name="content" id="content" src="/app/lookup.php?pholder=<?php echo base64_encode("Click a link to display content here."); ?>" scrolling="auto">
</frameset>
</frameset>
<noframes>
<a href="/app/lookup.php?term=<?php echo $arr[1]; ?>">Non-frames version</a>
</noframes>
</frameset>
</html>
