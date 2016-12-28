let DOMParser = require('xmldom').DOMParser;
let parser = new DOMParser();
let xpath = require('xpath');

let xml = [0,1,2].map(function(childCount){
	let raw = "<doc><container>"
		+ Array.apply(null, Array(childCount)).reduce(function(children, _, i){
			return `${children}<child>text for child ${i+1}</child>`;
		}, "")
		+ "</container></doc>";

	return parser.parseFromString(raw);
});


xml.forEach(function(xml, childCount){
	console.log(`\n\nAccessing child text elements from XML doc with ${childCount} child node(s):`);
	let container = xpath.select("//container", xml)[0];
	let childNodes = container.childNodes;
	let childElements = Array.from(childNodes);

	childElements.forEach(function(child){
		let textNode = child.childNodes[0];
		console.log(textNode.data);
	});
});
