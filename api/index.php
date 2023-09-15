

<?php

if(array_key_exists("submit",$_GET)){
  
//add points to country
$jsonString = file_get_contents('leaderboard.json');
$data = json_decode($jsonString, true);

foreach ($data as $key => $entry) {
    if ($entry['code'] == "MA") {
      if($_GET["player"]>$_GET["computer"]){
        $data[$key]['points'] +=3;
      }
      else if($_GET["player"]==$_GET["computer"]){
        $data[$key]['points'] +=1;
      }
    }
    
}

$newJsonString = json_encode($data);
file_put_contents(app_path('leaderboard.json', $newJsonString));
}

?>
