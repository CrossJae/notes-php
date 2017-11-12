# 串与定制函数

1. 默认情况下MySQL查询不区分大小写
2. `LIKE` 让WHERE语句搜索更灵活，相当于=操作符的更宽松版本。`%`是通配符，代表这个词之前或之后的多个字符。另一个常用的通配符是`_`代表一个字符。
  ```
  WHERE title LIKE '%fighter%';
  ```
3. 为了搜索更准确，将一个串分解为单个词逐个查询。
  * `explode()` php函数将一个串分解为一个子串数组，函数接受两个参数，第一个参数是定界符，可以是一个或者是多个，指示在哪里分解串；第二个是要分解的串。`$search_words = explode(' ', 'Tipper Cow');`
  * `implode()` 由子串构建一个串。`$where_clause = implode(' OR ', $where_list);`有`OR`链接组成一个串。`$where_list`必须是一个串组！
3. 预处理要分解的串
  * `str_replace()` 第一个参数是被替换的字符；第二个参数是新字符；第三个参数是串。`$clean_search = str_replace(',', ' ', 'tightrops, walker, circus')` 替换逗号变成空格，再执行`explode()`对空格进行定位分解。
4. 截取串的一部分
  * `substr()` 第一个参数是被截取的串；第二个参数是开始位置；第三个参数是截取长度 `$job_des = substring('are you a practioner of th lost art of cat', 4, 3)` 第二个参数是负值的话是从右边开始数。
5. 函数避免重复代码，使用函数`function funcName($val){...}`
6. `switch` 语句的使用是避免多层if，多层if解读代码时很困难。
7. 如果数据过多，展示时就要采用分页形式
  * `LIMIT` 一个参数时，表示限制最多显示多少行。如下，最多显示5行
    ```
    SELECT * FROM table_name
      ORDER BY job_title
      LIMIT 5
    ```
  * 两个参数时，第一个参数控制跳过多少行，第二个参数控制返回多少行。如下，返回从第11-15行。
    ```
    LIMIT 10, 5
    ```
  * `mysqli_num_rows()` 返回查询返回的总行数
    ```
    $query = select xxxxxx; // 一个查询语句
    $result = mysqli_query($dbc, $query); // 查询
    $total = mysqli_num_rows($result); // 总行数
    ```
  * `ceil()` 向上取整
  


*-end-*
