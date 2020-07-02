const loader = (function () {
  function onLoad() {
    const loading = document.createElement("div");
    loading.innerHTML = `<img src="/img/loading.svg"></img>`;
    loading.classList = "d-flex-cc loading";
    document.body.appendChild(loading);
  }
  function loadFinished() {
    const node = document.querySelector(".loading");
    if (node) node.remove();
  }

  return {
    onLoad,
    loadFinished,
  };
})();
