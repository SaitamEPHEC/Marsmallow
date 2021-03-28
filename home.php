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
 
 @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap');

.slot {
	background:url("images/rouleau.png") repeat-y; /*Taken from http://www.swish-designs.co.uk*/
	width:250px;
	height:200px;
	float:left;
	/*border-right:2px solid red;
    border-bottom:2px solid red;*/
	background-position: 0px 4px;
}
.contain {
	margin:0 auto;
    margin-top: 184px;
	width:750px;
    background:url("images/Board.png") no-repeat;
    background-size: cover;
}
.motion {
	background:url("images/rouleau_blur.png") repeat-y; /*Taken from http://www.swish-designs.co.uk*/
}


.background {
    background:url("images/Background_3.png") no-repeat;
    background-size: 1550px;
    background-position: center;
    margin-top: 20px;
}

.head-spin{
    display: block;
    margin:auto;
}

.height{
    height: 620px;
}

.barre{
    background-color: rgba(0,0,0,0.5);
    font-family: 'Orbitron', sans-serif;
    color: white;
    font-size: 40px;
    padding-left : 20px;
    padding-right : 20px;
}

.form-control{
    display: inline-block; 
    width: auto;
}


#control{
    margin-bottom: -50px;
    margin-right: 50px;
    z-index:2;
}

.wrapper{
    max-width: 1550px;
    max-height: 869px;
    margin-left: auto;
    margin-right: auto;    

}
.miseActive {
    background-image: linear-gradient(white, #dc0101);
}

.smallerButton{
    width: 50%;
}

.mise{
    border-radius: 10px;
    font-family: 'Orbitron', sans-serif;
    font-weight: 500;
}

.borderlighter{
    
    animation: pulse 2s infinite;
}



@keyframes pulse {
  0% {
    box-shadow : inset 0 0 35px #ff0000;
    
  }
  25%{
    box-shadow : inset 0 0 35px #fff700;

    
  }
  50%{
    box-shadow : inset 0 0 35px #ff0000;

  }
  75%{
    box-shadow : inset 0 0 35px #fff700;

  }
  100% {
    box-shadow : inset 0 0 35px #ff0000;
  }
}

.bigwin{
    /*position: absolute;
    z-index: 10;
    bottom: 10%;
    background-image: url('images/bande_bigwin.png');
    background-size: 1550px;
    max-width: 1550px;
    height: 100%;*/
    position: absolute;
    max-width: 1550px;
    bottom: 5%;
}

.banderolle{
    width: 100%;
    position: relative;
}
.img_bigwin1{
    position: absolute;
    left: 0px;
    top: 230px;
    z-index: 10;
    width: 30%;
    transform: translateX(100%);    
}

.img_bigwin2{
    position: absolute;
    left: 0px;
    top: 230px;
    z-index: 10;
    width: 30%;
    transform: translateX(100%);    
}

</style>

<main class="container-fluid background">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12 mx-auto">
            
                <form>
                    <!-- <div class="head-spin">
                    <img src="images/Logo.png" style="width:100%;" >

                    </div> -->

                    <div class="contain">
                    	<div class="slot-wrapper">
                    		<div id="slot1" class="slot"></div>
                    		<div id="slot2" class="slot"></div>
                    		<div id="slot3" class="slot" style="border-right:none;"></div>
                    		<div class="clear"></div>
                    	
                    		<div id="slot4" class="slot"></div>
                    		<div id="slot5" class="slot"></div>
                    		<div id="slot6" class="slot" style="border-right:none;"></div>
                    		<div class="clear"></div>

                            <div id="slot7" class="slot" style="border-bottom:none;"></div>
                    		<div id="slot8" class="slot" style="border-bottom:none;"></div>
                    		<div id="slot9" class="slot" style="border-right:none; border-bottom:none;"></div>
                    		<div class="clear"></div>
                    	</div>
                	
                    </div>


                <!-- <div id="result"><span>Gain : </span> <span id="gain"></span> €</div>
                <div id=""><span>Solde : </span> <span id="solde"> €</span></div>
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
                </div> -->
                <div class="d-none bigwin">
                    <img src="images/bande_bigwin.png" class ="banderolle" alt="">
                    <img src="images/soucoupe.png" class ="img_bigwin1" alt="">
                    <img src="images/bigwin_texte.png" class="img_bigwin2" alt="">
                </div>
                <div class="height d-flex align-items-end justify-content-end">
                    <input id="control" type="image" alt="bouton play" class="smallerButton" src="images/play.png" value="Start">
                    <!-- <input id="control" type="button" value="Start"> -->
                </div>
                <div class="col-md-12 barre">
                    <span class="mr-5 ">Solde :  <span class="finalSolde"><?php echo $_SESSION['solde']; ?> </span>€</span>
                    <span class="ml-5 mr-5 ">Gain : <span class="finalGain"></span> € </span>
                    
                    <input type="button" name="0.10" class="mise miseActive" value="0.10€">
                    <input type="button" name="0.20" class="mise" value="0.20€">
                    <input type="button" name="0.50" class="mise" value="0.50€">
                    <input type="button" name="1" class="mise" value="1.00€">
                    
                    <!-- <span>
                        <select id="mise" name="mise" class="form-control" id="">
                            <option value="0.20">0.20</option>
                            <option value="0.50">0.50</option>
                            <option value="1">1</option>
                        </select>
                    </span> -->
                
                </div>
                

                </form>
            </div>
        </div>
    </div>
</main>