const historyCtl = (function () {
  const _filter = {
    User: "",
    Display: "",
    Organize: [],
    WorkType: [],
    SortAsc: 1,
    OrderBy: 1,
  };
  const dataBind = {
    User: $("#usrFilter"),
    Display: $("#displayNameFilter"),
    Organize: $s("input[name='organizationFilter']"),
    WorkType: $s("input[name='workTypeFilter']"),
  };

  function editFilter(key, bind, multi) {
    if (multi) {
      _filter[key].splice(0, _filter[key].length);
      let empty = true;
      bind.forEach((elem) => {
        if (elem.checked) _filter[key].push(+elem.value), (empty = false);
      });
      if (empty) {
        bind.forEach((elem) => {
          _filter[key].push(+elem.value);
        });
      }
    } else {
      if (bind.nodeName === "DIV") {
        _filter[key] = +bind.getAttribute("value");
      } else _filter[key] = bind.value;
    }
  }

  function updateFilter() {
    editFilter("User", dataBind.User, false);
    editFilter("Display", dataBind.Display, false);
    editFilter("Organize", dataBind.Organize, true);
    editFilter("WorkType", dataBind.WorkType, true);
  }

  const labelToProp = {
    dropdownSortBy: "OrderBy",
    dropdownSortOrder: "SortAsc",
  };

  $s(".dropdown-item").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();
      dropdownCtl.selectMenu(
        e.target.parentNode.getAttribute("aria-labelledby"),
        e.target.textContent
      );
      const label = e.target.parentNode.getAttribute("aria-labelledby");
      editFilter(labelToProp[label], $(`#${label}`).parentNode, false);
      getPageData();
    });
  });

  const filterBtn = document.querySelector("#historyFilterBtn");
  filterBtn.addEventListener("click", openFilterModal);
  document.querySelector(".modal-dismiss").addEventListener("click", (e) => {
    UI.closeModal(e.target.parentNode.id);
    updateFilter();
    getPageData();
  });

  function openFilterModal() {
    UI.showModal("historyFilter");
  }

  function clearHistory() {
    $s("#history-collection .body").forEach((elem) => {
      elem.remove();
    });
  }

  const historyCollection = $("#history-collection");
  function addHistory(data) {
    const newNode = createNodesByHTML(`
    <div class="body d-flex-cc">${data.id}</div>
    <div class="body">${data.Username}</div>
    <div class="body">${data.DisplayName}</div>
    <div class="body">${data.OrganizationName}</div>
    <div class="body text-center">${data.WorkType}</div>
    <div class="body paper-grid text-center">
      <div class="bg-brown">${data.BrownPaper}</div>
      <div class="bg-white">${data.WhitePaper}</div>
      <div class="bg-pink">${data.ColorPaper}</div>
    </div>
    <div class="body text-center">
      ${data.Time}
    </div>
    `);
    appendChildren(historyCollection, newNode);
  }

  const pageData = {
    max: 0,
    current: 1,
  };
  const pageControl = $("#history-page-control");
  function updatePageControl(currentPage, maxPage) {
    const pageNumberShowed = new Array();

    for (let i = 1; i <= 2; i++)
      if (i <= maxPage && i >= 1) pageNumberShowed.push(i);
    for (let i = currentPage - 2; i <= currentPage + 2; i++)
      if (i <= maxPage && i >= 1) pageNumberShowed.push(i);
    for (let i = maxPage - 1; i <= maxPage; i++)
      if (i <= maxPage && i >= 1) pageNumberShowed.push(i);

    pageNumberShowed.sort((x, y) => x - y);

    removeChildren(pageControl);

    let lastPageNumber = 0;

    const paginationTemplate = (title, state, page) => {
      if (state === "disable")
        return `<span class="disable p-1">${title}</span>`;
      else if (state === "current")
        return `<em class="current p-1">${title}</em>`;
      else if (state === "warp")
        return `
        <span class="warp">
          ${title}
          <div class="warp-content p-1 round">
            Page: <input type="number" class="round"/>
          </div>
        </span>`;
      return `<a href="#user-collection" page="${page}" class="p-1">${title}</a>`;
    };

    pageControl.appendChild(
      createNodeByHTML(
        paginationTemplate(
          "Previous",
          currentPage <= 1 ? "disable" : "",
          currentPage - 1
        )
      )
    );
    pageNumberShowed.forEach((pageNumber) => {
      if (pageNumber - lastPageNumber === 1) {
        pageControl.appendChild(
          createNodeByHTML(
            paginationTemplate(
              pageNumber,
              pageNumber === currentPage ? "current" : "",
              pageNumber
            )
          )
        );
      } else if (pageNumber !== lastPageNumber) {
        pageControl.appendChild(
          createNodeByHTML(paginationTemplate("...", "warp"))
        );
      }
      lastPageNumber = pageNumber;
    });
    pageControl.appendChild(
      createNodeByHTML(
        paginationTemplate(
          "Next",
          currentPage >= maxPage ? "disable" : "",
          currentPage + 1
        )
      )
    );
  }
  pageControl.addEventListener("click", function (e) {
    if (!e.target.hasAttribute("page")) return;
    const targetPage = e.target.getAttribute("page");
    if (+targetPage === pageData.current) return;
    if (targetPage === "0") return;
    requestPage(+targetPage);
  });

  pageControl.addEventListener("keydown", (e) => {
    if (
      e.target.parentNode.classList.contains("warp-content") &&
      e.key === "Enter"
    ) {
      const targetPage = +e.target.value;
      requestPage(targetPage);
    }
  });

  function requestPage(page) {
    clearHistory();
    if (page <= pageData.max && page >= 1) {
      pageData.current = page;
      const data = JSON.parse(JSON.stringify(_filter));
      data._token = token;
      data.Page = pageData.current;
      API.sendJSONRequest("/admin/getHistory", data, function (xhr) {
        JSON.parse(xhr.responseText).forEach(function (historyData) {
          addHistory(historyData);
        });
        updatePageControl(page, pageData.max);
      });
    } else {
      UI.showAlert(`ไม่พบหน้า ${page}`, "alert alert-warning");
    }
  }

  function getPageData() {
    pageData.current = 1;
    const data = JSON.parse(JSON.stringify(_filter));
    data._token = token;
    API.sendJSONRequest("/admin/getHistoryMaxPage", data, function (xhr) {
      pageData.max = parseInt(JSON.parse(xhr.responseText));
      updatePageControl(pageData.current, pageData.max);
      if (pageData.max === 0) {
        clearHistory();
        const newNode = createNodesByHTML(`
          <div class="no-data body d-flex-cc">No Data</div>
          `);
          appendChildren(historyCollection, newNode);
      }
      else {
        requestPage(1);
      }
    });
  }

  function deleteHistory() {
    API.sendRequest("/admin/clearHistory",`_token=${token}`,function(xhr){
      getPageData();
    });
  }

  updateFilter();
  getPageData();

  return {
    filterOpt: _filter,
    clearHistory,
    addHistory,
    getHistory: getPageData,
    deleteHistory,
  };
})();

$("#deleteHistoryBtn").addEventListener("click", (e) => {
  UI.showModal("confirmClearHistory");
});
$("#confirmClearHistory .btn-control .cancel-btn").addEventListener(
  "click",
  (e) => {
    UI.closeModal(e.target.getAttribute("aria-labelled-by"));
  }
);
$("#confirmClearHistory .btn-control .confirm-btn").addEventListener(
  "click",
  (e) => {
    historyCtl.deleteHistory();
    UI.closeModal(e.target.getAttribute("aria-labelled-by"));
  }
);
