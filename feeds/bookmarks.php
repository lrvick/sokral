<?
function bookmarkResults($search, $maxresults=30, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://feeds.delicious.com/v2/rss/tag/'.urlencode($search).'?count='.$maxresults); 
    if($xml->channel->item){
      foreach ($xml->channel->item as $result) {
?>
      <p>
      <a href="<? echo $result->link ?>"><? echo $result->title ?></a>
      <span><? echo $result->description ?></span>
      <span class="source">Bookmarked By: <a><? echo str_replace("'s boorkmarks",'',$result->source) ?></a></span>
      </p>
<?
  }
}
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) bookmarkResults($args[0]);
?>
