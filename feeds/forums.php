<?
function forumsResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://boardreader.com/rss/'.urlencode($search).'.html?p=20&format=RSS2.0'); 
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
if ($args[0]) forumsResults($args[0]);
?>
