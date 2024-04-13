package reseautp3;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.InetAddress;
import java.net.Socket;
import java.util.Scanner;
public class Client {
    public static void main(String[] args) {
        try{
            Socket s = new Socket(InetAddress.getLocalHost(), 2000);
            DataOutputStream out = new DataOutputStream(s.getOutputStream());
            
            try (Scanner sc = new Scanner(System.in)) {
                System.out.print("Enter your name: ");
                String name = sc.nextLine();
                out.writeUTF(name);
                
                System.out.print("Enter your last name: ");
                String last_name = sc.nextLine();
                out.writeUTF(last_name);

                System.out.print("Enter article numbers: ");
                int art_nbr = sc.nextInt();
                out.writeInt(art_nbr);

                System.out.print("Enter price article: ");
                float art_price = sc.nextFloat();
                out.writeFloat(art_price);
            }
            out.flush();
            DataInputStream inp = new DataInputStream(s.getInputStream());
            String res = inp.readUTF();
            System.out.println(res);;
            s.close();
        } catch (Exception e){
        }
    }
}
