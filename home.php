<?php
session_start();
if (!isset($_SESSION['solde'])) {
    $_SESSION['solde'] = 100;
}


?>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<script src="js/jquery.spritely.js"></script>
<script src="js/jquery.backgroundPosition.js"></script>

<script src="js/slot.js"></script>
<script src="js/algo.js"></script>



<style>
 
.slot {
	background:url("images/reel_normal.png") repeat-y; /*Taken from http://www.swish-designs.co.uk*/
	width:86px;
	height:70px;
	float:left;
	border:1px solid #000;
	background-position:0 4px;
}
.contain {
	margin:0 auto;
	width:266px;
    background:url("images/Board.png") no-repeat;
    background-size: cover;
}
.motion {
	background:url("images/reel_blur.png") repeat-y; /*Taken from http://www.swish-designs.co.uk*/
}


.main {
    background:url("images/Background.png") no-repeat;
    background-size: cover;
    margin-top: 80px;

}
.head-spin{
    display: block;
    margin:auto;
}
</style>

<main class="container">
    <div class="row">
        <div class="col-md-12 mx-auto main">
        
        <form>
            <div class="head-spin">
            <img src="images/Logo.png" style="width:100%;" >

            </div>
        <div class="contain">
		<div class="slot-wrapper">
			<div id="slot1" class="slot"></div>
			<div id="slot2" class="slot"></div>
			<div id="slot3" class="slot"></div>
			<div class="clear"></div>
		
			<div id="slot4" class="slot"></div>
			<div id="slot5" class="slot"></div>
			<div id="slot6" class="slot"></div>
			<div class="clear"></div>

            <div id="slot4" class="slot"></div>
			<div id="slot5" class="slot"></div>
			<div id="slot6" class="slot"></div>
			<div class="clear"></div>
		</div>
		
	</div>

    <!--
        <div id="result"><span>Gain : </span> <span id="gain"></span> €</div>
        <div id=""><span>Solde : </span> <span id="solde"><?php echo $_SESSION['solde'] ?> €</span></div>
		<div></div>
        <div class="mb-3">
        <select id="mise" name="mise" class="form-control" id="">
        <option value="0.20">0.20</option>
        <option value="0.50">0.50</option>
        <option value="1">1</option>
        </select>

        </div>
        <div id="result"></div>
        <div class="mb-3">
        <input id="control" type="button" value="Start">
        </div>
-->

        </form>
        </div>
    </div>
</main>