<?
function jobResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://rss.indeed.com/rss?q='.urlencode($search)); 
    if($xml->channel->item){
       foreach ($xml->channel->item as $result) {
?>
      <p>
      <a href="<? echo $result->link ?>"><? echo $result->title ?></a>
      <span><? echo $result->description ?></span>
      </p>
<?
  }
}
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) jobResults($args[0]);
?>
