component {

    parents = {};

    function init() {
        tree = {
			children = []
		};
        parents[0] = tree;

        return this;
    }

    function loadFromCsv(filePath) {
        var dataFile = fileOpen(filePath, "read");

        var tree = new Tree();
        while(!fileIsEof(dataFile)){
			line = fileReadLine(dataFile);
			var id = line.listFirst();
			var parent = line.listGetAt(2, ",", true);
			var nodeText = line.listLast();
            tree.addNode(nodeText, id, parent);
        }

        return tree;
    }

    function addNode(nodeText, id, parent) {
        var treeNode = {
                nodeText = nodeText
		};
        parent = parent == "" ? 0 : parent;
        parents[id] = treeNode;
		appendChild(parent, treeNode);
    }
	
	private function appendChild(parent, treeNode){
		if (!parents[parent].keyExists("children")) {
			parents[parent].children = [];
		}
		parents[parent].children.append(treeNode);
	}

    function serializeJson() {
        return serializeJson(parents[0]["children"]);
    }
}
