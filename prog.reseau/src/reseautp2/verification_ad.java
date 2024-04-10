package reseautp2;

public class verification_ad {

  @SuppressWarnings("removal")
  static boolean estCorrecte(String adr) {
    String[] parties = adr.split("\\.");
    for (int i = 0; i < 4; i++) {
      if (
        new Integer(parties[i]) < 0 || new Integer(parties[i]) > 255
      ) return false;
    }
    return true;
  }

  public static void main(String[] args) throws Exception {
    String adr = "192.168.1.1";
    System.out.println(adr + " est " + estCorrecte(adr));
  }
}
