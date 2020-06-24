class UI {
  static showModal(popupID) {
    document.querySelector(".modal-collection").style.display = "block";
    document.getElementById(popupID).style.display = "flex";
  }

  static closeModal(popupID) {
    document.querySelector(".modal-collection").style.display = "none";
    document.getElementById(popupID).style.display = "none";
  }

  static resetForm(id) {
    const elem = document.getElementById(id);
    if (elem.nodeName === "FORM") {
      elem.reset();
    }
  }

  static alertCollection = document.querySelector(".alert-collection");
  static showAlert(text, className) {
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
    this.alertCollection.appendChild(alert);

    setTimeout(this.removeAlert, 5000);
    // setTimeout(this.removeAlert, 10000000);
  }

  static removeAlert() {
    const node = document.querySelector(".alert");
    if (node) node.remove();
  }

  static removeLastContent() {
    const node = document.querySelector(
      ".admin-container .table-content section"
    );
    if (node) node.remove();
  }

  static setupUserList() {
    this.removeLastContent();
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

  static setupOrgsList() {
    this.removeLastContent();
    const Content = document.querySelector(".admin-container .table-content");

    const orgsContent = document.createElement("section");
    orgsContent.innerHTML = `
    <div id="org-collection" class="py-2">
      <div class="title text-center">หน่วยงาน</div>
      <div class="title text-center">เอกสารการสอน</div>
      <div class="title text-center">เอกสารทั่วไป</div>
      <div class="title text-center">ข้อสอบ</div>
      <div class="title text-center">รวม</div>
      
      <div class="orgData">กลุ่มสาระการเรียนรู้สังคมศึกษา ศาสนา และวัฒนธรรม</div>
      <div class="orgData paper-grid">
        <div class="bg-brown">1</div>
        <div class="bg-white">0</div>
        <div class="bg-pink">6</div>
        <div class="paper-summary">รวม: 7</div>
      </div>
      <div class="orgData paper-grid">
        <div class="bg-brown">2</div>
        <div class="bg-white">10</div>
        <div class="bg-pink">100</div>
        <div class="paper-summary">รวม: 112</div>
      </div>
      <div class="orgData paper-grid">
        <div class="bg-brown">7</div>
        <div class="bg-white">7</div>
        <div class="bg-pink">7</div>
        <div class="paper-summary">รวม: 21</div>
      </div>
      <div class="orgData">140</div>

      <div class="orgSummary">รวมทั้งหมด</div>
      <div class="orgSummary paper-grid">
        <div class="bg-brown">333333</div>
        <div class="bg-white">333333</div>
        <div class="bg-pink">333333</div>
        <div class="paper-summary">รวม: 999999</div>
      </div>
      <div class="orgSummary paper-grid">
        <div class="bg-brown">333333</div>
        <div class="bg-white">333333</div>
        <div class="bg-pink">333333</div>
        <div class="paper-summary">รวม: 999999</div>
      </div>
      <div class="orgSummary paper-grid">
        <div class="bg-brown">333333</div>
        <div class="bg-white">333333</div>
        <div class="bg-pink">333333</div>
        <div class="paper-summary">รวม: 999999</div>
      </div>
      <div class="orgSummary">2999907</div>
    </div>
    `;

    Content.appendChild(orgsContent);
  }
}
