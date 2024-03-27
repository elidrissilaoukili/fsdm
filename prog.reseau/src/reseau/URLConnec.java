package reseau;

import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;

public class URLConnec {

  @SuppressWarnings("deprecation")
  public static void main(String[] args) throws IOException {
    URL url = new URL("http://www.google.com");
    URLConnection urlc = url.openConnection();
    HttpURLConnection cnx = null;

    if (urlc instanceof HttpURLConnection) {
      cnx = (HttpURLConnection) urlc;
    } else {
      System.out.println("Please, enter a valid Http URL");
      return;
    }

    for (int i = 1; i <= 9; i++) {
      System.out.println(
        cnx.getHeaderFieldKey(i) + "=" + cnx.getHeaderField(i)
      );
    }
  }
}
