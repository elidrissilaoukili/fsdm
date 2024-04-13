package reseautp3.ex2;

import java.net.Socket;
import java.util.Scanner; 
import java.io.IOException;

import java.io.DataInputStream;
import java.io.DataOutputStream;

import java.io.InputStream;
import java.io.OutputStream;

public class TCPClient {
    private int serverPort;
    private String serverName;
    private Socket client;
    private Scanner scanner = new Scanner(System.in);

    
    public TCPClient(int serverPort, String serverName){
        this.serverPort = serverPort;
        this.serverName = serverName;
    }

    public void connect (){
        try {
            this.client = new Socket(this.serverName, this.serverPort);
			// client.getRemoteSocketAddress() : retourne l adress du serveur
            System.out.println("Connected to: " + client.getRemoteSocketAddress()); 
        } catch (IOException e){
            e.printStackTrace();
        }
    }

    public void sendMessage(){
        System.out.print("Write message: ");
        
        try {
            OutputStream out  = client.getOutputStream();
            DataOutputStream outData = new DataOutputStream(out);
            if(this.client.isConnected()) {
                String message = scanner.nextLine();
                outData.writeUTF(message);
            } else {
                scanner.close();
            }
        } catch(IOException e){
            //  TO DO Auto-generated catch block
            e.printStackTrace();
        }
    }

    public void receiveMessage(){
        try {
            InputStream in = client.getInputStream();
            DataInputStream dataIn = new DataInputStream(in);
            String message = dataIn.readUTF();
            System.out.println("recieved message: " + message);
        } catch (IOException e){
            e.printStackTrace();
        }
    }

    public Socket getClient(){
        return client;
    }

    public void setClient(Socket client) {
        this.client = client;
    }

}
