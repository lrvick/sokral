<?
function youtubeResults($search, $maxresults=5, $offset=1, $sortby='relevance') {
  $xml = simplexml_load_file('http://gdata.youtube.com/feeds/api/videos?vq='.urlencode($search).'&orderby='.$sortby.'&start-index='.$offset.'&max-results='.$maxresults);
  if($xml->entry){

  foreach ($xml->entry as $results => $result) {
 //var_dump($result);
?>
      <p>
      <img src="<? echo "http://i4.ytimg.com/vi/".substr($result->id, strpos($result->id,'videos/')+7, strlen($result->id))."/default.jpg" ?>">
      <a href="<? echo "http://www.youtube.com/watch?v=".substr($result->id, strpos($result->id,'videos/')+7, strlen($result->id)) ?>"><? echo preg_replace('/('.$search.')/i','<b>$1</b>',$result->title) ?></a>
      <span><? echo preg_replace('/('.$search.')/i','<b>$1</b>',$result->content[0]) ?></span>
        <span style="display:block;clear:both;"></div>
      </p>
<?
    }
  }  
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) youtubeResults($args[0]);
?>
