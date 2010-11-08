<?
function newsResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://www.icerocket.com/search?tab=news&q='.urlencode($search).'&rss=1');
        foreach ($xml->channel->item as $result) {
?>
      <p>
      <a href="<? echo $result->link ?>"><? echo $result->title ?></a>
      <span><? echo $result->description ?></span>
      </p>
<?
  }
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) newsResults($args[0]);
?>
