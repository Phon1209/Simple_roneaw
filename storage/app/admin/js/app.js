document
  .querySelector(".admin-container .tab-control")
  .addEventListener("click", (e) => {
    if (e.target.classList.contains("tab")) {
      document.querySelectorAll(".tab-control h4").forEach((elem) => {
        elem.classList.remove("checked");
      });
      e.target.classList.add("checked");

      if (e.target.getAttribute("aria-label") === "User") UI.setupUserList();
      else UI.setupOrgsList();
    }
  });

addUserBtn.addEventListener("click", () => {
  UI.showModal("addUserPopup");
});

filterBtn.addEventListener("click", () => {
  UI.showModal("filterPopup");
});

UI.setupUserList();
