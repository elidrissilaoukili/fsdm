package reseau;

import java.io.IOException;
import java.net.URL;

public class urls {

  public static void main(String[] args) throws IOException {
    String urlString =
      "https://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.43.4903&rep=rep1&type=pdf";

    @SuppressWarnings("deprecation")
    URL url = new URL(urlString);

    System.out.println(url.toString());

    System.out.println("getProtocol(): " + url.getProtocol());
    System.out.println("getHost(): " + url.getHost());
    System.out.println("getPort(): " + url.getPort());
    System.out.println("getFile(): " + url.getFile());
  }
}
/*
 * getProtocol(): This method returns the protocol component of the URL.
 *                The protocol typically specifies the communication protocol
 *                used to access the resource on the server.
 *
 *
 * getHost(): This method returns the host name of the URL.
 *            The host name represents the network location of the server
 *            where the resource is located. For example, in the URL "https://example.com",
 *            the host name is "example.com".
 *
 * getPort(): This method returns the port number of the URL.
 *            The port number specifies the port on the server where
 *            the resource is hosted. If no port is specified in the URL,
 *            this method returns the default port number for the given
 *            protocol (e.g., 80 for HTTP, 443 for HTTPS).
 *
 * getFile(): This method returns the file component of the URL.
 *            The file component represents the path to the resource on the
 *            server's file system. It includes the path and the file name.
 *            For example, in the URL "https://example.com/path/to/file.html",
 *            the file component is "/path/to/file.html".
 *
 *
 *These methods provide a convenient way to extract different components of a URL in Java.
 */
