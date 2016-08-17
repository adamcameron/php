function f (input, pattern) {
	var reverse = str => str.split('').reverse().join('');
	var reversedIndex = (l, i) => l - (i + 1);
	
	var j = '\n' + input.join('\n') + '\n',
		i = j.search(pattern);

	if (i == -1) return undefined;

	var end = j.indexOf('\n', i);
	var start = reversedIndex(j.length, reverse(j).indexOf('\n', reversedIndex(j.length, end) + 1));
	return j.substr(start + 1, end - start - 1);
}

console.log(f(['a', 'at', 'cat', 'scat', 'catch'], '.+at'));
console.log(f(['a', 'at', 'cat', 'scat', 'catch'], '.+cat'));
console.log(f(['a', 'at', 'cat', 'scat', 'catch'], '.t'));
console.log(f(['a', 'at', 'cat', 'scat', 'catch'], 'a'));
console.log(f(['a', 'at', 'cat', 'scat', 'catch'], '.+xat'));