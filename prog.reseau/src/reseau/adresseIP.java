package reseau;

import java.io.IOException;
import java.net.InetAddress;

public class adresseIP {

  public static void main(String[] args) throws IOException {
    InetAddress ip = InetAddress.getLocalHost();
    System.out.println("Adresse du serveur locale = " + ip);
    System.out.println("nom de la machine: " + ip.getHostName());
    System.out.println("Adresse de la machine = " + ip.getHostAddress());
    System.out.println(InetAddress.getByName("www.google.net"));
  }
}
