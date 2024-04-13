package reseautp3.ex2;

public class TCPClientMain {
    public static void main(String[] args) {
        TCPClient client = new TCPClient(1234, "localhost");
        // TCPClient client2 = new TCPClient(7777, "localhost");

        client.connect();
        // client2.connect();

        while (client.getClient().isConnected()) {
            client.sendMessage();
            client.receiveMessage();
            // client2.sendMessage();
            // client2.receiveMessage();
        }
    }
}