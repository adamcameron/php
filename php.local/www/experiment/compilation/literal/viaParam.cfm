<cfscript>
// viaParam.cfm

operator = url.operator ?: 'divide';
divisor = url.divisor ?: 1;
try {
	if (operator == 'divide'){
		result = 1 / divisor;
	}else{
		result = 1 % divisor;
	}
} catch (Any e){
	writeOutput("Operator: #operator#<br>");
	writeDump(e);
}	
</cfscript>