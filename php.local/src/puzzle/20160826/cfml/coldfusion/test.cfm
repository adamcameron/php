<cfscript>
dataFile = expandPath("../../test/testfiles/notOrdered/data.csv");
tree = new Tree().init().loadFromCsv(dataFile);
treeAsJson = tree.serializeJson();
jsonAsArray = deserializeJson(treeAsJson);
writeDump(jsonAsArray);
</cfscript>