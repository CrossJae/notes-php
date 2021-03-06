# 使用存储在文件中的数据

1. `ALTER`  
  1. `ADD COLUMN` 增加一列。BOOL是TINYINT的别名，也可以使用（所以是个布尔值？）`ALTER TABLE table_name ADD COLUMN column_name ENUM('yes','no')` 也可以这样设定，只可以取yes或者no。
  ```
  ALTER TABLE table_name
  ADD COLUMN column_name TINYINT
  ```
  2. `DROP COLUMN` 放弃一列
  ```
  ALTER TABLE table_name
  DROP COLUMN category
  ```
  3. `CHANGE COLUMN` 修改一列的列名和数据结构
  4. `MODIFY COLUMN` 修改列的类型和位置
2. `UPDATE` 更新数据库 `UPDATE table_name SET column_name = 1 WHERE id = '$id'` 设置符合id条件的列值为1。
```
UPDATE table_name SET response = '$response' WHERE response_id = '$response_id';
```
3. `NOW()` 用来插入当前日期/时间，使用的是web服务器时间，而不是用户的当地时间
4. `$_FILES` 内置PHP超级全局变量。是一个数组，包含上传文件的文件名和其他变量。
  * `$_FILES['screenshot']['name']` 上传文件的文件名，screenshot是input的属性name的值
  * `$_FILES['screenshot']['type']` 上传文件的MIME类型，比如image/git
  * `$_FILES['screenshot']['size']` 上传文件的大小（字节数）
  * `$_FILES['screenshot']['tmp_name']` 上传文件在服务器上的临时存储位置
  * `$_FILES['screenshot']['error']` 上传文件的错误码，如果是0表示成功，其他表示失败
5. 数据库非常擅长存储文本数据，对于图像等原始二进制数据则不是它的强项，所以最好在数据库中存储图像文件的一个引用，即文件名 `$_FILES['screenshot']['name']`，当然也可以将图像数据存储在数据库中，但html在获取数据时需要处理成可以显示的类型。
6. `is_file()` 确保文件是否确实存在 `is_file($row['screenshot'])`
7. `filesize()` 确保文件不是空文件 `filesize($row['screenshot'])`
8. `<form enctype="multipart/form-data">` enctype属性告诉表单要使用文件上传所需的一种特殊类型编码，这会影响提交表单时如何打包和发送POST数据
9. `move_uploaded_file()` 控制上传文件的存储位置：`move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)` 参数1：源位置；参数2：目标位置。
  * 可以通过php.ini来修改位置，但如果是虚拟服务器上托管，无法访问php.ini文件
  * 如果把文件留在临时文件夹（虽然是临时的，但并不会被删除，不过某些系统，会自动定期清空临时文件夹），要向图像的路径增加`$_FILES['screenshot']['tmp_name']` 。临时文件夹可能不允许公开访问。
  * 设置$target
  ```
  define('GW_UPLOADPATH', 'image/'); // 创建常量
  $target = GW_UPLOADPATH . $screenshot;
  ```
  * 防止两个用户上传统一名称的图像文件，可以将文件名设置成唯一性，比如加入时间戳 `$traget = GW_UPLOADPATH . time() . $screenshot;`
10. `define()` 创建常量
11. 共享数据：需要被共享的常量放在一个单独的php文件中，其他需要用到这个常量的页面引用这个php `require_once('appvars.php'); // appvars.php是定义常量的脚本文件`
12. `ORDER BY` 排序 `select * from table_name order by column1 desc, column2 asc;` desc降序，asc升序
13. `@unlink($_FILES['screenshot']['tmp_name']);` 删除不符合条件的文件，`@` 防止在文件上传未成功时显示错误报告。可以在任何PHP函数前加`@`来抑制错误报告。

[] 查看我的php.ini文件，尝试修改file的位置
[] 将数据库信息放入共享脚本中P257

*-end-*
