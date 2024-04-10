package reseautp2;

import java.net.MalformedURLException;
import java.net.URL;
import java.nio.charset.MalformedInputException;

public class ComparUrls {

  public static void main(String[] args)
    throws MalformedInputException, MalformedURLException {
    @SuppressWarnings("deprecation")
    URL u1 = new URL("http://massena.univ-mlv.fr/index.html");
    System.out.println(u1.toString());

    @SuppressWarnings("deprecation")
    URL u2 = new URL("http", "massena.univ-mlv.fr", 80, "index.html");
    System.out.println(u2.toString());
  }
}
/*
 * 
 * The only difference between url1 and url2 is that the second url 
 * contains the port and even when you type the http protocol and do 
 * not do '//', it is done automatically.
 * 
 * In order to establish an HttpURLConnection, we create a
 * class allowing to validate, establish a connection of type
 * HttpURLConnection from a given URL, then retrieve the
 * information from the header of the content of this URL.
 * Run the following program then comment on the results.
 */


