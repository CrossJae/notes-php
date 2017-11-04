# 创建个性化web应用

1. 添加username和password列，username包含32个字符不能位空，password能够包含16个字符，不能为空。
```
ALTER TABLE table_name ADD username VARCHAR(32) NOT NULL AFTER user_id,
ADD password VARCHAR(16) NOT NULL AFTER username
```
2. 口令需要加密，使用mysql提供的`SHA()`函数，此函数的结果是一个加密串，长度固定为40位16进制字符。我们存储的是一个40位字符串
  * `SHA()` 代表安全散列算法Secure Hash Algorithm 单向加密，无法还原。比`MD5()`更安全一些
  * php提供的加密函数是`shal()`和`md5()`
  * 在HTTP认证窗口中将口令提交到服务器时，传输期间也应当对口令加密（？）
  ```
  // 插入
  INSERT INTO table_name (username, password, join_date)
  VALUES ('jnettles', SHA('tatlover'), NOW())

  // 查询
  SELECT * FROM table_name WHERE password = SHA('tatlover')
  ```
3. 扩展字符串长度
```
ALTER TABLE table_name CHANGE password password VARCHAR(40) NOT NULL
```
4. 注册sign-up
5. 注销
  * 用HTTP认证登录后的用户名跟口令是永久保存在全局变量`$_SERVER`中，无法实现注销功能
  * cookie
    1. `setcookie()` 设置cookie `setcookie('username','sidneyk')`
    2. `$_COOKIE` 获取cookie `$_COOKIE['username']`
    3. 删除cookie：将到期日期设置为过去的一个时间 `setcookie('name', 'sidneyk', time()-3600)`
    4. 但cookie有局限性，比如用户的浏览器禁用了cookie
  * 会话
    1. cookie是将数据存储在客户端，会话是将数据存储在服务器上，比cookie更安全可靠
    2. 缺点：没有到期时间，所以浏览器关闭，会话就会被自动删除。必须注意开始会话、撤销会话、会话之后的清理工作
    3. `session_start()` 会话开始，不设置任何数据，只是建立会话并开始运行。多次调用不会创建多个对话，第一次调用创建会话，后续的调用会先判断是否已有会话开始。
    4. `session_destroy()` 会话结束：关闭浏览器或者调用这个方法
    5. `$_SESSION['username'] = 'sidneyk'` 设置会话变量
    6. `$_SESSION = array()` 销毁会话变量，把全局变量设置为一个空数组
    7. 如果浏览器支持cookie，会话可能设置一个cookie临时存储会话id，所以要完全关闭一个会话，还必须删除可能在浏览器上自动创建来存储会话id的所有cookie
    ```
    if(isset($_COOKIE[session_nmae()])){
      setcookie(session_name(), '', time()-3600);
    }
    ```
6. 分解PHP代码置于HTML代码中，可以避免使用一大堆echo语句来生成结果，用`<?php`开始另一段PHP代码时，逻辑会从前面中断的地方继续。

*-end-*
