class UI {
  static result = document.getElementById("result");
  static setResult(text) {
    this.result.innerHTML = text;
  }

  static showResult(text) {
    this.setResult(text);
    this.showPopup("resultPopup");
  }

  static showPopup(popupID) {
    document.getElementById(popupID).style.display = "block";
  }

  static closePopup(popupID) {
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
  }

  static removeAlert() {
    const node = document.querySelector(".alert");
    if (node) node.remove();
  }
}

/*
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
*/
