<cfscript>
  arrayOfStrings = [ 'a', 'at', 'cat', 'scat', 'catch' ];
  regex = '.+at';
  writeOutput( arrayOfStrings.reduce( function( result='', item ){ return len( result ) ? result : item.reFind( regex ) ? item : ''; } ) );
</cfscript>