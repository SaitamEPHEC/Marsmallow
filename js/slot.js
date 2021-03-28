/**
* Slot machine
* Author: Saurabh Odhyan | http://odhyan.com
*
* Licensed under the Creative Commons Attribution-ShareAlike License, Version 3.0 (the "License")
* You may obtain a copy of the License at
* http://creativecommons.org/licenses/by-sa/3.0/
*
* Date: May 23, 2011 
*/
$(document).ready(function() {
    /**
    * Global variables
    * 1374+238 = 1612
    * 1688
    * 1756
    */

    var valControl = document.getElementById('control').value;
    var completed = 0,
        imgHeight = 1374,
        // posArr = [
        //     0, //orange
        //     80, //number 7 
        //     165, //bar
        //     237, //guava
        //     310, //banana
        //     378, //cherry
        //     454, //orange
        //     539, //number 7
        //     624, //bar
        //     696, //guava
        //     769, //banana
        //     837, //cherry
        //     913, //orange
        //     1000, //number 7
        //     1085, //bar
        //     1157, //guava
        //     1230, //banana
        //     1298 //cherry
        // ];
        // posArr = [
        //     4, // 7
        //     220, // 3
        //     415, // 6
        //     623, // 8
        //     835, // 2
        //     1045, // 4
        //     1220, // 1
        //     1395, // 5
        //     1600, // 7
        //     1790, // 3
        //     1980, // 6
        //     2190, // 8
        //     2400, // 2
        //     2600, // 4
        //     2790, // 1
        //     2960, // 5
        //     3160, // 7
        //     3340, // 3
        //     3540, // 6
        //     3745, // 8
        //     3950, // 2
        //     4160, // 4
        //     4340, // 1
        //     4520, // 5
        // ];
        posArr = [
            -5, // Astronaute
            195, // Cristal Rouge
            395, // Alien
            595, // Cristal Bleu
            795, // Planete
            995, // Bonus
            1195, // Rocher
            1395, // Planete
            // 1610, // Astronaute
            // 1800, // Cristal Rouge
            // 1995, 
            // 2195,
            // 2395,
            // 2595,
            // 2795,
            // 2995,
            // 3195,
            // 3395,
            // 3595,
            // 3795,
            // 3995,
            // 4195,
            // 4395,
            // 4595,
        ];
    
    // var win = [];
    // win[0] = win[454] = win[913] = 1;
    // win[80] = win[539] = win[1000] = 2;
    // win[165] = win[624] = win[1085] = 3;
    // win[237] = win[696] = win[1157] = 4;
    // win[310] = win[769] = win[1230] = 5;
    // win[378] = win[837] = win[1298] = 6;

    /**
    * @class Slot
    * @constructor
    */
    function Slot(el, max, step) {
        this.speed = 0; //speed of the slot at any point of time
        this.step = step; //speed will increase at this rate
        this.si = null; //holds setInterval object for the given slot
        this.el = el; //dom element of the slot
        this.maxSpeed = max; //max speed this slot can have
        this.pos = null; //final position of the slot  
        this.finalpx = 0;  
        this.prock = 0;

        $(el).pan({
            fps:30,
            dir:'down'
        });
        $(el).spStop();
    }

    /**
    * @method start
    * Starts a slot
    */
    Slot.prototype.start = function() {
        var _this = this;
        $(_this.el).addClass('motion');
        $(_this.el).spStart();
        _this.si = window.setInterval(function() {
            if(_this.speed < _this.maxSpeed) {
                _this.speed += _this.step;
                $(_this.el).spSpeed(_this.speed);
            }
        }, 100);
    };

    /**
    * @method stop
    * Stops a slot
    */
    Slot.prototype.stop = function() {


        var _this = this,
            limit = 30;
        clearInterval(_this.si);
        _this.si = window.setInterval(function() {
            if(_this.speed > limit) {
                _this.speed -= _this.step;
                $(_this.el).spSpeed(_this.speed);
            }
            if(_this.speed <= limit) {

                


                _this.finalPos(_this.el);
                $(_this.el).spSpeed(0);
                $(_this.el).spStop();
                clearInterval(_this.si);
                $(_this.el).removeClass('motion');
                _this.speed = 0;
            }
        }, 100);
    };

    /**
    * @method finalPos
    * Finds the final position of the slot
    */
    Slot.prototype.finalPos = function() {
        var el = this.el,
            el_id,
            pos,
            posMin = 2000000000,
            best,
            bgPos,
            i,
            j,
            k;

        var finalPex = this.finalpx;

        el_id = $(el).attr('id');
        //pos = $(el).css('background-position'); //for some unknown reason, this does not work in IE
        
        pos = document.getElementById(el_id).style.backgroundPosition;
        pos = pos.split(' ')[1];
        pos = parseInt(pos, 10);

        for(i = 0; i < posArr.length; i++) {
            for(j = 0;;j++) {
                k = posArr[i] + (imgHeight * j);
                if(k > pos) {
                    if((k - pos) < posMin) {
                        posMin = k - pos;
                        this.pos = posArr[i]; //update the final position of the slot
                    }
                    break;
                }
            }
        }



        best += best + 4;
        best    =   finalPex;
        bgPos = "0 " + best + "px";
        $(el).animate({
            backgroundPosition:"(" + bgPos + ")"
        }, {
            duration: 200,
            complete: function() {
                completed ++;
            }
        });
    };
    
    /**
    * @method reset
    * Reset a slot to initial state
    */
    Slot.prototype.reset = function() {
        var el_id = $(this.el).attr('id');
        $._spritely.instances[el_id].t = 0;
        $(this.el).css('background-position', '0px 4px');
        this.speed = 0;
        completed = 0;
        $('#result').html('');
    };

    function enableControl() {
        $('#control').attr("disabled", false);
    }

    function disableControl() {
        $('#control').attr("disabled", true);
    }

    function printResult() {
        var res;
        if(win[a.pos] === win[b.pos] && win[a.pos] === win[c.pos]) {
            res = "You Win!";
        } else {
            res = "You Lose";
        }
        $('#result').html(res);
    }

    //create slot objects
    var a = new Slot('#slot1', 60, 9),
        b = new Slot('#slot2', 60, 5),
        c = new Slot('#slot3', 60, 1),
        d = new Slot('#slot4', 60, 9),
        e = new Slot('#slot5', 60, 5),
        f = new Slot('#slot6', 60, 1),
        g = new Slot('#slot7', 60, 9),
        h = new Slot('#slot8', 60, 5),
        i = new Slot('#slot9', 60, 1);

    /**
    * Slot machine controller
    */
     var gain;
     var solde;
     var bigwin;
    $('#control').click(function() {
        var x;
        
        if(valControl == "Start") {
            

            $("#slot1,#slot2,#slot3,#slot4,#slot5,#slot6,#slot7,#slot8,#slot9").removeClass("borderlighter");
            var mise = $(".miseActive").attr('name');
            
           
            
                jQuery.ajax({
                    type: "POST",
                    url:    "algo.php",
                    data: {mise:mise},
                    async:   true,

                    success: function(data) {
                        var result =  jQuery.parseJSON(data);
                        a.finalpx = result[0];
                        b.finalpx = result[1];
                        c.finalpx = result[2];
                        d.finalpx = result[3];
                        e.finalpx = result[4];
                        f.finalpx = result[5];
                        g.finalpx = result[6];
                        h.finalpx = result[7];
                        i.finalpx = result[8];
                        a.prock = result[9];
                        b.prock = result[10];
                        c.prock = result[11];
                        d.prock = result[12];
                        e.prock = result[13];
                        f.prock = result[14];
                        g.prock = result[15];
                        h.prock = result[16];
                        i.prock = result[17];
                        
                         gain = result[18];
                         solde = result[19];
                         bigwin = result[20];
                         console.log(result);
                        
                             }               });     
            
        
            
            a.start();
            b.start();
            c.start();
            d.start();
            e.start();
            f.start();
            g.start();
            h.start();
            i.start();
            valControl = "Stop";
            
            disableControl(); //disable control until the slots reach max speed
            
            //check every 100ms if slots have reached max speed 
            //if so, enable the control
            x = window.setInterval(function() {
                if(a.speed >= a.maxSpeed && b.speed >= b.maxSpeed && c.speed >= c.maxSpeed) {
                    enableControl();
                    $("#control").click();
                    window.clearInterval(x);
                    
                }
            }, 100);
        } else if(valControl == "Stop") {


           

            a.stop();
            b.stop();
            c.stop();
            d.stop();
            e.stop();
            f.stop();
            g.stop();
            h.stop();
            i.stop();

            valControl = "Reset";

            disableControl(); //disable control until the slots stop
            
            //check every 100ms if slots have stopped
            //if so, enable the control
            x = window.setInterval(function() {
                if(a.speed === 0 && b.speed === 0 && c.speed === 0 ) {
                    enableControl();
                    window.clearInterval(x);

                    if (a.prock == 1) {
                        $("#slot1").addClass("borderlighter");
                    }
                    if (b.prock == 1) {
                        $("#slot2").addClass("borderlighter");
                    }
                    if (c.prock == 1) {
                        $("#slot3").addClass("borderlighter");
                    }
                    if (d.prock == 1) {
                        $("#slot4").addClass("borderlighter");
                    }
                    if (e.prock == 1) {
                        $("#slot5").addClass("borderlighter");
                    }
                    if (f.prock == 1) {
                        $("#slot6").addClass("borderlighter");
                    }
                    if (g.prock == 1) {
                        $("#slot7").addClass("borderlighter");
                    }
                    if (h.prock == 1) {
                        $("#slot8").addClass("borderlighter");
                    }
                    if (i.prock == 1) {
                        $("#slot9").addClass("borderlighter");
                    }

                    $(".finalSolde").html(solde);
                    $(".finalGain").html(gain);
                    if (bigwin ==1) {
                        $(".bigwin").addClass("bigwinBande");

                        $(".bigwin").removeClass("bigwin");

                    }
                    else if (bigwin == 2) {
                        $(".video_mars").css("display","block");
                    }
                    valControl = "Start";
                }
            }, 100);
        } else { //reset
            a.reset();
            b.reset();
            c.reset();
            d.reset();
            e.reset();
            f.reset();
            g.reset();
            h.reset();
            i.reset();

            valControl = "Start";
        }
    });
});