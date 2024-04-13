package reseautp3.ex2;

public class TCPServerMain {
    
    public static void main(String[] args) {
        TCPServer server = new TCPServer(1234);
        server.serve();
    }
}
