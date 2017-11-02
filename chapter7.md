# 创建个性化web应用

1. 添加username和password列，username包含32个字符不能位空，password能够包含16个字符，不能为空。
```
ALTER TABLE table_name ADD username VARCHAR(32) NOT NULL AFTER user_id,
ADD password VARCHAR(16) NOT NULL AFTER username
```
2. 口令需要加密，使用mysql提供的`SHA()`函数，此函数的结果是一个加密串，长度固定为40位16进制字符。我们存储的是一个40位字符串
  * `SHA()` 代表安全散列算法Secure Hash Algorithm 单向加密，无法还原。比`MD5()`更安全一些
  * php提供的加密函数是`shal()`和`md5()`
  * 在HTTP认证窗口中将口令提交到服务器时，传输期间也应当对口令加密
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

*-end-*
