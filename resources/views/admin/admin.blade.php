<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link
      rel="stylesheet"
      href="/css/mobile.css"
    />
    <title>Admin</title>
  </head>
  <body class="bg_sk">
    @include('component/sidebar',['current'=>'โหมดผู้ดูแลระบบ'])
    <div class="modal-collection">
      <div class="modal" id="addUserPopup">
        <div class="modal-dismiss">&times;</div>
        <div>
          <h3>Add User</h3>
          <form action="/admin/addUser" method="post" id="addUserForm">
              @csrf

              <div class="form-group">
                <label for="addUserForm_usr">Username: </label>
                <input type="text" name="usr" id="addUserForm_usr" placeholder="Eg. User">
              </div>
              <div class="form-group">
                <label for="add-password">Password: </label>
                <input type="password" id="add-password" name="pwd">
              </div>
              <div class="form-group form-multi">
                <div class="form-title">
                  <h5>Rank:</h5>
                </div>
                <div class="form-multi-body">
                  @foreach($rankList as $rankID => $rankName)
                  <div class="sub-form-group">
                    <input type="radio" name="rank" id="add-rank{{$rankID}}" value="{{$rankID}}">
                    <label for="add-rank{{$rankID}}">{{$rankName}}</label>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="form-group">
                <label for="add-display-name">Display Name:</label>
                <input type="text" id="add-display-name" name="displayname" placeholder="Eg. อธิษฐาน บัวเทพ">
              </div>
              <div class="form-group form-multi form-grid">
                <div class="form-title">
                  <h5>Organization List:</h5>
                </div>
                <div class="form-multi-body form-grid-body">
                  @foreach($organizationList as $organizationID => $organizationName)
                  <div class="sub-form-group">
                    <input type="checkbox" name="organization[]" id="add-org{{$organizationID}}" value="{{$organizationID}}">
                    <label for="add-org{{$organizationID}}">{{$organizationName}}</label>
                  </div>
                  @endforeach
                </div>
              </div>

              <button type="button" name="button" class="btn btn-block" id="modal-addUser">Add User</button>
          </form>
        </div>
      </div>
      <div class="modal" id="editUserPopup">
        <div class="modal-dismiss">&times;</div>
        <div>
          <h3>Edit User</h3>
          <form action="/admin/editUser" method="post" id="editUserForm">
              @csrf

              <div class="form-group">
                <label for="editUserForm_usr">Username: </label>
                <input type="text" name="usr" id="editUserForm_usr" disabled>
              </div>
              <div class="form-group form-ext">
                <label for="editUserForm_pwd">Password: </label>
                <input type="password" name="pwd" id="editUserForm_pwd" disabled>
                <input type="checkbox" class="toggler" id="editUserFormAllowChangePassword">
                <label for="editUserFormAllowChangePassword">Change Password</label>
              </div>
              <div class="form-group form-multi">
                <div class="form-title">
                  <h5>Rank:</h5>
                </div>
                <div class="form-multi-body">
                  @foreach($rankList as $rankID => $rankName)
                  <div class="sub-form-group">
                    <input class="editUserForm_rank" type="radio" name="rank" id="edit-rank{{$rankID}}" value="{{$rankID}}">
                    <label for="edit-rank{{$rankID}}">{{$rankName}}</label>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="form-group">
                <label for="editUserForm_displayname">Display Name:</label>
                <input type="text" name="displayname" id="editUserForm_displayname">
              </div>
              <div class="form-group form-multi form-grid">
                <div class="form-title">
                  <h5>Organization List:</h5>
                </div>
                <div class="form-multi-body form-grid-body">
                  @foreach($organizationList as $organizationID => $organizationName)
                  <div class="sub-form-group">
                    <input class="editUserForm_organization" id="edit-org{{$organizationID}}" type="checkbox" name="organization[]" value="{{$organizationID}}">
                    <label for="edit-org{{$organizationID}}">{{$organizationName}}</label>
                  </div>
                  @endforeach
                </div>
              </div>

              <button type="button" name="button" class="btn btn-block" id="btnEditUser">Edit User</button>
          </form>
        </div>
      </div>
      <div class="modal" id="confirmDeleteUserPopup">
        <div class="modal-dismiss">&times;</div>
        <div id="confirmDeleteUserDiv">
          Confirm Delete User <span style="color:red;font-weight:bold" id="confirmDeleteUserName"></span>?
          <input type="button" value="Yes" id="confirmDeleteUser_Confirm">
        </div>
      </div>
      <div class="modal" id="filterPopup">
        <div class="modal-dismiss" id="btnFilterPopupClose">&times;</div>
        <div>
          <h3>Filter</h3>
          <form id="filterForm">
            <div class="form-group">
              <label for="usrFilter">Username: </label>
              <input type="text" id="usrFilter">
            </div>
            <div class="form-group form-multi">
              <div class="form-title">
                <h5>Rank:</h5>
              </div>
              <div class="form-multi-body">
                @foreach($rankList as $rankID => $rankName)
                <div class="sub-form-group">
                  <input type="checkbox" name="rankFilter" id="filter-rank{{$rankID}}" value="{{$rankID}}">
                  <label for="filter-rank{{$rankID}}">{{$rankName}}</label>
                </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              <label for="displayNameFilter">Display Name:</label>
              <input type="text" id="displayNameFilter">
            </div>
            <div class="form-group form-multi form-grid">
              <div class="form-title">
                <h5>Organization List:</h5>
              </div>
              <div class="form-multi-body form-grid-body">
                @foreach($organizationList as $organizationID => $organizationName)
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-org{{$organizationID}}" name="organizationFilter" value="{{$organizationID}}">
                  <label for="filter-org{{$organizationID}}">{{$organizationName}}</label>
                </div>
                @endforeach
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="alert-collection"></div>

    <div class="container admin-container">
      <h2>Welcome Admin</h2>
      <div class="table-content">
        <header class="table-heading">
          <div class="tab-control">
            <h4 class="checked tab" aria-label="User">User List</h4>
            <h4 class="tab" aria-label="Organization">Organization List</h4>
          </div>
          <div class="btn-control">
            <div id="addUserBtn" class="btn"><i class="fas fa-user-plus"></i> Add User</div>
            <div id="filterBtn" class="btn"><i class="fas fa-filter"></i> Filter</div>
          </div>
        </header>
        <section>
          <div id="user-collection" class="py-2">
            <div class="title">General</div>
            <div class="title">Organization List</div>
            <div class="title">Paper</div>
            <div class="title">Panel</div>
          </div>
          <div id="user-page-control" class="page-control py-2 child-round"></div>
        </section>
      </div>
    </div>
    <script src="/admin/js/ui.js"></script>
    <script src="/admin/js/api.js"></script>
    <script src="/_admin/js/utilities.js"></script>
  </body>
  <script type="text/javascript">
    const token = "{{csrf_token()}}";

    let userDataList;
    const organizationList={!!json_encode($organizationList)!!};
    const rankList={!!json_encode($rankList)!!};

    const addUserBtn=document.getElementById("addUserBtn");
    const modalAddUser=document.getElementById("modal-addUser");
    const btnEditUser=document.getElementById("btnEditUser");
    const filterBtn=document.getElementById("filterBtn");
    const btnFilterPopupClose=document.getElementById("btnFilterPopupClose");

    const addUserForm=document.getElementById("addUserForm");
    const addUserForm_usr=document.getElementById("addUserForm_usr");

    const editUserFormAllowChangePassword=document.getElementById("editUserFormAllowChangePassword");
    const editUserForm_usr=document.getElementById("editUserForm_usr");
    const editUserForm_pwd=document.getElementById("editUserForm_pwd");
    const editUserForm_displayname=document.getElementById("editUserForm_displayname");

    const confirmDeleteUserName=document.getElementById("confirmDeleteUserName");
    const confirmDeleteUser_Confirm=document.getElementById("confirmDeleteUser_Confirm");

    const filterForm=document.getElementById("filterForm");

    const userListDiv=document.getElementById("userListDiv");

    const closeScreenNode = document.querySelectorAll(".modal-dismiss");
    closeScreenNode.forEach(node => {
      node.addEventListener("click",e => {
        UI.closeModal(e.target.parentElement.id);
      });
    });

    class userManager {
      static deleteUser(usr) {
        API.sendRequest(
          "/admin/deleteUser",
          `_token=${token}&usr=` + usr,
          function (xhr) {
            if (xhr.responseText == "true") {
              UI.showAlert(`ลบผู้ใช้ ${usr} สำเร็จแล้ว`,"alert alert-success");
              userManager.updateUserCollection();
            } else if (xhr.responseText == "false") {
              UI.showAlert(`ลบผู้ใช้ ${usr} ไม่สำเร็จ`);
            }
            UI.closeModal("confirmDeleteUserPopup");
          }
        );
      }

      static editUser(usr)
      {
        const editUserData=userDataList.find(function(userData){
          return userData["Username"]===usr;
        });

        editUserForm_usr.value=editUserData["Username"];

        document.querySelector(`.editUserForm_rank[value="${parseInt(editUserData["Rank"])}"]`).checked = true;

        editUserForm_displayname.value=editUserData["DisplayName"];

        document.querySelectorAll(`.editUserForm_organization`).forEach(elem => {
          elem.checked = false;
        });
        editUserData["OrganizationIDList"].forEach(organizeIndex => {
          document.querySelector(`.editUserForm_organization[value="${organizeIndex}"]`).checked = true;
        });

        UI.showModal("editUserPopup");
        userManager.updateUserCollection();
      }

      static updateUserCollection()
      {
        API.sendRequest(
          "/admin/getUserDataList",
          `_token=${token}`,
          function (xhr) {
            userDataList=JSON.parse(xhr.responseText);
          }
        );
        UI.resetForm("filterForm");
        userManager.updateUserList();
      }

      static filteredUserList;
      static updateUserList()
      {
        const Filter = {
          user: document.getElementById("usrFilter").value,
          rank: [],
          displayName: document.getElementById("displayNameFilter").value,
          organization: [],
        }
        document.querySelectorAll(`input[name="rankFilter"]`).forEach(elem => {
          if(elem.checked) Filter.rank.push(+elem.value);
        })
        document.querySelectorAll(`input[name="organizationFilter"]`).forEach(elem => {
          if(elem.checked) Filter.organization.push(+elem.value);
        })

        this.filteredUserList = userDataList.filter(function(user) {
          return user.Username.includes(Filter.user) &&
                (Filter.rank.includes(user.Rank) || Filter.rank.length === 0) &&
                (user.DisplayName.includes(Filter.displayName)) &&
                (Filter.organization.some(org => user.OrganizationIDList.includes(org)) || Filter.organization.length === 0);
        });

        this.userTableData.page = 1;
        this.userTableData.totalPage = Math.ceil(this.filteredUserList.length / this.userTableData.limit);
        this.updateUserTable();
        this.updateUserControl();
      }

      static userTableData = {
        page: 1,
        limit: 10,
        // limit: 1,
        totalPage: 0,
      };

      static pageRequest(page) {
        if(page <= this.userTableData.totalPage && page >= 1) 
        {
          this.userTableData.page = page;
          this.updateUserTable();
          this.updateUserControl();
        }
        else {
          UI.showAlert(`ไม่พบหน้า ${page}`,"alert alert-warning");
        }
      }

      static updateUserTable() {
        const {page,limit} = this.userTableData;
        const userCollection = document.getElementById("user-collection");
        document.querySelectorAll('#user-collection .userData').forEach(elem => {
          elem.remove();
        });

        for(let i = (page - 1)*limit; i<(page*limit) ;i++) {
          if(i >= this.filteredUserList.length)break;

          const user = this.filteredUserList[i];
          let OrgList = "";
          user['OrganizationIDList'].forEach(function(value,key){
            OrgList += `${key+1}) ${organizationList[value]}<br>`;
          });

          let output = `
          <div class="userData">${leadZero(user['id'])}</div>
          <div class="userData">${OrgList}</div>
          <div class="userData">
            <div class="bg-brown w-100">${user['BrownPaper']}</div>
            <div class="bg-white w-100">${user['WhitePaper']}</div>
            <div class="bg-pink w-100">${user['ColorPaper']}</div>
          </div>
          <div class="userData" username="${user['Username']}">
            <i class="fas fa-user-edit edit"></i>
            <i class="fas fa-clipboard-list print"></i>
            <i class="fas fa-trash-alt delete"></i>
          </div>
          <div class="userData">${user['Username']}</div>
          <div class="userData">${rankList[user['Rank']]}</div>
          <div class="userData">${user['DisplayName']}</div>
          `

          userCollection.innerHTML += output;
        }
      }

      static updateUserControl() {
        const {page,limit,totalPage} = this.userTableData;
        const pageNumberShowed = new Array();
        const userPageControl = document.querySelector("#user-page-control");

        for(let i = 1;i <= 2 ; i++)
          if(i<=totalPage && i>=1)pageNumberShowed.push(i);
        for(let i = page - 2;i <= page+2; i++)
          if(i<=totalPage && i>=1)pageNumberShowed.push(i);
        for(let i = totalPage - 1;i <= totalPage; i++)
          if(i<=totalPage && i>=1)pageNumberShowed.push(i);

        pageNumberShowed.sort((x,y) => x-y);

        let lastPageNumber = 0;

        while(userPageControl.firstChild){
          userPageControl.removeChild(userPageControl.firstChild);
        }


        const paginationTemplate = (title,state,page) => {
          if(state === "disable")return `<span class="disable p-1">${title}</span>`
          else if(state === "current") return `<em class="current p-1">${title}</em>`
          else if(state === "warp") return `
            <span class="warp">
              ${title}
              <div class="warp-content p-1 round">
                Page: <input type="number" class="round"/>
              </div>
            </span>`
          return `<a href="#user-collection" page="${page}" class="p-1">${title}</a>`
        }

        userPageControl.innerHTML += paginationTemplate("Previous",(page===1)? "disable":"",page-1);
        pageNumberShowed.forEach(pageNumber => {
          if(pageNumber - lastPageNumber === 1) {
            userPageControl.innerHTML += paginationTemplate(pageNumber,(pageNumber === page)? "current":"",pageNumber);
          }
          else if(pageNumber !== lastPageNumber) {
            userPageControl.innerHTML += paginationTemplate("...","warp");
          }
          lastPageNumber = pageNumber;
        });
        userPageControl.innerHTML += paginationTemplate("Next",(page === totalPage)? "disable":"",page+1);
      }

      static updateOrgList() {
        const orgCollection = document.getElementById("org-collection");
        document.querySelectorAll('#org-collection .orgData').forEach(elem => {
          elem.remove();
        });
        document.querySelectorAll('#org-collection .orgSummary').forEach(elem => {
          elem.remove();
        });

        API.sendRequest(
          "/admin/getOrganizationDataList",
          `_token=${token}`,
          function (xhr) {
            const organizationDataList=JSON.parse(xhr.responseText);
            const paperSummary = {
              WorkType1BrownPaper:0,
              WorkType1WhitePaper:0,
              WorkType1ColorPaper:0,
              WorkType2BrownPaper:0,
              WorkType2WhitePaper:0,
              WorkType2ColorPaper:0,
              WorkType3BrownPaper:0,
              WorkType3WhitePaper:0,
              WorkType3ColorPaper:0,
              allPaper: function() {
                let output = 0;
                for(let paper in this) {
                  if(typeof this[paper] === "function") continue;
                  output += this[paper];
                }
                return output;
              }
            };

            organizationDataList.forEach((orgData,index) => {
              paperSummary['WorkType1BrownPaper']+=orgData['WorkType1BrownPaper'];
              paperSummary['WorkType1WhitePaper']+=orgData['WorkType1WhitePaper'];
              paperSummary['WorkType1ColorPaper']+=orgData['WorkType1ColorPaper'];
              paperSummary['WorkType2BrownPaper']+=orgData['WorkType2BrownPaper'];
              paperSummary['WorkType2WhitePaper']+=orgData['WorkType2WhitePaper'];
              paperSummary['WorkType2ColorPaper']+=orgData['WorkType2ColorPaper'];
              paperSummary['WorkType3BrownPaper']+=orgData['WorkType3BrownPaper'];
              paperSummary['WorkType3WhitePaper']+=orgData['WorkType3WhitePaper'];
              paperSummary['WorkType3ColorPaper']+=orgData['WorkType3ColorPaper'];

              const NodeList = createNodesByHTML(`
              <div class="orgData">${orgData['Name']}</div>
              <div class="orgData paper-grid">
                <div class="bg-brown">${orgData['WorkType1BrownPaper']}</div>
                <div class="bg-white">${orgData['WorkType1WhitePaper']}</div>
                <div class="bg-pink">${orgData['WorkType1ColorPaper']}</div>
                <div class="paper-summary">รวม: ${orgData['WorkType1BrownPaper']+orgData['WorkType1WhitePaper']+orgData['WorkType1ColorPaper']}</div>
              </div>
              <div class="orgData paper-grid">
                <div class="bg-brown">${orgData['WorkType2BrownPaper']}</div>
                <div class="bg-white">${orgData['WorkType2WhitePaper']}</div>
                <div class="bg-pink">${orgData['WorkType2ColorPaper']}</div>
                <div class="paper-summary">รวม: ${orgData['WorkType2BrownPaper']+orgData['WorkType2WhitePaper']+orgData['WorkType2ColorPaper']}</div>
              </div>
              <div class="orgData paper-grid">
                <div class="bg-brown">${orgData['WorkType3BrownPaper']}</div>
                <div class="bg-white">${orgData['WorkType3WhitePaper']}</div>
                <div class="bg-pink">${orgData['WorkType3ColorPaper']}</div>
                <div class="paper-summary">รวม: ${orgData['WorkType3BrownPaper']+orgData['WorkType3WhitePaper']+orgData['WorkType3ColorPaper']}</div>
              </div>
              <div class="orgData">${orgData['BrownPaperSummary']+orgData['WhitePaperSummary']+orgData['ColorPaperSummary']}</div>
              <div class="orgData"><i class="fas fa-clipboard-list" onclick=getOrgReport(${orgData['id']})></i></div>
              `);
              appendChildren(orgCollection,NodeList);
            });
            const NodeList = createNodesByHTML(`
              <div class="orgSummary">รวมทั้งหมด</div>
              <div class="orgSummary paper-grid">
                <div class="bg-brown">${paperSummary.WorkType1BrownPaper}</div>
                <div class="bg-white">${paperSummary['WorkType1WhitePaper']}</div>
                <div class="bg-pink">${paperSummary['WorkType1ColorPaper']}</div>
                <div class="paper-summary">รวม: ${paperSummary['WorkType1BrownPaper']+paperSummary['WorkType1WhitePaper']+paperSummary['WorkType1ColorPaper']}</div>
              </div>
              <div class="orgSummary paper-grid">
                <div class="bg-brown">${paperSummary['WorkType2BrownPaper']}</div>
                <div class="bg-white">${paperSummary['WorkType2WhitePaper']}</div>
                <div class="bg-pink">${paperSummary['WorkType2ColorPaper']}</div>
                <div class="paper-summary">รวม: ${paperSummary['WorkType2BrownPaper']+paperSummary['WorkType2WhitePaper']+paperSummary['WorkType2ColorPaper']}</div>
              </div>
              <div class="orgSummary paper-grid">
                <div class="bg-brown">${paperSummary['WorkType3BrownPaper']}</div>
                <div class="bg-white">${paperSummary['WorkType3WhitePaper']}</div>
                <div class="bg-pink">${paperSummary['WorkType3ColorPaper']}</div>
                <div class="paper-summary">รวม: ${paperSummary['WorkType3BrownPaper']+paperSummary['WorkType3WhitePaper']+paperSummary['WorkType3ColorPaper']}</div>
              </div>
              <div class="orgSummary">${paperSummary.allPaper()}</div>
              <div class="orgSummary"></div>
              `);
              appendChildren(orgCollection,NodeList);
          }
        );
      }
    }
    

    function confirmDeleteUser(usr)
    {
      confirmDeleteUserName.innerHTML=usr;
      confirmDeleteUser_Confirm.setAttribute("onclick","userManager.deleteUser(\""+usr+"\")");
      UI.showModal("confirmDeleteUserPopup");
    }

    function getOrgReport(id)
    {
      API.sendRequest(
        "/admin/getOrganizationReport",
        `_token=${token}&id=${id}`,
        function (xhr) {
          if (xhr.responseText == "true")
          {
            window.open("/admin/organizationReport");
          }
          else if (xhr.responseText == "false")
          {
            UI.showAlert("เกิดข้อผิดพลาด","alert alert-danger");
          }
        }
      );
    }

    modalAddUser.onclick=function()
    {
      API.sendFormRequest("/admin/addUser",
      "addUserForm",
      function(xhr){
        if (xhr.responseText === "true")
        {
          UI.showAlert(`เพิ่มผู้ใช้ ${addUserForm_usr.value} สำเร็จแล้ว!`,'alert alert-success')
          UI.resetForm("addUserForm");
          userManager.updateUserCollection();
        }
        else if (xhr.responseText === "false")
        {
          UI.showAlert(`เพิ่มผู้ใช้ไม่สำเร็จ`,'alert alert-danger');
        }
        UI.closeModal("addUserPopup");
      });
    };

    btnEditUser.onclick=function()
    {
      editUserForm_usr.disabled=false;
      API.sendFormRequest("/admin/editUser",
      "editUserForm",
      function(xhr){
        if (xhr.responseText=="true")
        {
          UI.showAlert(`แก้ไขผู้ใช้ ${editUserForm_usr.value} สำเร็จแล้ว`,"alert alert-success")
          userManager.updateUserCollection();
        }
        else if (xhr.responseText=="false")
        {
          UI.showAlert(`แก้ไขผู้ใช้ ${editUserForm_usr.value} ไม่สำเร็จ..`,"alert alert-danger");
        }
        UI.resetForm("editUserForm");
        UI.closeModal("editUserPopup");
      });
      editUserForm_usr.disabled=true;
    };

    editUserFormAllowChangePassword.onchange=function()
    {
      editUserForm_pwd.value="";
      editUserForm_pwd.disabled=!editUserFormAllowChangePassword.checked;
    };

    btnFilterPopupClose.onclick=function(){
      userManager.updateUserList();
    };

  </script>
  <script src="/admin/js/app.js"></script>
</html>
