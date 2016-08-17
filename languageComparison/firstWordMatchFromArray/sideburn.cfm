<cfscript>
// http://blog.adamcameron.me/2016/08/code-quiz.html
function regexSearchArray(regexString,arrStrings){
    var localArrStrings = arrStrings;
    
    if (not arrayLen(localArrStrings))
        return;
    else if (refind(regexString, localArrStrings[1]))
        return localArrStrings[1];
    else{
        ArrayDeleteAt(localArrStrings,1);
        return regexSearchArray(regexString,localArrStrings);
    }
}
arrStrings = ['a', 'at', 'cat', 'scat', 'catch'];
writeoutput(regexSearchArray('.+at',arrStrings));
</cfscript>