<?php
include_once("fckeditor/fckeditor.php") ;
?>
<html>
<head>
  <title>FCKeditor - Sample</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <form action="sampleposteddata.php" method="post" target="_blank">
<?php
$oFCKeditor = new FCKeditor('Blog1') ;
$oFCKeditor->BasePath = '/fckeditor/' ;
$oFCKeditor->Value = '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>' ;
$oFCKeditor->Create() ;
?>
    <br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
