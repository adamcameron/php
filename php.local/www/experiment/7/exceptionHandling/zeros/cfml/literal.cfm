<cfscript>
try {
	1 / 0;
} catch (any e){
	writeOutput(e.type);
}
</cfscript>