// Brown Roll

var brown_fields = document.getElementsByClassName('brown');
var brown_toggle = document.getElementById('brownType');
var brown_pageperpaper = document.getElementById('brownPagePerPaper');

var updateBrownFunction = function() {
  var target = document.getElementById('brown-total');
  var origin = document.getElementById('brownPageOrigin');
  var copy = document.getElementById('brownCopy');
  var fraction = brown_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('brownPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

const switch_button = element => {
  var sibling = element.parentNode.firstChild;
  while(sibling){

    if(sibling.nodeType === 1 && sibling.tagName === 'I'){
      sibling.classList.toggle('hide');
    }
    sibling = sibling.nextSibling;
  }
}

const brown_toggler = (e) => {
  if(brown_toggle.innerHTML==="หน้า-หลัง")brown_toggle.innerHTML = "หน้าเดียว",brown_pageperpaper.value = "1";
  else brown_toggle.innerHTML = "หน้า-หลัง",brown_pageperpaper.value = "2";
  switch_button(e.target);
}
document.querySelectorAll('#brown-toggler i').forEach(element => {
  element.addEventListener('click', brown_toggler);
  element.addEventListener('click',updateBrownFunction);
})

for(var iter = 0; iter < brown_fields.length ;iter++)
{
  brown_fields[iter].addEventListener('keyup',updateBrownFunction,false);
}
brown_toggle.addEventListener('click',updateBrownFunction);

// White Roll

var white_fields = document.getElementsByClassName('white');
var white_toggle = document.getElementById('whiteType');
var white_pageperpaper = document.getElementById('whitePagePerPaper');


const white_toggler = (e) => {
  if(white_toggle.innerHTML==="หน้า-หลัง")white_toggle.innerHTML = "หน้าเดียว",white_pageperpaper.value = "1";
  else white_toggle.innerHTML = "หน้า-หลัง",white_pageperpaper.value = "2";
  switch_button(e.target);
}

var updateWhiteFunction = function() {
  var target = document.getElementById('white-total');
  var origin = document.getElementById('whitePageOrigin');
  var copy = document.getElementById('whiteCopy');
  var fraction = white_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('whitePerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

document.querySelectorAll('#white-toggler i').forEach(element => {
  element.addEventListener('click',white_toggler);
  element.addEventListener('click',updateWhiteFunction);
})
for(var iter = 0; iter < white_fields.length ;iter++)
{
  white_fields[iter].addEventListener('keyup',updateWhiteFunction,false);
}
white_toggle.addEventListener('click',updateWhiteFunction);

// Color Roll

var color_fields = document.getElementsByClassName('color');
var color_toggle = document.getElementById('colorType');
var color_pageperpaper = document.getElementById('colorPagePerPaper');

const color_toggler = (e) => {
  if(color_toggle.innerHTML==="หน้า-หลัง")color_toggle.innerHTML = "หน้าเดียว",color_pageperpaper.value = "1";
  else color_toggle.innerHTML = "หน้า-หลัง",color_pageperpaper.value = "2";
  switch_button(e.target);
}
var updateColorFunction = function() {
  var target = document.getElementById('color-total');
  var origin = document.getElementById('colorPageOrigin');
  var copy = document.getElementById('colorCopy');
  var fraction = color_toggle.innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('colorPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
}

document.querySelectorAll('#color-toggler i').forEach(element => {
  element.addEventListener('click',color_toggler);
  element.addEventListener('click',updateColorFunction);
})
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

function zeroPaper(){
  var sum = 0;
  var invalidPaper = false;
  if(document.getElementById('brown-total').value < 0){
    invalidPaper = true;
  }
  else sum += (document.getElementById('brown-total').value);
  if(document.getElementById('white-total').value < 0){
    invalidPaper = true;
  }
  else sum += (document.getElementById('white-total').value);
  if(document.getElementById('color-total').value < 0){
    invalidPaper = true;
  }
  else sum += (document.getElementById('color-total').value);
  if(sum <=0 )invalidPaper = true;
  return invalidPaper;
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

  if (invalidData || zeroPaper()){
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

// Mobile Form Section

const decrementInput = e => {
  const currentChild = e.target;
  const target = currentChild.nextSibling;
  var value = parseInt(target.value);
  target.value = (isNaN(value) || value <= 0) ? 0 : value - 1;
}

const incrementInput = e => {
  const currentChild = e.target;
  const target = currentChild.previousSibling;
  var value = parseInt(target.value);
  target.value = (isNaN(value)) ? 1 : value + 1;
}



const mobile_switch_button = element => {
  var sibling = element.parentNode.firstChild;
  while(sibling){
    
    if(sibling.nodeType === 1 && sibling.tagName === 'I'){
      sibling.classList.toggle('hide');
    }
    
    if(sibling.nodeType === 1 && sibling.tagName === 'DIV'){
      if(sibling.innerText === "หน้า-หลัง")sibling.innerText = "หน้าเดียว",sibling.previousSibling.value = '1';
      else sibling.innerText = "หน้า-หลัง",sibling.previousSibling.value = '2';
    }
    sibling = sibling.nextSibling;
  }
}

const mobile_toggler = (e) => {
  mobile_switch_button(e.target);
}


// Brown

const updateBrownFunctionMobile = function() {
  var target = document.getElementById('brown-total');
  var origin = document.getElementById('brownPageOrigin-mol');
  var copy = document.getElementById('brownCopy-mol');
  var fraction = document.getElementById('brownType-mol').innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('brownPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
  
  document.getElementById('brownPageOrigin').value = origin.value;
  document.getElementById('brownCopy').value = copy.value;
  document.getElementById('brownPagePerPaper').value = fraction;
  document.getElementById('brown-perPage-mol').innerText = "จำนวนกระดาษที่ใช้ต่อชุด: " + parseInt(perPage.value);
  document.getElementById('brown-target-mol').innerText = "จำนวนกระดาษที่ต้องใช้ทั้งหมด: " + parseInt(target.value);
}

const brownInput = document.querySelectorAll('.brown.auto-fill');
brownInput.forEach(elem => {
  elem.addEventListener('keyup',updateBrownFunctionMobile);
})

// White

const updateWhiteFunctionMobile = function() {
  var target = document.getElementById('white-total');
  var origin = document.getElementById('whitePageOrigin-mol');
  var copy = document.getElementById('whiteCopy-mol');
  var fraction = document.getElementById('whiteType-mol').innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('whitePerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);
  

  document.getElementById('whitePageOrigin').value = origin.value;
  document.getElementById('whiteCopy').value = copy.value;
  document.getElementById('whitePagePerPaper').value = fraction;
  document.getElementById('white-perPage-mol').innerText = "จำนวนกระดาษที่ใช้ต่อชุด: " + parseInt(perPage.value);
  document.getElementById('white-target-mol').innerText = "จำนวนกระดาษที่ต้องใช้ทั้งหมด: " + parseInt(target.value);
}

const whiteInput = document.querySelectorAll('.white.auto-fill');
whiteInput.forEach(elem => {
  elem.addEventListener('keyup',updateWhiteFunctionMobile);
})

// Color

const updateColorFunctionMobile = function() {
  var target = document.getElementById('color-total');
  var origin = document.getElementById('colorPageOrigin-mol');
  var copy = document.getElementById('colorCopy-mol');
  var fraction = document.getElementById('colorType-mol').innerHTML==="หน้า-หลัง" ? 2:1;
  var perPage = document.getElementById('colorPerCopy');
  perPage.value = Math.ceil(origin.value/fraction);
  target.value =Math.ceil(origin.value/fraction)*(copy.value);


  document.getElementById('colorPageOrigin').value = origin.value;
  document.getElementById('colorCopy').value = copy.value;
  document.getElementById('colorPagePerPaper').value = fraction;
  document.getElementById('color-perPage-mol').innerText = "จำนวนกระดาษที่ใช้ต่อชุด: " + parseInt(perPage.value);
  document.getElementById('color-target-mol').innerText = "จำนวนกระดาษที่ต้องใช้ทั้งหมด: " + parseInt(target.value);
}

const colorInput = document.querySelectorAll('.color.auto-fill');
colorInput.forEach(elem => {
  elem.addEventListener('keyup',updateColorFunctionMobile);
})


const toggler = document.querySelectorAll('.grid-table .fa-chevron-circle-right , .grid-table .fa-chevron-circle-left');
toggler.forEach(e => {
  e.addEventListener('click',mobile_toggler);
  e.addEventListener('click',updateBrownFunctionMobile);
  e.addEventListener('click',updateWhiteFunctionMobile);
  e.addEventListener('click',updateColorFunctionMobile);
})
const minusBtn = document.querySelectorAll('.fa-minus-circle');
minusBtn.forEach(e => {
  e.addEventListener('click',decrementInput);
  e.addEventListener('click',updateBrownFunctionMobile);
  e.addEventListener('click',updateWhiteFunctionMobile);
  e.addEventListener('click',updateColorFunctionMobile);
});

const plusBtn = document.querySelectorAll('.fa-plus-circle');
plusBtn.forEach(e => {
  e.addEventListener('click',incrementInput);
  e.addEventListener('click',updateBrownFunctionMobile);
  e.addEventListener('click',updateWhiteFunctionMobile);
  e.addEventListener('click',updateColorFunctionMobile);
});