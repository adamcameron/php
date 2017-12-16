import java.util.HashMap;
import java.util.Map;
import java.util.stream.Collectors;

class PersonalMilestone {
	String date;
	String name;
	
	public PersonalMilestone(String date, String name) {
		this.date = date;
		this.name = name;
	}
	
	public String toString(){
		return String.format("{date: %s, name: %s}", this.date, this.name);
	}
}

class Collect {

	public static void main(String[] args) {

		HashMap<String,String> peopleData = loadData();

		HashMap<String, PersonalMilestone> people = mapToPeople(peopleData);
			
		dumpIdents(people);
	}
	
	private static HashMap<String,String> loadData(){
		HashMap<String,String> peopleData = new HashMap<String,String>();
		
		peopleData.put("2008-11-08", "Jacinda");
		peopleData.put("1990-10-27", "Bill");
		peopleData.put("2014-09-20", "James");
		peopleData.put("1979-05-24", "Winston");
		
		return peopleData;
	}
	
	private static HashMap<String,PersonalMilestone> mapToPeople(HashMap<String,String> peopleData) {
		HashMap<String, PersonalMilestone> people = (HashMap<String, PersonalMilestone>) peopleData.entrySet().stream()
			.collect(Collectors.toMap(
				e -> e.getKey(),
				e -> new PersonalMilestone(e.getKey(), e.getValue())
			));
			
		return people;
	}
	
	private static void dumpIdents(HashMap<String,PersonalMilestone> people) {
		for (Map.Entry<String, PersonalMilestone> entry : people.entrySet()) {
			System.out.println(String.format("%s => %s", entry.getKey(), entry.getValue()));
		}
	}
	
}