var control = 'abc';
var experimentWithLf = 'abc' + String.fromCharCode(10);
var experimentWithCr = 'abc' + String.fromCharCode(13);

var p1 = /^abc$/;
//var p2 = /\Aabc\z/; // not supported in JS

var result = {
    control : {
        'with ^$' : control.match(p1),
//        'with \A\z' : control.match(p2)
    },
    experimentWithLf : {
        'with ^$' : experimentWithLf.match(p1),
//        'with \A\z' : experimentWithLf.match(p2)
    },
    experimentWithCr : {
        'with ^$' : experimentWithCr.match(p1),
//        'with \A\z' : experimentWithCr.match(p2)
    }
};
console.dir(result);