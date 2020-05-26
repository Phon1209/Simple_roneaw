<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link
      rel="stylesheet"
      href="css/mobile.css"
    />
    <title>Admin</title>
  </head>
  <body>
    @include('component/sidebar',['current'=>'โหมดผู้ดูแลระบบ'])
    <div class="modal-collection">
      <div class="modal" id="resultPopup">
        <div class="modal-dismiss">&times;</div>
        <div id="result"></div>
      </div>
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
          <h4>User List</h4>
          <div class="btn-control">
            <input type="button" id="addUserBtn" class="btn" value="Add User">
            <input type="button" value="Filter" class="btn" id="filterBtn">
          </div>
        </header>
        <!-- <table id="userTable">
          <thead>
            <tr>
              <th rowspan="2">id</th>
              <th rowspan="2">Username</th>
              <th rowspan="2">Rank</th>
              <th rowspan="2">Display Name</th>
              <th rowspan="2">Organization List</th>
              <th colspan="3">Paper Use</th>
              <th rowspan="2">Edit User</th>
              <th rowspan="2">Delete User</th>
              <th rowspan="2">Paper Report</th>
            </tr>
            <tr>
              <th>Brown</th>
              <th>White</th>
              <th>Color</th>
            </tr>
          </thead>
          <tbody id="user-collection">
          </tbody>
        </table> -->
        <div id="user-collection">
          <div class="title">General</div>
          <div class="title">Organization List</div>
          <div class="title">Paper</div>
          <div class="title">Panel</div>
        </div>
      </div>
    </div>
    <script src="js/admin/ui.js"></script>
    <!-- <script src="js/admin/app.js"></script> -->
    <script src="js/admin/api.js"></script>
  </body>
  <script type="text/javascript">


    var userDataList;
    var organizationList={!!json_encode($organizationList)!!};
    var rankList={!!json_encode($rankList)!!};

    var result=document.getElementById("result");

    var addUserBtn=document.getElementById("addUserBtn");
    var modalAddUser=document.getElementById("modal-addUser");
    var btnEditUser=document.getElementById("btnEditUser");
    var filterBtn=document.getElementById("filterBtn");
    var btnFilterPopupClose=document.getElementById("btnFilterPopupClose");

    var addUserForm=document.getElementById("addUserForm");
    var addUserForm_usr=document.getElementById("addUserForm_usr");

    var editUserFormAllowChangePassword=document.getElementById("editUserFormAllowChangePassword");
    var editUserForm_usr=document.getElementById("editUserForm_usr");
    var editUserForm_pwd=document.getElementById("editUserForm_pwd");
    var editUserForm_displayname=document.getElementById("editUserForm_displayname");

    var confirmDeleteUserName=document.getElementById("confirmDeleteUserName");
    var confirmDeleteUser_Confirm=document.getElementById("confirmDeleteUser_Confirm");

    var filterForm=document.getElementById("filterForm");

    var userListDiv=document.getElementById("userListDiv");

    const closeScreenNode = document.querySelectorAll(".modal-dismiss");
    closeScreenNode.forEach(node => {
      node.onclick = closePopup;
    });

    class userManager {
      static deleteUser(usr) {
        API.sendRequest(
          "/admin/deleteUser",
          "_token={{csrf_token()}}&usr=" + usr,
          function (xhr) {
            if (xhr.responseText == "true") {
              UI.showAlert(`Complete Delete User ${usr}`,"alert alert-success");
              userManager.updateUserCollection();
            } else if (xhr.responseText == "false") {
              UI.showAlert(`Delete User ${usr} Failed`);
            }
            UI.closePopup("confirmDeleteUserPopup");
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

        showPopup("editUserPopup");
        userManager.updateUserCollection();
      }

      static updateUserCollection()
      {
        API.sendRequest("/admin/getUserDataList",
        "_token={{csrf_token()}}",
        function(xhr){
          userDataList=JSON.parse(xhr.responseText);
        });
        UI.resetForm("filterForm");
        userManager.updateUserListTable();
      }

      static updateUserListTable()
      {
        const userCollection = document.getElementById("user-collection");
        document.querySelectorAll('#user-collection .userData').forEach(elem => {
          elem.remove();
        })
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
        
        userDataList.forEach(user => { 
          if(user.Username.includes(Filter.user) && 
            (Filter.rank.includes(user.Rank) || Filter.rank.length === 0) &&
            (user.DisplayName.includes(Filter.displayName)) &&
            (Filter.organization.some(org => user.OrganizationIDList.includes(org)) || Filter.organization.length === 0)){
            
            let OrgList = "";
            user['OrganizationIDList'].forEach(function(value,key){
              OrgList += `${key+1}) ${organizationList[value]}<br>`;
            });

            // const userData = document.createElement("tr");

            // let outputUserData = `
            //   <td>${leadZero(user['id'])}</td>
            //   <td>${user['Username']}</td>
            //   <td>${rankList[user['Rank']]}</td>
            //   <td>${user['DisplayName']}</td>
            //   <td>${OrgList}</td>
            //   <td>${user['BrownPaper']}</td>
            //   <td>${user['WhitePaper']}</td>
            //   <td>${user['ColorPaper']}</td>
            //   <td><i username="${user['Username']}" class="fas fa-user-edit fa-2x edit"></i></td>
            //   <td><i username="${user['Username']}" class="fas fa-trash-alt fa-2x delete"></i></td>
            //   <td><i username="${user['Username']}" class="fas fa-clipboard-list fa-2x print"></i></td>
            // `;

            // userData.innerHTML = outputUserData;
            // userCollection.appendChild(userData);

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
        });
      }
    }
    function leadZero(num) {
      const s = "00000" + (+num);
      return s.substr(s.length-5);
    }
    function popupPrepare()
    {
      document.querySelector(".modal-collection").style.display="block";
      var transparentscreencontentclasslist=document.getElementsByClassName("modal");

      for(var i=0;i<transparentscreencontentclasslist.length;i++)
      {
        transparentscreencontentclasslist[i].style.display="none";
      }
    }

    function showPopup(id)
    {
      popupPrepare();
      document.getElementById(id).style.display="flex";
    }

    function closePopup()
    {
      document.querySelector(".modal-collection").style.display="none";
    }

    function confirmDeleteUser(usr)
    {
      confirmDeleteUserName.innerHTML=usr;
      confirmDeleteUser_Confirm.setAttribute("onclick","userManager.deleteUser(\""+usr+"\")");
      showPopup("confirmDeleteUserPopup");
    }

    addUserBtn.addEventListener("click",() => {
      showPopup("addUserPopup");
    });

    modalAddUser.onclick=function()
    {
      API.sendFormRequest("/admin/addUser",
      "addUserForm",
      function(xhr){
        if (xhr.responseText === "true")
        {
          UI.showAlert(`Complete Add User ${addUserForm_usr.value}`,'alert alert-success')
          userManager.updateUserCollection();
        }
        else if (xhr.responseText === "false")
        {
          UI.showAlert(`Add User Failed`,'alert alert-danger');
        }
        UI.resetForm("addUserForm");
        UI.closePopup("addUserPopup");
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
          UI.showAlert(`Complete Edit User ${editUserForm_usr.value}`,"alert alert-success")
          userManager.updateUserCollection();
        }
        else if (xhr.responseText=="false")
        {
          UI.showAlert(`Edit User ${editUserForm_usr.value} Failed...`,"alert alert-danger");
        }
        UI.resetForm("editUserForm");
        UI.closePopup("editUserPopup");
      });
      editUserForm_usr.disabled=true;
    };

    editUserFormAllowChangePassword.onchange=function()
    {
      editUserForm_pwd.value="";
      editUserForm_pwd.disabled=!editUserFormAllowChangePassword.checked;
    };

    filterBtn.addEventListener('click',() => {
      showPopup("filterPopup");
    });

    btnFilterPopupClose.onclick=function(){
      userManager.updateUserListTable();
      closePopup();
    };

    document.body.addEventListener("click",(e) => {
      if(e.target.nodeName !== "I")return;
      if(e.target.classList.contains("edit")){
        userManager.editUser(e.target.parentNode.getAttribute("username"));
      }
      if(e.target.classList.contains("delete")) {
        confirmDeleteUser(e.target.parentNode.getAttribute("username"));
      }
    })

    userManager.updateUserCollection();
  </script>
  <script src="js/admin/app.js"></script>
</html>