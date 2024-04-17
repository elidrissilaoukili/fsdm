package reseautp3.ex2v2;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.Socket;
import java.util.Scanner;

public class TCPClient {
    private int serverPort;
    private String serverName;
    private Socket client;
    private Scanner scanner = new Scanner(System.in);

    public TCPClient(int serverPort, String serverName) {
        this.serverPort = serverPort;
        this.serverName = serverName;
    }

    public void connect() {
        try {
            this.client = new Socket(this.serverName, this.serverPort);
            System.out.println("Connected to: " + client.getRemoteSocketAddress());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void sendMessage() {
        try {
            OutputStream out = client.getOutputStream();
            DataOutputStream outData = new DataOutputStream(out);

            System.out.print("Write message: ");
            String message = scanner.nextLine();
            outData.writeUTF(message);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void receiveMessage() {
        try {
            InputStream in = client.getInputStream();
            DataInputStream dataIn = new DataInputStream(in);
            String message = dataIn.readUTF();
            System.out.println("Received message: " + message);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void close() {
        try {
            client.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void startCommunication() {
        while (true) {
            sendMessage();
            receiveMessage();
            if (isEndMessage()) {
                break;
            }
        }
    }

    private boolean isEndMessage() {
        System.out.print("Do you want to end communication? (yes/no): ");
        String response = scanner.nextLine();
        return response.equalsIgnoreCase("yes");
    }
}
