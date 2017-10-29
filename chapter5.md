# 使用存储在文件中的数据

1. `ALTER`  
  1. `ADD COLUMN` 增加一列
  2. `DROP COLUMN` 放弃一列
  3. `CHANGE COLUMN` 修改一列的列名和数据结构
  4. `MODIFY COLUMN` 修改列的类型和位置
2. `UPDATE` 更新数据库
3. `NOW()` 用来插入当前日期/时间
4. `$_FILES` 内置PHP超级全局变量。是一个数组，包含上传文件的文件名和其他变量。
  * `$_FILES['screenshot']['name']` 上传文件的文件名，screenshot是input的属性name的值
  * `$_FILES['screenshot']['type']` 上传文件的MIME类型，比如image/git
  * `$_FILES['screenshot']['size']` 上传文件的大小（字节数）
  * `$_FILES['screenshot']['tmp_name']` 上传文件在服务器上的临时存储位置
  * `$_FILES['screenshot']['error']` 上传文件的错误码，如果是0表示成功，其他表示失败
5. 数据库非常擅长存储文本数据，对于图像等原始二进制数据则不是它的强项，所以最好在数据库中存储图像文件的一个引用，即文件名 `$_FILES['screenshot']['name']`



