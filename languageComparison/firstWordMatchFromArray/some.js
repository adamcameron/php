var words = ["a", "at", "cat", "scat", "catch"];

var match;
words.some(function(word){
	if (word.match(/.+at/)){
		return match = word;
	}
});

console.log(match);
