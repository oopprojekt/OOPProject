<div class="test">
    <div class="a">
      <img src="http://localhost/OOPProject/bilder/spielfeld.jpg" id="bild" height="100%;"> </
      <br/>
      <p>

Wähle deine Formation: 

<select name="formGender" id="formation" onchange="myFunction()">

  <option value="https://i.pinimg.com/originals/5e/d2/e1/5ed2e125a2d45189cfd69a2c142b5b5d.jpg"></option>

  <option value="https://i.pinimg.com/originals/5e/d2/e1/5ed2e125a2d45189cfd69a2c142b5b5d.jpg">4-3-3</option>

  <option value="4321">4-3-2-1</option>

  <option value="F">3-4-2</option>

</select>
<p id="demo"></p>
 



</p>


    </div>
    <div class="b">


<table border="1" id="Table1" width="80%">
  <tr>
    <td>Position</td>
    <td>Spielername</td>
    <td>Wert</td>
    <td>Option</td> 
    <tr>
<?php

for($i=0; $i < 4; $i++) {
   echo "    <td> TW</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> IV</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> RV</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> LV</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> ZDM</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> ZOM</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> LF</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> ST</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
for($i=0; $i < 4; $i++) {
   echo "    <td> RF</td>
    <td>Thomas Müller</td>
    <td>86</td>
    <td> <input type='checkbox'/> </td>
    <tr>";
}
?>
</table>
<input id = "btnGet" type="button" value="Startelf für nächstes Spiel abgeben" />
    </div>
  </div>

</div>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

  
  function myFunction() {

  var img = document.getElementById("formation");
    var value = img.options[img.selectedIndex].value;
   

  var x = document.getElementById("formation");
  var i = x.selectedIndex;
  test = x.options[i].text;


  if(test == "4-3-3"){
   formation = 433;
    document.getElementById("bild").src = "http://localhost/OOPProject/bilder/spielfeld433.jpg";
  }
  if(test == "4-3-2-1"){
   formation = 4321;
  }
  if(test == "3-4-2"){
   formation = 342;
  } 





    $(function () {
        //Assign Click event to Button.
        $("#btnGet").click(function () {
            var message = "";
 
            //Loop through all checked CheckBoxes in GridView.
            $("#Table1 input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                message += row.cells[0].innerHTML;
                message += "\n";
            });


            //Display selected Row data in Alert Box.
            var TWexists = message.includes("TW");
            if(TWexists) {
            var TW = (message.match(/TW/g)).length;
            }
            var LVexists = message.includes("LV");
            if(LVexists) {
            var LV = (message.match(/LV/g)).length;
            }
            var IVexists = message.includes("IV");
            if(IVexists) {
            var IV = (message.match(/IV/g)).length;
            }
            var RVexists = message.includes("RV");
            if(RVexists) {
            var RV = (message.match(/RV/g)).length;
            }
            var ZDMexists = message.includes("ZDM");
            if(ZDMexists) {
            var ZDM = (message.match(/ZDM/g)).length;
            }
            var LFexists = message.includes("LF");
            if(LFexists) {
            var LF = (message.match(/LF/g)).length;
            }
            var ZOMexists = message.includes("ZOM");
            if(ZOMexists) {
            var ZOM = (message.match(/ZOM/g)).length;
            }
            var RFexists = message.includes("RF");
            if(RFexists) {
            var RF = (message.match(/RF/g)).length;
            }
            var STexists = message.includes("ST");
            if(STexists) {
            var ST = (message.match(/ST/g)).length;
            }



 
var numTW = "0";
var numLV = "0";
var numIV = "0";
var numRV = "0";
var numZDM = "0";
var numZOM = "0";
var numLF = "0";
var numST = "0";
var numRF = "0";

if(TW !== undefined){
  var numTW = TW.toString();
}
if(LV !== undefined){
  var numLV = LV.toString();
}
if(IV !== undefined){
  var numIV = IV.toString();
}
if(RV !== undefined){
  var numRV = RV.toString();
}
if(ZDM !== undefined){
  var numZDM = ZDM.toString();
}
if(ZOM !== undefined){
  var numZOM = ZOM.toString();
}
if(LF !== undefined){
  var numLF = LF.toString();
}
if(ST !== undefined){
  var numST = ST.toString();
}
if(RF !== undefined){
  var numRF = RF.toString();
}

var TW = parseInt(numTW);
var DF = parseInt(numIV) + parseInt(numRV) + parseInt(numLV);
var MF = parseInt(numZDM) + parseInt(numZOM);
var ST = parseInt(numLF) + parseInt(numST) +parseInt(numRF);


 
  if(formation == 433) {
    if(TW == 1 && DF == 4 && MF == 3 && ST == 3 ){
      var readyForGame = true;
    } else { var readyForGame = false;
    }

  }
  if(formation == 4321) {
    if(TW == 1 && DF == 4 && MF == 5 && ST == 1 ){
      var readyForGame = true;
    } else { var readyForGame = false;
    }
  }

 console.log(readyForGame);
        });



    });


 }








</script>


<style type="text/css">
  
body {
  margin: 0;
  padding: 10%;
}

.a {
  display: inline-block;
  width: 38%;
  background-color: #;
  height: 59.5vh;
  float: left;

}

.b {
  display: inline-block;
  width: 62%;
  background-color: #;
  height: 20px;
  float: right;
  height: 59.5vh;
  overflow-y: scroll;
}

.test {
  width: 100%;
}
.test:after{
  display: block;
  content: "";
  clear: both;
}

</style>

<?php
include_once "./scripte/php/DB.php";
$db_test = new DB("grete@il.de");
$db_test->gets_spieler_array();
//welche werte da im array stehen siehst du unter DB.php methode gets_array ;)
?>