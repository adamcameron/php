<cfscript>
/* lucee or adobe CF 11+  */
mystrings = ['a', 'at', 'cat', 'scat', 'catch'];
mytest = '.+at';
function firstMatch( strings, regex ) {
    var test = arguments.regex;
    var passing = arguments.strings.filter( function ( check ) {
        var matches = REMatch( test, check );
        return matches.Len() > 0;
    });
    return passing[ 1 ];
}
WriteOutput( firstMatch( mystrings, mytest ) );
</cfscript>