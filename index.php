<? 
if ($_POST['search']){ 
  header('Location: /'.$_POST['search']);
} else {
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Kral engine demo v0.001</title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/kral.js"></script>
    <script type="text/javascript" src="js/jqDnR.js"></script>
    <script type="text/javascript">
      $(function() {
		<? if ($_SERVER['REDIRECT_URL']){ ?>
        kral("<? echo str_replace('/','',$_SERVER['REDIRECT_URL']) ?>"); 
		<? } ?>
      });
    </script>
  </head>
  <body id="view_grid">
<? 
  if (!$_SERVER['REDIRECT_URL']){ 
?>
    <header>
      <form method="POST" action="/" id="kralForm">
        <input name="search" id="kralIt">
        <input type="submit" value="" id="submitBtn" >
      </form>
    </header>
<?
  }
?>   
    <!-- <h1>SocialEcho Demo</h1> -->
  <script>
    CFInstall.check({
      node: "sortable",
      destination: "http://www.google.com/chromeframe/eula.html"
    });
  </script>
  </body>
</html>
<? 
}
?>
