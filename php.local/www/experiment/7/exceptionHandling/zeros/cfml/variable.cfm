<cfscript>
try {
	zero = 0;
	result = 1 / zero;

	writeOutput("Result: #result#<br>");
	writeOutput("len(): #len(result)#<br>");
	writeOutput("asc(): #asc(result)#<br>");

} catch (any e){
	writeOutput("Exception type: #e.type#");
}
</cfscript>