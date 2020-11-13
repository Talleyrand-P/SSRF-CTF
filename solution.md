The PHP script is curling the URL the user provides and echos the result out onto the page. The intended use would be curling a normal web site like google. When calls are being made to a URL, and you can edit the request you can use it to perform SSRF.

To get the contents of /etc/passwd, you can provide the input

```file:///localhost/../../etc/passwd```

SSRF commonly results in LFI, local network access, bypassing web authorisation, and gaining access to internal web services and APIs.

The below is an example from Burp:

For example, consider a shopping application that lets the user view whether an item is in stock in a particular store. To provide the stock information, the application must query various back-end REST APIs, dependent on the product and store in question. The function is implemented by passing the URL to the relevant back-end API endpoint via a front-end HTTP request. So when a user views the stock status for an item, their browser makes a request like this

```POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://stock.weliketoshop.net:8080/product/stock/check%3FproductId%3D6%26storeId%3D1
```

This causes the server to make a request to the specified URL, retrieve the stock status, and return this to the user.
In this situation, an attacker can modify the request to specify a URL local to the server itself. For example
```
POST /product/stock HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 118

stockApi=http://localhost/admin
```
Here, the server will fetch the contents of the /admin URL and return it to the user.
Now of course, the attacker could just visit the /admin URL directly. But the administrative functionality is ordinarily accessible only to suitable authenticated user

<h3>Further Reading</h3>
To learn more about how this vulnerability is exploited, I would recommend the burp suite web academy. The first few exercises are like this one, but the later exercises show how to perform blind SSRF.

https://portswigger.net/web-security/ssrf
