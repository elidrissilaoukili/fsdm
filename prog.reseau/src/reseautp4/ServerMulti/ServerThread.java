package reseautp4.ServerMulti;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;

public class ServerThread {
    public static void main(String[] args) throws IOException {
        try (
            ServerSocket serverSocket = new ServerSocket(4200);
        )
        {
            System.out.println("En attent de connection...");
            while (true) {
                Socket socket = serverSocket.accept();
                System.out.println("Connection etablie");
                new Thread(new ClientHandler(socket)).start();
            }
        }
    }
}
