<?
function twitterResults($search){
  $xml = simplexml_load_file('http://search.twitter.com/search.atom?q='.urlencode($search));
  if($xml->entry){
   foreach ($xml->entry as $result) {
      //var_dump($xml->entry);
?>
        <p>
          <img src="<? echo $result -> link[1]['href'] ?>">
          <span class="content"><? echo $result -> content ?></span>
          <span class="published">By <a href="">@<? echo preg_replace('/(.*)\(.*\)/','$1',$result->author->name) ?></a> at <? echo $result -> published ?></span>
        <span style="display:block;clear:both;"></div>
        </p>
<?
    }
  }
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) twitterResults($args[0]);
?>
