<?
//phpinfo();
function facebookResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $xml = json_decode(file_get_contents('http://graph.facebook.com/search?q='.urlencode($search)),true);
    if($xml){
      foreach($xml as $xml => $results){
        foreach($results as $results => $result){
?>
      <p>
        <img src="http://graph.facebook.com/<? echo $result['from']['id'] ?>/picture" />
        <a href="<? echo $result['link'] ?>"><? echo $result['from']['name'] ?></a>
        <span><? echo preg_replace('/('.$search.')/i','<b>$1</b>',$result['message']) ?></span>
        <span style="display:block;clear:both;"></div>
      </p>
<?
      }
    }
    // for($i=0; $i<=5; $i=$i+1){ 
    //   var_dump($result[0]->message);
    // } 
     // foreach ($xml as $results => $result) {
//    }
  }
}
$args = explode('/',stripslashes($_SERVER['PATH_INFO']));
array_shift($args);
if ($args[0]) facebookResults($args[0]);
if ($argv[1]) facebookResults($argv[1]);
?>
