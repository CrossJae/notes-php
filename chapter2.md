# 连接MySQL

* 数据库由一个特殊的程序管理，称为数据库服务器，比如MySQL。与之交互，要用数据库能理解的语言，比如SQL语言。
* MySQL数据库组织为数据库表，MySQL数据库可以包含多个数据库，一个数据库可以包含多个表。数据存储在表中，表存储在数据库中。
* 访问MySQL需要的信息
  1. 我的MySQL服务器位置（ip地址或者主机名）
  2. 数据库用户名
  3. 数据库口令
  4. 是否成功启动
* 基础语句
  1. 在终端登录到MySQL `mysql -u root -p`
  2. 列出所有数据库 `show database;`
  3. 创建数据库 `create database database_name;`
  4. `use database_name;`
  5. 创建表 `create table table_name;`
  6. 从表中请求数据 `select * from table_name;`
    * 缩小选择范围 `select * from table_name WHERE column_name = 'yes';` 返回column_name列的内容是yes的数据
* 与数据库通信的PHP函数
  1. `mysqli_connect()` 连接数据库，四个参数都是字符串
    1. 第一个参数，数据库位置，可以是域名、IP地址或者localhost
    2. 第二个和第三个参数，用户名和口令
    3. 第四个参数，数据库名称
    ```
    $dbc = mysqli_connect('localhost', 'root', '口令', '数据库名称')
      or die('Error connecting');
    ```
    4. 如果不填写第四个参数，会使用到 `mysqli_select_db()` 告诉服务器使用的数据库是什么
    ```
    $dbc = mysqli_connect('localhost','root','口令');
    mysqli_select_db($dbc, '数据库名称');
    ```
  2. `mysqli_query()` 存储数据or获取数据
  3. `mysqli_close()` 关闭与数据库的连接。用完关闭是个好习惯～数据库服务器同时只允许有一定数量的可用连接
* `die()` PHP函数，终止PHP脚本，并提供失败代码的反馈。
