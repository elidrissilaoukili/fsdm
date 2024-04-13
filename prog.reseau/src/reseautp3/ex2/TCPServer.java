package reseautp3.ex2;

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
    private volatile boolean isDone = false;

    public TCPServer(int port) {
        this.port = port;
        try {
            serverSocket = new ServerSocket(this.port);
            serverSocket.setSoTimeout(6000000);
            System.out.println("Server running on address: " + serverSocket.getLocalSocketAddress());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void serve() {
        while (!isDone) {
            try {
                Socket clientSocket = serverSocket.accept();
                System.out.println("Client connected: " + clientSocket.getRemoteSocketAddress());

                while (!isDone) {
                    receiveMessage(clientSocket);
                    sendMessage(clientSocket);
                }

                clientSocket.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
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

    private void receiveMessage(Socket clientSocket) {
        try {
            InputStream in = clientSocket.getInputStream();
            DataInputStream dataIn = new DataInputStream(in);
            String message = dataIn.readUTF();
            System.out.println("Received message: " + message);
            if (message.equalsIgnoreCase("Over&Out")) {
                this.isDone = true;
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
