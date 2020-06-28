function createNodeByHTML(text) {
  const template = document.createElement("div");
  template.innerHTML = text;
  return template.firstElementChild;
}

function createNodesByHTML(text) {
  const template = document.createElement("div");
  template.innerHTML = text;
  return template.childNodes;
}

function appendChildren(Parent, nodeList) {
  nodeList.forEach((elem) => {
    if (elem.nodeType === 1) Parent.appendChild(elem);
  });
}

function leadZero(num) {
  const s = "00000" + +num;
  return s.substr(s.length - 5);
}

function $(text) {
  return document.querySelector(text);
}

function $s(text) {
  return document.querySelectorAll(text);
}

function removeChildren(node) {
  while (node.firstChild) {
    node.removeChild(node.firstChild);
  }
}
