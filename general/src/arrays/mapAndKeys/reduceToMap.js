class IndexedPerson {
	constructor(date, name) {
		this.date = date
		this.name = name
	}
}

let peopleData = {"2008-11-08": "Jacinda", "1990-10-27": "Bill", "2014-09-20": "James", "1979-05-24": "Winston"}

let people = Object.entries(peopleData).reduce(function (people, personData) {
	people.set(personData[0], new IndexedPerson(personData[0], personData[1]))
	return people
}, new Map())

console.log(people)
