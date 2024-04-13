package reseautp3.ex3;

import java.net.DatagramSocket;
import java.net.DatagramPacket;
import java.net.SocketException;
import java.io.IOException;

public class Receive_UDP {
    public static void main(String[] args) throws SocketException {
        try {
            DatagramSocket ds = new DatagramSocket(3000);
            byte[] buf = new byte[1024];
            DatagramPacket dp = new DatagramPacket(buf, 1024);

            // Receive a packet
            ds.receive(dp);

            // Display received data
            String receivedData = new String(dp.getData(), 0, dp.getLength());
            System.out.println("Received from " + dp.getAddress() + ":" + dp.getPort() + ": " + receivedData);

            // Close the socket
            ds.close();
        } catch (SocketException e) {
            System.err.println("SocketException: " + e.getMessage());
        } catch (IOException e) {
            System.err.println("IOException: " + e.getMessage());
        }
    }
}
