<cfscript>
dataFile = expandPath("../test/testfiles/notordered/data.csv");
tree = Tree::loadFromCsv(dataFile);
treeAsJson = tree.serializeJson();
jsonAsArray = deserializeJson(treeAsJson);
writeDump(jsonAsArray);
</cfscript>