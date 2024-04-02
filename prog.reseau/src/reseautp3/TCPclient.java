package reseautp3;

import java.net.Socket;
import java.util.Scanner; 

public class TCPclient {
    private int serverPort;
    private String serverName;
    private Socket client;
    private Scanner scanner = new Scanner(System.in);

    
    public TCPClient(int serverPort, String serverName){
        this.serverPort = serverPort;
        this.serverName = serverName;
    }
}
