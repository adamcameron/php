<cfscript>
dataFile = expandPath("../test/testfiles/deep/data.csv");
tree = new Tree().init().loadFromCsv(dataFile);
treeAsJson = tree.serializeJson();
jsonAsArray = deserializeJson(treeAsJson);
writeDump(jsonAsArray);
</cfscript>