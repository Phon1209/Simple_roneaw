class API {
  static sendRequest(postURL, postData, callback) {
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
      if (this.status === 200) {
        callback(this);
      }
    };

    xhr.open("POST", postURL, false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
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
}
