class PersonalMilestone {
	constructor(date, name) {
		this.date = date;
		this.name = name;
	}
}

var peopleData = {"2008-11-08": "Jacinda", "1990-10-27": "Bill", "2014-09-20": "James", "1979-05-24": "Winston"}

people = Object.entries(peopleData).reduce(function (people, personData) {
	people[personData[0]] = new PersonalMilestone(personData[0], personData[1])
	return people
}, {})

console.log(people);
