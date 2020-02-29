// Brown Roll

var brown_fields = document.getElementsByClassName('brown');
var brown_toggle = document.getElementById('brownType');

brown_toggle.addEventListener('click',function(){
  if(brown_toggle.innerHTML==="หน้า-หลัง")brown_toggle.innerHTML = "หน้าเดียว";
  else brown_toggle.innerHTML = "หน้า-หลัง";
})
var updateBrownFunction = function() {
  var target = document.getElementById('brown-total');
  var origin = document.getElementById('brownPageOrigin');
  var copy = document.getElementById('brownCopy');
  var fraction = brown_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('brownPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

for(var iter = 0; iter < brown_fields.length ;iter++)
{
  brown_fields[iter].addEventListener('keyup',updateBrownFunction,false);
}
brown_toggle.addEventListener('click',updateBrownFunction);

// White Roll

var white_fields = document.getElementsByClassName('white');
var white_toggle = document.getElementById('whiteType');

white_toggle.addEventListener('click',function(){
  if(white_toggle.innerHTML==="หน้า-หลัง")white_toggle.innerHTML = "หน้าเดียว";
  else white_toggle.innerHTML = "หน้า-หลัง";
})
var updateWhiteFunction = function() {
  var target = document.getElementById('white-total');
  var origin = document.getElementById('whitePageOrigin');
  var copy = document.getElementById('whiteCopy');
  var fraction = white_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('whitePerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

for(var iter = 0; iter < white_fields.length ;iter++)
{
  white_fields[iter].addEventListener('keyup',updateWhiteFunction,false);
}
white_toggle.addEventListener('click',updateWhiteFunction);

// Color Roll

var color_fields = document.getElementsByClassName('color');
var color_toggle = document.getElementById('colorType');

color_toggle.addEventListener('click',function(){
  if(color_toggle.innerHTML==="หน้า-หลัง")color_toggle.innerHTML = "หน้าเดียว";
  else color_toggle.innerHTML = "หน้า-หลัง";
})
var updateColorFunction = function() {
  var target = document.getElementById('color-total');
  var origin = document.getElementById('colorPageOrigin');
  var copy = document.getElementById('colorCopy');
  var fraction = color_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('colorPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

for(var iter = 0; iter < color_fields.length ;iter++)
{
  color_fields[iter].addEventListener('keyup',updateColorFunction,false);
}
color_toggle.addEventListener('click',updateColorFunction);