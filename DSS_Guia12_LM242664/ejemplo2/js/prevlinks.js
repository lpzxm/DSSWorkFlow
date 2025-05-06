window.onload = initAll; var xhr = false;
var xPos, yPos;
function initAll() {
    var allLinks = document.getElementsByTagName("a"); for (var i = 0; i < allLinks.length; i++) {
        allLinks[i].onmouseover = showPreview;
    }
}

function showPreview(evt) {
    getPreview(evt);
    return false;
}

function hidePreview() {
    document.getElementById("previewWin").style.visibility = "hidden";
}

function getPreview(evt) {
    if (evt) {
        var url = evt.target;
    }
    else {
        evt = window.event;
        var url = evt.srcElement;
    }
    xPos = evt.clientX; yPos = evt.clientY;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = showContents; xhr.open("GET", url, true); xhr.send(null);
    }
    else {
        alert("ERROR: No se ha podido crear objeto XMLHttpRequest");
    }
}

function showContents() {
    var prevWin = document.getElementById("previewWin"); if (xhr.readyState == 4) {
        prevWin.innerHTML = (xhr.status == 200) ? xhr.responseText : "Hay un problema con la solicitud: " + xhr.status + " - " + xhr.statusText;
        prevWin.style.top = parseInt(yPos) + 2 + "px"; prevWin.style.left = parseInt(xPos) + 2 + "px"; prevWin.style.visibility = "visible"; prevWin.onmouseout = hidePreview;
    }
}
