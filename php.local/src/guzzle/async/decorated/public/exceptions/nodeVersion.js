var Promise = require('promise');

var p = new Promise(function(){
    console.log("constructor resolve handler");
	throw {message:"from promise"};
});
var p2 = p.then(function(){
    console.log("then() resolve handler: we should not see this");
}, function(err){
    console.log("then() rejection handler");
	var newError = {
		message : "from then rejection handler",
		previous: err
	};
	throw newError;
});
p2.done(function(){
	console.log("done() resolve handler: we should not see this");
}, function(err){
	console.log("done() rejection handler");
	console.log("Caught exception:");
	console.dir(err);
});
