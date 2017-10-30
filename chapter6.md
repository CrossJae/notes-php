# 保证应用安全

1. 进行操作之前先进行认证，利用HTTP认证
  * HTTP认证是在浏览器和服务器之间通过HTTP首部建立一个通信线路，可以把首部认为是浏览器和服务器之间的一个简短小对话。浏览器和服务器经常在PHP之外使用首部进行通信。实际上每次访问页面都用到了首部。
  * 首部提供了一种机制，中断服务器的页面传送，在真正传送页面之前请求用户输入一个用户名和口令。
  * **过程** ：有人键入一个URL或者点击web页面上的一个链接时，浏览器会组装一个GET请求，并发送到服务器，这个请求会打包为一系列的首部，每个首部包含有关请求的页面名／主机／发出请求的浏览器的类型等信息。
2. `$_SERVER`
  * `$_SERVER['PHP_AUTH_USER']`
  * `$_SERVER['PHP_AUTH_PW']`
3. `header()` 立即从服务器发送一个首部给浏览器，必须在发送具体内容之前调用，所以必须放在所有脚本之前！
  ```
  <?php
    header('Content-Type : text/html');
  ?>
  ```
4. 认证的两个首部，basic realm是基本域
  ```
  <?php
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate:Basic realm="Guitar Wars"');
  ?>
  ```
5. 取消“cancel”输入时
  ```
  exit('<div>message</div>')
  ```
6. 其他首部的介绍
  * `header('Location : https://xxx')` 重定向
  * `header('Refresh:5; url=https://xxx')` 5s自刷新
*-end-*
