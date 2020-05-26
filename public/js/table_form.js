// Brown Roll

const brown_fields = document.getElementsByClassName("brown");
const brown_toggle = document.getElementById("brownType");
const brown_pageperpaper = document.getElementById("brownPagePerPaper");

const updateBrownFunction = function () {
  const target = document.getElementById("brown-total");
  const origin = document.getElementById("brownPageOrigin");
  const copy = document.getElementById("brownCopy");
  const fraction = brown_toggle.innerHTML === "หน้า-หลัง" ? 2 : 1;
  const perPage = document.getElementById("brownPerCopy");
  perPage.value = Math.ceil(origin.value / fraction);
  target.value = Math.ceil(origin.value / fraction) * copy.value;
};

const switch_button = (element) => {
  const targeter = element.parentNode.id;
  document.querySelectorAll(`#${targeter} i`).forEach((elem) => {
    elem.classList.toggle("hide");
  });
};

const brown_toggler = (e) => {
  if (brown_toggle.innerHTML === "หน้า-หลัง")
    (brown_toggle.innerHTML = "หน้าเดียว"), (brown_pageperpaper.value = "1");
  else (brown_toggle.innerHTML = "หน้า-หลัง"), (brown_pageperpaper.value = "2");
  switch_button(e.target);
};
document.querySelectorAll("#brown-toggler i").forEach((element) => {
  element.addEventListener("click", brown_toggler);
  element.addEventListener("click", updateBrownFunction);
});

for (let iter = 0; iter < brown_fields.length; iter++) {
  brown_fields[iter].addEventListener("keyup", updateBrownFunction, false);
}
brown_toggle.addEventListener("click", updateBrownFunction);

// White Roll

const white_fields = document.getElementsByClassName("white");
const white_toggle = document.getElementById("whiteType");
const white_pageperpaper = document.getElementById("whitePagePerPaper");

const white_toggler = (e) => {
  if (white_toggle.innerHTML === "หน้า-หลัง")
    (white_toggle.innerHTML = "หน้าเดียว"), (white_pageperpaper.value = "1");
  else (white_toggle.innerHTML = "หน้า-หลัง"), (white_pageperpaper.value = "2");
  switch_button(e.target);
};

const updateWhiteFunction = function () {
  const target = document.getElementById("white-total");
  const origin = document.getElementById("whitePageOrigin");
  const copy = document.getElementById("whiteCopy");
  const fraction = white_toggle.innerHTML === "หน้า-หลัง" ? 2 : 1;
  const perPage = document.getElementById("whitePerCopy");
  perPage.value = Math.ceil(origin.value / fraction);
  target.value = Math.ceil(origin.value / fraction) * copy.value;
};

document.querySelectorAll("#white-toggler i").forEach((element) => {
  element.addEventListener("click", white_toggler);
  element.addEventListener("click", updateWhiteFunction);
});
for (let iter = 0; iter < white_fields.length; iter++) {
  white_fields[iter].addEventListener("keyup", updateWhiteFunction, false);
}
white_toggle.addEventListener("click", updateWhiteFunction);

// Color Roll

const color_fields = document.getElementsByClassName("color");
const color_toggle = document.getElementById("colorType");
const color_pageperpaper = document.getElementById("colorPagePerPaper");

const color_toggler = (e) => {
  if (color_toggle.innerHTML === "หน้า-หลัง")
    (color_toggle.innerHTML = "หน้าเดียว"), (color_pageperpaper.value = "1");
  else (color_toggle.innerHTML = "หน้า-หลัง"), (color_pageperpaper.value = "2");
  switch_button(e.target);
};
const updateColorFunction = function () {
  const target = document.getElementById("color-total");
  const origin = document.getElementById("colorPageOrigin");
  const copy = document.getElementById("colorCopy");
  const fraction = color_toggle.innerHTML === "หน้า-หลัง" ? 2 : 1;
  const perPage = document.getElementById("colorPerCopy");
  perPage.value = Math.ceil(origin.value / fraction);
  target.value = Math.ceil(origin.value / fraction) * copy.value;
};

document.querySelectorAll("#color-toggler i").forEach((element) => {
  element.addEventListener("click", color_toggler);
  element.addEventListener("click", updateColorFunction);
});
for (let iter = 0; iter < color_fields.length; iter++) {
  color_fields[iter].addEventListener("keyup", updateColorFunction, false);
}
color_toggle.addEventListener("click", updateColorFunction);

function radioChecked(name) {
  const selector = "input[name='" + name + "']:checked";
  const checkRadio = document.querySelector(selector);
  return checkRadio !== null ? true : false;
}

function validateInput() {
  const sum = 0;
  const invalidData = false;
  const unNullInput = document.getElementsByClassName("auto-fill");
  for (const iter = 0; iter < unNullInput.length; iter++) {
    if (unNullInput[iter].value == 0) unNullInput[iter].value = 0;
    if (unNullInput[iter].value < 0) invalidData = true;
    sum += +unNullInput[iter].value;
  }
  return [sum, invalidData];
}

function removeLeadingZero() {
  const allInput = document.querySelectorAll("#table-form th > input");
  for (const iter = 0; iter < allInput.length; iter++) {
    allInput[iter].value = +allInput[iter].value;
  }
}

function callError(id) {
  const element = document.getElementById(id);
  if (element.classList.contains("popup-error")) {
    const newOne = element.cloneNode(true);
    element.parentNode.replaceChild(newOne, element);
  } else {
    element.classList.toggle("popup-error");
  }
}

function formCheck() {
  if (!radioChecked("org")) {
    callError("org-error");
    return false;
  }

  if (!radioChecked("work")) {
    callError("work-error");
    return false;
  }

  const [sum, invalidData] = validateInput();

  updateBrownFunction();
  updateWhiteFunction();
  updateColorFunction();

  if (sum === 0 && invalidData === false) {
    callError("blank-paper-error");
    return false;
  }

  if (invalidData) {
    callError("invalid-paper-error");
    return false;
  }

  removeLeadingZero();

  return true;
}

function openPDF() {
  window.open("/Report");
  const elementList = document.getElementsByClassName("pdf-layout");
  for (const i = 0; i < elementList.length; i++)
    elementList[i].parentNode.removeChild(elementList[i]);
}
