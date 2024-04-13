package reseautp3.ex1;

import java.io.IOException;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

public class Server {

    public static void main(String[] args) throws IOException {
        ServerSocket listener = new ServerSocket(9090);
        System.out.println("Connecting to the server... ");
        try {
            while (true) {
                Socket socket = listener.accept();
                try {
                    PrintWriter out = new PrintWriter(socket.getOutputStream(), true);
                    out.println(
                            " You have connected to the server " +
                                    socket.getLocalSocketAddress()
                    );
                } finally {
                    socket.close();
                }
            }
        } finally {
            listener.close();
        }
    }
}


/* 
import java.io.IOException;: This line imports the IOException class from the java.io package. IOException is used for handling input/output exceptions.

import java.io.PrintWriter;: This line imports the PrintWriter class from the java.io package. PrintWriter is used for writing formatted text to a character-output stream.

import java.net.ServerSocket;: This line imports the ServerSocket class from the java.net package. ServerSocket is a class used for implementing server sockets. It listens for incoming client requests on a specified port.

import java.net.Socket;: This line imports the Socket class from the java.net package. Socket is a class used for implementing client sockets. It represents a connection between the client and the server.

public class Server1 {: This line declares the start of the Server1 class definition. This class will contain the main method and logic for the server application.

public static void main(String[] args) throws IOException {: This line declares the main method of the Server1 class. It is the entry point of the program. It throws an IOException which may occur during socket handling.

ServerSocket listener = new ServerSocket(9090);: This line creates a new ServerSocket object that listens on port 9090 for incoming client connections.

System.out.println(" en attente de connection ... ");: This line prints a message to the console indicating that the server is waiting for connections.

while (true) {: This line starts an infinite loop which continuously accepts incoming client connections.

Socket socket = listener.accept();: This line blocks until a client connection is received, then it returns a new Socket object representing the connection to the client.

PrintWriter out = new PrintWriter(socket.getOutputStream(), true);: This line creates a new PrintWriter object that writes to the output stream of the client's socket. The true argument enables autoflushing, which means the output buffer will be flushed whenever a newline character is encountered.

out.println(" vous etes bien connect´e au serveur " + socket.getLocalSocketAddress());: This line sends a message to the client indicating that it has successfully connected to the server. It includes the socket address of the client's connection.

socket.close();: This line closes the socket connection with the client after sending the message.

listener.close();: This line closes the ServerSocket when the server is done accepting connections.

These lines together form a simple server application that listens for client connections on port 9090, accepts connections, sends a welcome message to each client upon connection, and then closes the connection.

*/