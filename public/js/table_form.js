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

function radioChecked(name){
  var selector = 'input[name=\'' + name + '\']:checked';
  var checkRadio = document.querySelector(selector);
  return checkRadio !== null ? true:false;
}

function validateInput(){
  var sum = 0;
  var invalidData = false;
  var unNullInput = document.getElementsByClassName('auto-fill');
  for(var iter = 0; iter<unNullInput.length ;iter++){
    if(unNullInput[iter].value == 0)unNullInput[iter].value = 0;
    if(unNullInput[iter].value < 0)invalidData = true;
    sum += +unNullInput[iter].value;
  }
  return [sum,invalidData];
}

function removeLeadingZero(){
  var allInput = document.querySelectorAll('#table-form th > input');
  for(var iter = 0; iter < allInput.length ;iter++){
    allInput[iter].value = +allInput[iter].value;
  }
}

function callError(id)
{
  var element = document.getElementById(id);
  if(element.classList.contains('popup-error')){
    var newOne = element.cloneNode(true);
    element.parentNode.replaceChild(newOne,element);
  }
  else {
    element.classList.toggle('popup-error');
  }
}

function formCheck()
{
  if(!radioChecked('org')){
    callError("org-error");
    return false;
  }

  if(!radioChecked('work')){
    callError('work-error');
    return false;
  }

  var [sum,invalidData] = validateInput();

  updateBrownFunction();
  updateWhiteFunction();
  updateColorFunction();

  if (sum === 0 && invalidData === false){
    callError('blank-paper-error');
    return false;
  }

  if (invalidData){
    callError('invalid-paper-error');
    return false;
  }

  removeLeadingZero();

  return true;
}

function openPDF()
{
  window.open('/Report');
  var elementList=document.getElementsByClassName('pdf-layout');
  for(var i=0;i<elementList.length;i++)
  elementList[i].parentNode.removeChild(elementList[i]);
}
