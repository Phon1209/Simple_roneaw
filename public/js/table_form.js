// Brown Roll

var brown_fields = document.getElementsByClassName('brown');
var brown_toggle = document.getElementById('brownType');
var brown_pageperpaper = document.getElementById('brownPagePerPaper');

brown_toggle.addEventListener('click',function(){
  if(brown_toggle.innerHTML==="หน้า-หลัง")brown_toggle.innerHTML = "หน้าเดียว",brown_pageperpaper.value = "1";
  else brown_toggle.innerHTML = "หน้า-หลัง",brown_pageperpaper.value = "2";
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
var white_pageperpaper = document.getElementById('whitePagePerPaper');

white_toggle.addEventListener('click',function(){
  if(white_toggle.innerHTML==="หน้า-หลัง")white_toggle.innerHTML = "หน้าเดียว",white_pageperpaper.value = "1";
  else white_toggle.innerHTML = "หน้า-หลัง",white_pageperpaper.value = "2";
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
var color_pageperpaper = document.getElementById('colorPagePerPaper');

color_toggle.addEventListener('click',function(){
  if(color_toggle.innerHTML==="หน้า-หลัง")color_toggle.innerHTML = "หน้าเดียว",color_pageperpaper.value = "1";
  else color_toggle.innerHTML = "หน้า-หลัง",color_pageperpaper.value = "2";
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
