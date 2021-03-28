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
<link rel="stylesheet" href="info.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<script src="js/jquery.spritely.js"></script>
<script src="js/jquery.backgroundPosition.js"></script>

<script src="js/slot.js"></script>
<script src="js/algo.js"></script>




<style>
 
 @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap');

.slot {
	background:url("images/Rouleau.png") repeat-y; /*Taken from http://www.swish-designs.co.uk*/
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
    display: none;
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

.bigwinBande {

  position: absolute;
    width: -webkit-fill-available;
    max-height: 100%;
    left: 0;
    bottom: 20%;
    animation: bigwin 3s ;
    z-index:5;
    opacity : 0;
    display:block;
}

.bigwin {
    display:none;
}


@keyframes bigwin {
  0% {
margin-right:800px;    
  }
  50% {
    margin-right:0px;    
  }
  75% {
    margin-left: 0;
 }
 90% {
     opacity:1;
 }
100% {
    opacity:0; 
}
}


.video_mars{
position: absolute;
left: -160px;
top: -20px;
z-index: 20;
width: 120%;
height: 115%;
display:none;
animation: marswin 3s ;

}

@keyframes marswin {
  0% {
opacity:0   
  }
  50% {
opacity: 0.5;  }
  75% {
opacity: 0.75; }
 90% {
     opacity:0.9;
 }
100% {
    opacity:1; 
}
}

.start {
    width: 100%;
    height: 100%;

}
.start-video {
    width: 100%;
    max-height: 100%;
    height: auto;
    background-size: cover;
    animation: zoomstart 1s infinite alternate;

}
body {
    background-color:black
}

</style>

<div class="start">
<img class="start-video" src="images/start.png" alt="">
</div>


<main class="container-fluid background">
<img src="images/BIGWIN.png" class="bigwin" >
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12 mx-auto">
           <!-- -->
                <form>
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

                <div>
                <video controls preload="auto" class="video_mars" >
                <source src="video/WINMARS_2.mp4" type="video/mp4">
                <!-- <source src="tortue.webm" type="video/webm"> -->
                Le fichier ne peut pas être lu
                </video>
                </div>

                <div class="height d-flex align-items-end justify-content-end">
                    
                        <img id="myImg" src="images/page_info.png"  style="width:100%;max-width:75px">
                        <!-- <button type="button" id="myImg" data-toggle="modal" src="images/page_info.png" data-target="#exampleModal">INFOS</button> -->
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                        </div>
                    <input id="control" type="image" alt="bouton play" class="smallerButton" src="images/play.png" value="Start">
                    <!-- <input id="control" type="button" value="Start"> -->
                </div>
                
                <div class="col-md-12 barre">
                    <span class="mr-5 ">Solde :  <span class="finalSolde"><?php echo $_SESSION['solde']; ?> </span>€</span>
                    <span class="ml-5 mr-5 ">Gain : <span class="finalGain">0</span> € </span>
                    
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



 <script>
// Get the modal
var modal = document.getElementById("myModal");

 // Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
modal.style.display = "block";
modalImg.src = this.src;
captionText.innerHTML = this.alt;
}

 // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

 // When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
</script>