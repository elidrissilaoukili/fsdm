package reseautp3.ex3;

import java.net.DatagramSocket;
import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.SocketException;
import java.io.IOException;

public class Send_UDP {
    public static void main(String[] args) {
        try {
            DatagramSocket ds = new DatagramSocket();

            String msg = " Welcome, Mohammed El Idrissi Laoukili !";

            InetAddress ip = InetAddress.getByName("127.0.0.1");

            DatagramPacket dp = new DatagramPacket(msg.getBytes(), msg.length(), ip, 3000);
            
            ds.send(dp);
            ds.close();

        } catch (SocketException e) {
            System.err.println("SocketException: " + e.getMessage());
        } catch (IOException e) {
            System.err.println("IOException: " + e.getMessage());
        }
    }
}
