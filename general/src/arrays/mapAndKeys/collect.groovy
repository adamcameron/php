class IndexedPerson {
	Integer id
	String name

	IndexedPerson(Integer id, String name) {
		this.id = id;
		this.name = name;
	}

	String toString(){
		String.format("id: %d, name: %s", this.id, this.name)
	}
}

peopleData = [
	1:"Jacinda",
	3:"Bill",
	5:"James",
	7:"Winston"
]

people = peopleData.collectEntries {key, value -> [key, new IndexedPerson(key, value)]}



people.each {key, value -> println String.format("%d => Value: %s", key, value)}

