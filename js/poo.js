$(function() {
  $('#foo').rainbow({animate:true,animateInterval:100,colors:['#FF0000','#f26522','#fff200','#00a651','#28abe2','#2e3192','#6868ff']});
});
$('#rainbow').rainbow({
  colors: [
      '#FF0000',
      '#f26522',
      '#fff200',
      '#00a651',
      '#28abe2',
      '#2e3192',
      '#6868ff'
  ],
  animate: true,
  animateInterval: 100,
  pad: false,
  pauseLength: 100
});
function startShit(){
var delay = 50;
var mydiv = document.getElementById('poo').innerHTML;
var myVar = setInterval(myTimer, delay);
var poocount = 0;
function myTimer() {
    if (poocount>=mydiv.length){
         poocount = 0;
    }
    var newText = mydiv.substring(0, poocount) + "💩" + mydiv.substring(poocount+1, mydiv.length);
    document.getElementById("poo").innerHTML = newText;
    poocount++;
}
};
