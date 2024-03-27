package helpers;

public class verification_ad {

  static boolean estCorrecte(String adr) {
    String[] parties = adr.split("\\.");
    for (int i = 0; i < 4; i++) {
      try {
        int num = Integer.parseInt(parties[i]);
        if (num < 0 || num > 255) return false;
      } catch (NumberFormatException e) {
        return false; // If parsing fails, the format is incorrect
      }
    }
    return true;
  }

  public static void main(String[] args) throws Exception {
    String adr = "192.168.1.1";
    System.out.println(adr + " est " + estCorrecte(adr));
  }
}
