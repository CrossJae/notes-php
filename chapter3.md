# 创建与填充数据

1. 定义数据类型
  * 创建表的时候 `create table table_name (column_name1 column_type1, column_name2 column_type2, ...)` ，表的每一列数据都要明确其数据类型。比如文本、正数、小数等
  * 文本数据的储存会比整数数据占用更大空间
  * MySQL数据类型
    1. `CHAR` `CHARACTER` 定长的文本，比如表示是/否，用的数据类型 `CHAR(1)`
    2. `INT` `INTEGER` 整数
    3. `BLOB` 二进制
    4. `TEXT` 文本，比`CHAR`和 `VARCHAR` 多得多的文本
    5. `DATE` 日期，不包括时间！
    6. `VARCHAR` 灵活的文本，比如最多十个字符 `VARCHAR(10)`
    7. `DATETIME` `TIMESTAMP` 日期和时间
    8. `DEC` `DECIMAL` 小数，比如价格 48.99 `DEC(4,2)` 4,2表示小数点前后位数
    9. `TIME` 时间，不包括日期！
2. 展示数据结构 `DESCRIBE table_name`
  * describe 只展示数据结构，不展示具体数据！
3. 删除表 `DROP TABLE table_name`
  * 表一旦创建就一直存在，不会被create table覆盖！
4. 筛选数据
  * 选择名字为Martin的所有数据 `select * from email_list where first_name = 'Martin';`
  * 只选择名为Bubba的客户姓 `select last_name from email_list where first_name = 'Bubba';`
  * 选择邮件地址为ls@mail.com的客户名和姓 `select first_name, last_name from email_list where email = 'ls@mail.com';`
  * 选择叫 McCarthy Amber的客户 `select * from email_list where first_name = 'Amber' and last_name = 'McCarthy';`
5. 获取查询数据 `mysqli_fetch_array()`
  * 查询成功后，只会返回一个资源号
  ```
  $query = "select * frome email_list";
  $result = mysqli_query($dbc, $query);
  echo $result; // resource id #3

  $row = mysqli_fetch_array($result);
  ```
6. while循环
7. mail函数 `mail(to, subject, msg, 'From:' . from);`
8. 删除数据 `delete from table_name`(全部删除！！)
  * 有选择的删除某一项 `delete from table_name where email = 'ls@mail.com';`
