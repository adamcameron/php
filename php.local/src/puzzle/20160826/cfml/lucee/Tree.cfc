component {

	parents = {};

	function init() {
		parents[0]["children"] = [];

		return this;
	}

	static function loadFromCsv(filePath) {
		var dataFile = fileOpen(filePath, "read");

		var tree = new Tree();
		while(!fileIsEof(dataFile)){
			var line = fileReadLine(dataFile);
			tree.addNode(
				nodeText = line.listLast(),
				id = line.listFirst(),
				parent = line.listGetAt(2, ",", true)
			);
		}

		return tree;
	}

	private function addNode(nodeText, id, parent) {
		parent = parent == "" ? 0 : parent;

		parents[id].nodeText = nodeText;
		parents[parent].children = parents[parent].children ?: [];
		parents[parent].children.append(parents[id]);
	}

	function serializeJson() {
		return serializeJson(parents[0]["children"]);
	}
}
