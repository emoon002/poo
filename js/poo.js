//Scrolling Poo Name
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

//Clickable Poo
// var poop = document.querySelector('.poop');
// var target = poop.animate([
//   {transform: 'translate(0)'},
//   {transform: 'translate(100px, 100px)'}
// ], 500);
// target.addEventListener('finish', function() {
//   poop.style.transform = 'translate(100px, 100px)';
// });

//Poop Random
function animatePoop() {
  var poop = $('.poop');
  var maxLeft = $(window).width() - poop.width();
  var maxTop = $(window).height() - poop.height();
  var leftPos = Math.floor(Math.random() * (maxLeft + 1));
  var topPos = Math.floor(Math.random() * (maxTop + 1));

  poop.css({ left: leftPos, top: topPos }).animate(1000);

  //Poop Rain
  // $('.poop').each(function(){
  //   var target = this.animate([
  //     {transform: 'translate(-1000px, -1000px)'},
  //     {transform: 'translate(1000px, 1000px)'}
  //   ], 1000);
  //
  //   target.addEventListener('end', function() {
  //     this.style.transform = 'translate(1000px, 1000px)';
  //   });
  // });
}

setInterval(function() {
  animatePoop();
}, 1000);
startShit();
