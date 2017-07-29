public class Test {
	public static void main(String[] args){
		C c = new C();
		D d = new D();
		
		System.out.println(c.f("41"));
		System.out.println(c.g("43"));
		System.out.println("");

		System.out.println(d.f(c, "47"));
		System.out.println(d.g(c, "53"));
		System.out.println("");
		
	}
}