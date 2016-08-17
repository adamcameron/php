<cfscript>
writeOutput( ['a', 'at', 'cat', 'scat', 'catch'].filter( function( i ) { return reFind( '.+at', i ); } ).first() );
</cfscript>