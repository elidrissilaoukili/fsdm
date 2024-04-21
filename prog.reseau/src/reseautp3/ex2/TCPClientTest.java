package reseautp3.ex2;

import java.util.Scanner;
import java.net.Socket;
import java.io.IOException;
import java.io.OutputStream;
import java.io.InputStream;
import java.io.DataOutputStream;
import java.io.DataInputStream;

class TCPClient {
	private int serverPort;
	private String serverName;
	private Socket clientSocket;
	private Scanner scanner = new Scanner(System.in);
	
	public TCPClient(int serverPort, String serverName){
		this.serverPort = serverPort;
		this.serverName = serverName;
	}
	public void setSocket(Socket clientSocket){ 
        this.clientSocket = clientSocket; 
    }
	public Socket getClient(){ return clientSocket; }
	
	public void connect(){
		try{
			this.clientSocket = new Socket(this.serverName, this.serverPort);
			System.out.print("Connected to: " + clientSocket.getRemoteSocketAddress());
		} catch(IOException e){ e.printStackTrace(); }	
	}
	
	public void sendMsg(){
		System.out.print("WRITE MESSAGE: ");
		try{
			OutputStream out = clientSocket.getOutputStream();
			DataOutputStream outData = new DataOutputStream(out);
			if(this.clientSocket.isConnected()){
				String message = scanner.nextLine();
				outData.writeUTF(message);
			} else { scanner.close(); }
		} catch(IOException e){ e.printStackTrace(); }	
	}
	
	public void recieveMsg(){
		try{
			InputStream in = clientSocket.getInputStream();
			DataInputStream inData = new DataInputStream(in);
			String message = inData.readUTF();
			System.out.print("RECIEVED: " + message);
		} catch(IOException e){ e.printStackTrace(); }	
	}

    public void closeScanner(){
        scanner.close();
    }
}

public class TCPClientTest{
	public static void main(String []args){
		TCPClient client = new TCPClient(1234, "localhost");
		client.connect();
		while(client.getClient().isConnected()){
			client.sendMsg();
			client.recieveMsg();
		}

        client.closeScanner();
	}
}
