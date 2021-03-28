<?php 
session_start();
include("db.php");

ini_set('serialize_precision', 10);

$getIcones = $bdd->query("SELECT * from icones");
$icones = $getIcones->fetchAll(PDO::FETCH_ASSOC);

$spins = [];
$result = [];

for ($i=0; $i <= 8; $i++) { 
    $randomNum = rand(0,99);
    array_push($spins,$randomNum);
}



foreach ($spins as $spin) {

    foreach($icones as $icone) {
        $intervalle = $icone['ratio'];
        $intervalle = explode(",", $intervalle);
        //print_r($intervalle) . '<br>';

        if ( (  $spin >= intval($intervalle[0])   ) && ( $spin <= intval($intervalle[1])   ) ) {
            
            $icone['prock'] = 0;
            array_push($result,$icone);

        }

        }


}



if (isset($_POST['mise'])) {

   
    $mise = $_POST['mise'];
    $gain = 0;
    $multiplicateur = 0;
    $bigwin = 0;
    if($result[0]['name'] == $result[1]['name'] && $result[0]['name'] == $result[2]['name']){
        $gain += $result[0]['gain'] * $mise;

        if ($result[0]['name'] == 'BONUS MARS') {
            $bigwin = 2;
        }

        $result[0]['prock'] = 1;
        $result[1]['prock'] = 1;
        $result[2]['prock'] = 1;
        
        }
         if($result[3]['name'] == $result[4]['name'] && $result[3]['name'] == $result[5]['name']){
        $gain += $result[3]['gain'] * $mise;

        if ($result[3]['name'] == 'BONUS MARS') {
            $bigwin = 2;
        }

        $result[3]['prock'] = 1;
        $result[4]['prock'] = 1;
        $result[5]['prock'] = 1;
        }
         if($result[6]['name'] == $result[7]['name'] && $result[6]['name'] == $result[8]['name']){
        $gain += $result[6]['gain'] * $mise;

        if ($result[6]['name'] == 'BONUS MARS') {
            $bigwin = 2;
        }
        $result[6]['prock'] = 1;
        $result[7]['prock'] = 1;
        $result[8]['prock'] = 1;
        }
         if($result[0]['name'] == $result[4]['name'] && $result[0]['name'] == $result[8]['name']){
        $gain += $result[0]['gain'] * $mise;

        if ($result[0]['name'] == 'BONUS MARS') {
            $bigwin = 2;
        }
        $result[0]['prock'] = 1;
        $result[4]['prock'] = 1;
        $result[8]['prock'] = 1;
        }
         if($result[6]['name'] == $result[4]['name'] && $result[6]['name'] == $result[2]['name']){
        $gain += $result[6]['gain'] * $mise;
        if ($result[6]['name'] == 'BONUS MARS') {
            $bigwin = 2;
        }

        $result[6]['prock'] = 1;
        $result[4]['prock'] = 1;
        $result[2]['prock'] = 1;
        }
    

        $_SESSION['solde'] = $_SESSION['solde'] - $mise + $gain;
        
        $multiplicateur = $gain / $mise;

        if ($multiplicateur >= 40 && $bigwin == 0) {
            $bigwin = 1;
        }
      



    $resultSpin = [];
    foreach($result as $icone) {
        array_push($resultSpin,$icone['px']);
    }
    foreach($result as $icone) {
        array_push($resultSpin,$icone['prock']);
    }
    array_push($resultSpin,$gain,$_SESSION['solde'],$bigwin);

    print_r(json_encode($resultSpin));


}

?>



