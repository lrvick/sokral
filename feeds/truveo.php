<?
function truveoResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://xml.truveo.com/rss?query='.urlencode($search).''); 
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
if ($args[0]) truveoResults($args[0]);
?>
