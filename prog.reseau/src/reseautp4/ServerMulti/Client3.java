package reseautp4.ServerMulti;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Client3 {
    public static void main(String[] args) {
        try (Socket client = new Socket("127.0.0.1", 4200);
             Scanner sc = new Scanner(System.in);
             DataOutputStream out = new DataOutputStream(client.getOutputStream());
             DataInputStream in = new DataInputStream(client.getInputStream())) {

            System.out.print("Enter your name:");
            String clientName = sc.nextLine();
            out.writeUTF(clientName);

            String serverResponse = in.readUTF();
            System.out.println("Server response: " + serverResponse);

        } catch (UnknownHostException e) {
            System.err.println("Unknown host: " + e.getMessage());
        } catch (IOException e) {
            System.err.println("I/O error: " + e.getMessage());
        }
    }
}
