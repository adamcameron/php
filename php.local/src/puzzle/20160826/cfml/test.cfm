<cfscript>
dataFile = expandPath("../test/testfiles/deep/data.csv");
tree = new Tree().loadFromCsv(dataFile);
treeAsJson = tree.serializeJson();
jsonAsArray = deserializeJson(treeAsJson);
writeDump(jsonAsArray);
</cfscript>