var firstMatch = (input, pattern) => input.find(item => item.match(pattern));

console.log(firstMatch(['a', 'at', 'cat', 'scat', 'catch'], '.+at'));