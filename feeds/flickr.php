<?
//phpinfo();
function flikrResults($search, $maxresults=15, $offset=1, $sortby='relevance') {
    $data = unserialize(file_get_contents('http://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=a38eb2b27cef7aae56e96ac75a05802a&per_page=50&format=php_serial&text='.urlencode($search)));
    if($data){
        foreach($data['photos']['photo'] as $photo){
?>
        <img src="http://farm<? echo $photo["farm"].'.static.flickr.com/'.$photo["server"].'/'.$photo["id"].'_'.$photo["secret"] ?>.jpg">
<?
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
if ($args[0]) flikrResults($args[0]);
if ($argv[1]) flikrResults($argv[1]);
?>
