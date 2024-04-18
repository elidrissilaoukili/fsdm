package reseautp4.ServerMulti;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Client1TP {
    public static void main(String[] args) throws UnknownHostException, IOException {
        Socket client = new Socket("127.0.0.1", 4200);
        System.out.println("Nom du client");

        Scanner sc = new Scanner(System.in);
        String nomClient = sc.next();

        // envoie des donnees ou serveur
        DataOutputStream out = new DataOutputStream(client.getOutputStream());
        out.writeUTF(nomClient);

        // recuperation des donnees envoyees par le serveur
        DataInputStream in = new DataInputStream(client.getInputStream());

        String resp = in.readUTF();
        System.out.println(resp);
    }
}
