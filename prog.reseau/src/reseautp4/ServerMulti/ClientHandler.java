package reseautp4.ServerMulti;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;


public class ClientHandler implements Runnable {

    private Socket socket;
    public ClientHandler(Socket socket) {
        this.socket = socket;
    }

    public void run() {
        DataInputStream in1;
        try {
            in1 = new DataInputStream(this.socket.getInputStream());
            String nomClient = in1.readUTF();

            // traitement de la donne
            String str = "Bienvenu " + nomClient + ", t'es bien connecte";

            // envoie de la reponse
            DataOutputStream out = new DataOutputStream(this.socket.getOutputStream());
            out.writeUTF(str);
        } catch (IOException e) {
            // TODO: handle exception
            e.printStackTrace();
        }
    }
}
