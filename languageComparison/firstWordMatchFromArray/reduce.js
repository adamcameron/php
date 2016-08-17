var words = ["a", "at", "cat", "scat", "catch"];

var match = words.reduce(function(match, word){
	if (match !== undefined) return match;
	if (word.match(/.+at/)){
		return word;
	}
}, undefined);

console.log(match);
