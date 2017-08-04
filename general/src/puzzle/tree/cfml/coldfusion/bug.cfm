<cfscript>
writeOutput("#server.coldfusion.productVersion#<br>");
st = {};
k = "key";
try {
	st[k] = st[k] ?: {};
} catch (any e){
	writeOutput("#e.message#<br>");
} finally {
	writeDump(st);
}

try {
	st[k] = st.keyExists(k) ? st[k] : {};
} catch (any e){
	writeOutput("#e.message#<br>");
} finally {
	writeDump(st);
}
</cfscript>