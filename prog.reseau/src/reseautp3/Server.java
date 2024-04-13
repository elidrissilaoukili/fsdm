package reseautp3;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;

public class Server {

    public static long calculate(float price,float tva){
        return (long) (price + tva);
    }

    public static void main(String[] args) throws IOException {
        ServerSocket ss = new ServerSocket(2000);
        System.out.println("Attemtting connection");
        Socket client = ss.accept();
        DataInputStream inp = new DataInputStream(client.getInputStream());
        String name = inp.readUTF();
        String last_name = inp.readUTF();

        int art_nbr = inp.readInt();
        float tax_price = inp.readFloat();
        float tva = (float)(tax_price * 0.2);
        float pricett = art_nbr * calculate(tax_price, tva);

        String str = "Hello, " + name + " " + last_name + "\nTax price is: " + tax_price + "\narticle number is: " + art_nbr + "\nTVA: " + tva + "\nTotal price with taxes: " + pricett + "DH\n";

        DataOutputStream out = new DataOutputStream(client.getOutputStream());
        out.writeUTF(str);
        client.close();
        ss.close();
    }   
}
