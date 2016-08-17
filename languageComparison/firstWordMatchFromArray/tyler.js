function getFirstArrayRegexMatch(array, regex){
  return (
    array.filter(function(element){
      if(element.match(regex)){ return element; }
    })[0]
  );
}

var a = ["a","at","cat","scat","catch"]
,   r = /.+at/;

console.log(getFirstArrayRegexMatch(a, r));