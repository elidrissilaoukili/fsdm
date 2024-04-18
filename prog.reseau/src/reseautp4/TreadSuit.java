package reseautp4;
import java.lang.InterruptedException;
// import java.lang.Runnable;
public class TreadSuit extends Thread /* implements Runnable */ {
    int n;
    public TreadSuit(int n){
        this.n = n;
    }
    public void run(){
        float u = 2;
        for (int i = 0; i < n; i++) {
            u = 5 * u + 5;

            System.out.println("calcule de la "+ n + " iteration de la suite " + n);
            try {
                sleep((long)(Math.random() * 100));
            } catch (InterruptedException ie) {
                ie.printStackTrace();
            }
            System.out.println("la valeur de la suite a la " + i + " iteration de u " + i + " est: " + u);
        }
    }
    public static void main(String[] args) {
        TreadSuit a = new TreadSuit(2);
        TreadSuit b = new TreadSuit(5);
        TreadSuit c = new TreadSuit(8);
        a.start();
        b.start();
        c.start();
        System.err.println("c'est le threads principal.");
    }
}
