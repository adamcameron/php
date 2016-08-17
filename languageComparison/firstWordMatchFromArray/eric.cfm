<cfscript>
    function first( arr, predicate, defaultValue ) {
        if ( arrayIsEmpty( arr ) ) {
            if ( ! isNull( defaultValue ) ) {
                return defaultValue;
            }

            throw( "Cannot return the result because the array is either empty or no value matched the predicate with no default value provided." );
        }

        if ( isNull( predicate ) ) {
            return arr[ 1 ];
        } else {
            arguments.arr = arr.filter( predicate );
            structDelete( arguments, "predicate" );
            return first( argumentCollection = arguments );
        }
    }
    
    answer = first( ['a', 'at', 'cat', 'scat', 'catch'], function( str ) {
        return reFind( '.+at', str );
    } );
    
    writeOutput( answer );
</cfscript>