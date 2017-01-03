var doc = document.createElement("body");
doc.innerHTML = '<div><span id="2"></span><span id="3"></span></div>';

var collectionElements = doc.getElementsByTagName("div")[0].children;
console.dir(collectionElements);

