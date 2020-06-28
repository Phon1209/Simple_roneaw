const dropdownCtl = (function () {
  const _value = {
    น้อยไปมาก: 1,
    มากไปน้อย: 0,
    เวลา: 1,
    ชื่อผู้ใช้: 2,
    ชื่อ: 3,
    กระดาษน้ำตาล: 4,
    กระดาษขาว: 5,
    กระดาษสี: 6,
  };

  function updateHeading(label, text) {
    const button = document.getElementById(label);
    button.textContent = text;
    button.parentNode.setAttribute(
      "value",
      _value[text] !== undefined ? _value[text] : 1
    );
    toggleMenu(label);
  }
  function toggleMenu(label) {
    document
      .querySelector(`[aria-labelledby="${label}"]`)
      .classList.toggle("show");
  }

  return {
    toggleMenu,
    selectMenu: updateHeading,
  };
})();

document.body.addEventListener("click", (e) => {
  if (e.target.classList.contains("dropdown-toggle")) {
    e.preventDefault();
    dropdownCtl.toggleMenu(e.target.id);
  }
});
