package reseautp3.ex2v2;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Scanner;

public class TCPServer {
    private int port;
    private ServerSocket serverSocket;
    private Scanner scanner = new Scanner(System.in);

    public TCPServer(int port) {
        this.port = port;
        try {
            serverSocket = new ServerSocket(this.port);
            System.out.println("Server running on address: " + serverSocket.getLocalSocketAddress());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void serve() {
        try {
            while (true) { // Loop indefinitely to serve multiple clients
                Socket clientSocket = serverSocket.accept();
                System.out.println("Client connected: " + clientSocket.getRemoteSocketAddress());

                new Thread(() -> {
                    try {
                        while (true) { // Loop indefinitely to handle multiple messages from the same client
                            String receivedMessage = receiveMessage(clientSocket);
                            System.out.println("Received message from " + clientSocket.getRemoteSocketAddress() + ": " + receivedMessage);

                            if (receivedMessage.equalsIgnoreCase("Over&Out")) {
                                break; // Exit the loop if client sends "Over&Out"
                            }

                            sendMessage(clientSocket);
                        }
                    } finally {
                        try {
                            clientSocket.close(); // Close the client socket after handling messages
                        } catch (IOException e) {
                            e.printStackTrace();
                        }
                    }
                }).start();
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private void sendMessage(Socket clientSocket) {
        System.out.print("Write a message: ");

        try {
            OutputStream out = clientSocket.getOutputStream();
            DataOutputStream outData = new DataOutputStream(out);
            String message = scanner.nextLine();
            outData.writeUTF(message);
            outData.flush();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private String receiveMessage(Socket clientSocket) {
        try {
            InputStream in = clientSocket.getInputStream();
            DataInputStream dataIn = new DataInputStream(in);
            return dataIn.readUTF();
        } catch (IOException e) {
            e.printStackTrace();
            return "";
        }
    }
}
