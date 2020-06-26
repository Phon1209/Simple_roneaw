const UI = (function () {
  function showModal(popupID) {
    document.querySelector(".modal-collection").style.display = "block";
    document.getElementById(popupID).style.display = "flex";
  }

  function closeModal(popupID) {
    document.querySelector(".modal-collection").style.display = "none";
    document.getElementById(popupID).style.display = "none";
  }

  function resetForm(id) {
    const elem = document.getElementById(id);
    if (elem.nodeName === "FORM") {
      elem.reset();
    }
  }

  const alertCollection = document.querySelector(".alert-collection");
  function showAlert(text, className) {
    const alert = document.createElement("div");
    alert.className = className;
    let icon;

    if (className.includes("success"))
      icon = `<i class="fas fa-check-circle"></i>`;
    if (className.includes("warning"))
      icon = `<i class="fas fa-exclamation-triangle"></i>`;
    if (className.includes("danger"))
      icon = `<i class="fas fa-times-circle"></i>`;

    alert.innerHTML = `${icon} ${text}`;
    alertCollection.appendChild(alert);

    setTimeout(removeAlert, 5000);
  }

  function removeAlert() {
    const node = document.querySelector(".alert");
    if (node) node.remove();
  }

  function removeLastContent() {
    const node = document.querySelector(
      ".admin-container .table-content section"
    );
    if (node) node.remove();
  }

  function setupUserList() {
    removeLastContent();
    const Content = document.querySelector(".admin-container .table-content");

    const userContent = document.createElement("section");
    userContent.innerHTML = `
    <div id="user-collection" class="py-2">
      <div class="title">ทั่วไป</div>
      <div class="title">หน่วยงาน</div>
      <div class="title">กระดาษที่ใช้</div>
      <div class="title">แผงควบคุม</div>
    </div>
    <div id="user-page-control" class="py-2 child-round"></div>`;

    Content.appendChild(userContent);
    userManager.updateUserCollection();

    // Handle Edit Delete Report Button
    document
      .querySelector("#user-collection")
      .addEventListener("click", (e) => {
        if (e.target.nodeName !== "I") return;
        if (e.target.classList.contains("edit")) {
          userManager.editUser(e.target.parentNode.getAttribute("username"));
        }
        if (e.target.classList.contains("delete")) {
          confirmDeleteUser(e.target.parentNode.getAttribute("username"));
        }
      });

    // Handle Page Control Button
    document
      .querySelector("#user-page-control")
      .addEventListener("click", function (e) {
        if (!e.target.hasAttribute("page")) return;
        const targetPage = e.target.getAttribute("page");
        if (+targetPage === userManager.userTableData.page) return;
        if (targetPage === "0") return;
        userManager.pageRequest(+targetPage);
      });

    document
      .querySelector("#user-page-control")
      .addEventListener("keydown", (e) => {
        if (
          e.target.parentNode.classList.contains("warp-content") &&
          e.key === "Enter"
        ) {
          const targetPage = +e.target.value;
          userManager.pageRequest(targetPage);
        }
      });
  }

  function setupOrgsList() {
    removeLastContent();
    const Content = document.querySelector(".admin-container .table-content");

    const orgsContent = document.createElement("section");
    orgsContent.innerHTML = `
    <div id="org-collection" class="py-2">
      <div class="title text-center">หน่วยงาน</div>
      <div class="title text-center">เอกสารการสอน</div>
      <div class="title text-center">เอกสารทั่วไป</div>
      <div class="title text-center">ข้อสอบ</div>
      <div class="title text-center">รวม</div>
      <div class="title text-center">รายงาน</div>
    </div>
    `;

    Content.appendChild(orgsContent);
    userManager.updateOrgList();
  }

  return {
    showModal,
    closeModal,
    resetForm,
    showAlert,
    setupUserList,
    setupOrgsList,
  };
})();
