<?
function diggResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = simplexml_load_file('http://services.digg.com/search/stories?query='.urlencode($search));
   if($xml){
        foreach ($xml as $result) {
    //var_dump($result); 
?>
      <div class="diggcount">
<? 
      echo $result->children('http://digg.com/docs/diggrss/')->diggCount; 
?>
      <span>diggs</span>
      </div>
      <p>
      <a href="<? echo $result->link ?>"><? echo $result->title ?></a>
        <span><? echo preg_replace('/('.$search.')/i','<b>$1</b>',$result->description) ?></span>
      </p>
<?
  }
  }
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) diggResults($args[0]);
?>
