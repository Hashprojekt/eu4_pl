function show_popup(element, event) {
if (!event) {
var event = window.event;
}
move_popup(event);
filename = element.src;
re = '/mini/(foto-[0-9]+.jpg)$/';
if (match = filename.match(re)) {
powiekszenie_exif(match[1]);
}
}

function move_popup(event) {
if (!event) {
var event = window.event;
}
el = document.getElementById('popup');
el.style.display = 'block';
el.style.left = event.clientX + document.documentElement.scrollLeft + 10 +
'px';
el.style.top = event.clientY + document.documentElement.scrollTop + 10 + 'px';
}

function hide_popup() {
e = document.getElementById('popup');
e.style.display = 'none';
}

filename = element.src;
re = /mini/(foto-[0-9]+.jpg)$/;
if (match = filename.match(re)) {
powiekszenie_exif(match[1]);
}

document.getElementById('duze').src = 'duze/' + filename;

function powiekszenie_exif(filename) {
r = getXMLHttpRequest();
var el;
el = document.getElementById('duze');
el.src = 'duze/' + filename;
r.open('GET', 'server.php?id=' + filename, true);
r.onreadystatechange = handleAjaxResponse;
r.send(null);
}

function handleAjaxResponse() {
if ((r.readyState == 4) && (r.status == 200)) {
e = document.getElementById('exif');
e.innerHTML = r.responseText;
}
}


