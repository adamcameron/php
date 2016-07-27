import java.util.regex.Pattern;
import java.util.regex.Matcher;

class LineEndingWeirdness {
	
	public static void main(String[] args){
		String control = "abc";
		String experimentWithLf = control + Character.toString((char) 10);
		String experimentWithCr = control + Character.toString((char) 13);
		
		Pattern p1 = Pattern.compile("^" + control + "$");
		Pattern p2 = Pattern.compile("\\A" + control + "\\z");
		Pattern p3 = Pattern.compile("\\A" + control + "\\Z");
		
		Matcher controlP1 = p1.matcher(control);
		Matcher controlP2 = p2.matcher(control);
		Matcher controlP3 = p3.matcher(control);
		Matcher experimentWithLfP1 = p1.matcher(experimentWithLf);
		Matcher experimentWithLfP2 = p2.matcher(experimentWithLf);
		Matcher experimentWithLfP3 = p3.matcher(experimentWithLf);
		Matcher experimentWithCrP1 = p1.matcher(experimentWithCr);
		Matcher experimentWithCrP2 = p2.matcher(experimentWithCr);
		Matcher experimentWithCrP3 = p3.matcher(experimentWithCr);
		
		System.out.println("control with ^abc$: " + controlP1.matches());
		System.out.println("control with \\Aabc\\z: " + controlP2.matches());
		System.out.println("control with \\Aabc\\Z: " + controlP3.matches());
		System.out.println("experimentWithLf with ^abc$: " + experimentWithLfP1.matches());
		System.out.println("experimentWithLf with \\Aabc\\z: " + experimentWithLfP2.matches());
		System.out.println("experimentWithLf with \\Aabc\\Z: " + experimentWithLfP3.matches());
		System.out.println("experimentWithCr with ^abc$: " + experimentWithCrP1.matches());
		System.out.println("experimentWithCr with \\Aabc\\z: " + experimentWithCrP2.matches());
		System.out.println("experimentWithCr with \\Aabc\\Z: " + experimentWithCrP3.matches());

	}
	
}