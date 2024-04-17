package reseautp3.ex2v2;

public class TCPClientMain {
    public static void main(String[] args) {
        TCPClient client = new TCPClient(1234, "localhost");

        client.connect();

        // Start sending and receiving messages until the user decides to end
        client.startCommunication();

        // Close the client socket after communication ends
        client.close();
    }
}
