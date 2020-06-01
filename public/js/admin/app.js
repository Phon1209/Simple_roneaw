// Handle User/Org Tab
document
  .querySelector(".admin-container .tab-control")
  .addEventListener("click", (e) => {
    if (e.target.classList.contains("tab")) {
      document.querySelectorAll(".tab-control h4").forEach((elem) => {
        elem.classList.toggle("checked");
      });

      // Change UI
      if (e.target.getAttribute("aria-label") === "User") UI.setupUserList();
      else UI.setupOrgsList();
    }
  });

// Modal Button Event Listener

addUserBtn.addEventListener("click", () => {
  UI.showModal("addUserPopup");
});

filterBtn.addEventListener("click", () => {
  UI.showModal("filterPopup");
});

// Actual APP

UI.setupUserList();
