<?
function videoResults($search, $maxresults=5, $offset=1, $sortby='relevance') {
  $xml = simplexml_load_file('http://video.google.com/videosearch?hl=en&q='.urlencode($search).'&um=1&ie=UTF-8&sa=N&tab=wv&output=rss'); 
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
if ($args[0]) videoResults($args[0]);
?>
