import java.util.HashMap;
import java.util.Map;
import java.util.stream.Collectors;

class IndexedPerson {
	Integer id;
	String name;
	
	public IndexedPerson(Integer id, String name) {
		this.id = id;
		this.name = name;
	}
	
	public String toString(){
		return String.format("id: %d, name: %s", this.id, this.name);
	}
}

class Test {

	public static void main(String[] args) {

		HashMap<Integer,String> peopleData = loadData();

		HashMap<Integer, IndexedPerson> people = mapToPeople(peopleData);
			
		dumpIdents(people);
	}
	
	private static HashMap<Integer,String> loadData(){
		HashMap<Integer,String> peopleData = new HashMap<Integer,String>();
		
		peopleData.put(1, "Jacinda");
		peopleData.put(3, "Bill");
		peopleData.put(5, "James");
		peopleData.put(7, "Winston");
		
		return peopleData;
	}
	
	private static HashMap<Integer,IndexedPerson> mapToPeople(HashMap<Integer,String> peopleData) {
		HashMap<Integer, IndexedPerson> people = (HashMap<Integer, IndexedPerson>) peopleData.entrySet().stream()
			.collect(Collectors.toMap(
				e -> e.getKey(),
				e -> new IndexedPerson(e.getKey(), e.getValue())
			));
			
		return people;
	}
	
	private static void dumpIdents(HashMap<Integer,IndexedPerson> people) {
		for (Map.Entry<Integer, IndexedPerson> entry : people.entrySet()) {
			System.out.println(String.format("%d => Value: %s", entry.getKey(), entry.getValue()));
		}
	}
	
}