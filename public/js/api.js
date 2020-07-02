const API = {
    sendRequest: function (postURL, postData, callback) {
        var xhr = new XMLHttpRequest();

        loader.onLoad();
        xhr.onload = function () {
            loader.loadFinished();
            if (this.status === 200) {
                callback(this);
            }
        };

        xhr.open("POST", postURL);
        xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded;charset=utf-8"
        );
        xhr.send(postData);
    },
    sendFormRequest: function (postURL, formID, callback) {
        var xhr = new XMLHttpRequest();

        loader.onLoad();
        xhr.onload = function () {
            loader.loadFinished();
            if (this.status === 200) {
                callback(this);
            }
        };
        xhr.open("POST", postURL);
        xhr.send(new FormData(document.getElementById(formID)));
    },
    sendJSONRequest: function (postURL, jsonObj, callback) {
        var xhr = new XMLHttpRequest();

        loader.onLoad();
        xhr.onload = function () {
            loader.loadFinished();
            if (this.status === 200) {
                callback(this);
            }
        };
        xhr.open("POST", postURL);
        xhr.setRequestHeader("Content-Type", "application/json;charset=utf-8");
        xhr.send(JSON.stringify(jsonObj));
    },
};
