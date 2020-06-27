class API {
  static sendRequest(postURL, postData, callback) {
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
      if (this.status === 200) {
        callback(this);
      }
    };

    xhr.open("POST", postURL, false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    xhr.send(postData);
  }

  static sendFormRequest(postURL, formID, callback) {
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
      if (this.status === 200) {
        callback(this);
      }
    };
    xhr.open("POST", postURL, false);
    xhr.send(new FormData(document.getElementById(formID)));
  }

  static sendJSONRequest(postURL, jsonObj, callback) {
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
      if (this.status === 200) {
        callback(this);
      }
    };
    xhr.open("POST", postURL, false);
    xhr.setRequestHeader("Content-Type", "application/json;charset=utf-8");
    xhr.send(JSON.stringify(jsonObj));
  }
}
