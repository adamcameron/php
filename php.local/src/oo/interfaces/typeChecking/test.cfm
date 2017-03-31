<cfscript>
c = new C();

writeOutput(c.f(41) & "<br>");
writeOutput(c.g(43) & "<br>");
writeOutput("<hr>");

d = new D();
writeOutput(d.f(c, 47) & "<br>");
writeOutput(d.g(c, 53) & "<br>");
writeOutput("<hr>");

</cfscript>