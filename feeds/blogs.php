<?
function blogResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
  $xml = simplexml_load_file('http://blogsearch.google.com/blogsearch_feeds?hl=en&oi=rss&q='.urlencode($search).'&ie=utf-8&num='.$maxresults.'&output=rss');
  foreach ($xml->channel->item as $result) {
?>
      <p>
        <a href="<? echo $result->link ?>"><? echo $result->title ?></a>
        <span class="description"><? echo $result->description ?></span>
        <span class="source">source:<a href="<? echo $result->link ?>"><? echo str_replace('www.','',parse_url($result->link,PHP_URL_HOST)) ?></a></span>
      </p>
<?
  }
}    
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) blogResults($args[0]);
?>
