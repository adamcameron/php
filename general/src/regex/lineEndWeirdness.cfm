<cfscript>
control = 'abc';
experimentWithLf = 'abc' & chr(10);
experimentWithCr = 'abc' & chr(13);

p1 = "^abc$";
p2 = "\Aabc\Z";

result = {
    control : {
        'with ^$' : control.reFind(p1),
        'with \A\Z' : control.reFind(p2)
    },
    experimentWithLf : {
        'with ^$' : experimentWithLf.reFind(p1),
        'with \A\Z' : experimentWithLf.reFind(p2)
    },
    experimentWithCr : {
        'with ^$' : experimentWithCr.reFind(p1),
        'with \A\Z' : experimentWithCr.reFind(p2)
    }
};
writeDump(result);
</cfscript>