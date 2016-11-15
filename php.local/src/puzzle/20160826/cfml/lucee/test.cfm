<cfscript>
dataFile = expandPath("../../test/testfiles/notOrdered/data.csv");
tree = Tree::loadFromCsv(dataFile);
treeAsJson = tree.serializeJson();
jsonAsArray = deserializeJson(treeAsJson);
writeDump(jsonAsArray);
</cfscript>