package reseautp2;

import java.io.IOException;
import java.net.InetAddress;

public class ping {

  public static void sendPingRequest(String ipAddress) throws IOException {
    InetAddress adr = InetAddress.getByName(ipAddress);
    System.out.println("Sending ping request to " + ipAddress);
    if (adr.isReachable(12)) {
      System.out.println("Host is reachable");
    } else {
      System.out.println("Host is unreachable");
    }
  }

  public static void main(String[] args) throws Exception {
    String ipAddress;

    ipAddress = "127.0.0.1";
    sendPingRequest(ipAddress);
    System.out.println();

    ipAddress = "133.192.31.42";
    sendPingRequest(ipAddress);
    System.out.println();

    ipAddress = "145.154.42.58";
    sendPingRequest(ipAddress);
    System.out.println();
  }
}
