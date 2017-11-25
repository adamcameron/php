class IndexedPerson {
	constructor(id, name) {
		this.id = id;
		this.name = name;
	}
}

var peopleData = {
	1:"Jacinda",
	3:"Bill",
	5:"James",
	7:"Winston"
}

people = Object.entries(peopleData).reduce(function (people, value) {
	people[value[0]] = new IndexedPerson(value[0], value[1])
	return people
}, {})

console.log(people);
