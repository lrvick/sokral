<?
function wikiResults($search, $maxresults=5, $offset=1, $sortby='relevance') {
  $xml = simplexml_load_file('http://api.wikiwix.com/opensearch.php?action='.urlencode($search).'&lang=en&boolop=and&page=1&format=rss'); 
  if($xml->channel){
  foreach ($xml->channel->item as $results => $result) {
  //var_dump($result);
?>
      <p>
      <span><? echo $result->description ?></span>
      </p>
<?
    }
  }  
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) wikiResults($args[0]);
?>
