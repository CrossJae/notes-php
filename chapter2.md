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
