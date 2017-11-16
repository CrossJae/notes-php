# 使用存储在文件中的数据

### 添加管理页面删除数据

1. 脚本的URL可以用于将数据作为一个GET请求传递，即数据通过url传递
  ```
  echo '<a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . '">remove</a>';
  ```
2. 通过URL传递的参数，通过`$_GET`超级变量获取，`$_GET`是一个数组，`$_GET['id']`
3. `$_GET` 和 `$_POST` 的区别：请求的目的不同。通过GET传递的数据，在URL上是可见的，POST传递的数据是隐藏不可见的。POST和表单是绑定的，GET可以和表单也可以和URL一起工作。
  * get主要用于从服务器获取数据而不影响服务器上的任何其他方面
  * post通常向服务器发送数据，服务器的状态往往会有某种程度的改变来响应所发送的数据。
  ```
  $os = isset($_GET['os']) ? $_GET['os'] : 'ios';
  ```
4. `DELETE FROM` 删除数据行 `DELETE FROM guitarwars WHERE name = 'Ashton Simpson' AND score = '368420' LIMIT 1`
5. `LIMIT` 限制最大删除行数

*-end-*
