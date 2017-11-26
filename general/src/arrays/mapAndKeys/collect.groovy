class IndexedPerson {
	String date
	String name

	IndexedPerson(String date, String name) {
		this.date = date;
		this.name = name;
	}

	String toString(){
		String.format("date: %s, name: %s", this.date, this.name)
	}
}

peopleData = ["2008-11-08": "Jacinda", "1990-10-27": "Bill", "2014-09-20": "James", "1979-05-24": "Winston"]

people = peopleData.collectEntries {date, name -> [date, new IndexedPerson(date, name)]}

people.each {date, person -> println String.format("%s => {%s}", date, person)}
