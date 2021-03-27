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

            array_push($result,$icone);

        }

        }


}





if (isset($_POST['mise'])) {

   
    $mise = $_POST['mise'];
    $gain = 0;

    if($result[0]['name'] == $result[1]['name'] && $result[0]['name'] == $result[2]['name']){
        $gain += $result[0]['gain'] * $mise;
        
        }
         if($result[3]['name'] == $result[4]['name'] && $result[3]['name'] == $result[5]['name']){
        $gain += $result[3]['gain'] * $mise;
        }
         if($result[6]['name'] == $result[7]['name'] && $result[6]['name'] == $result[8]['name']){
        $gain += $result[6]['gain'] * $mise;
        }
         if($result[0]['name'] == $result[4]['name'] && $result[0]['name'] == $result[8]['name']){
        $gain += $result[0]['gain'] * $mise;
        }
         if($result[6]['name'] == $result[4]['name'] && $result[6]['name'] == $result[2]['name']){
        $gain += $result[6]['gain'] * $mise;
        }
    

        $_SESSION['solde'] = $_SESSION['solde'] - $mise + $gain;

        $finSpin = [];
        array_push($finSpin,$gain,$_SESSION['solde']);
         print_r(json_encode($finSpin));
}




?>



