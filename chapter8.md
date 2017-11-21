# 控制你的数据

1. 模式schema就是数据中所有结构以及它们之间如何连接的一个表示。
2. 外键foreign key是一个表中的一列，它引用了另一个表的主键primary key
  * 外键的使用
    1. 一对一 one to one：父表中的一行与子表中的一行关联
    2. 一对多：父表中的一行与子表中的多行关联
    3. 多对多：父表中的多行与子表中的多行关联
3. `array_push()` 追加数组函数
4. 三元操作符，并不能在性能上得到提升，但会让代码拥有易读性。
```
echo '<input type="type" name="' . $response['$response_id'] . '" value="1" ' .
($response['responss'] == 1 ? 'checked="checked"' : '') . ' />love ';
```
5. `mysqli_num_rows()` chapter9有解释
6. 规范化：消除重复数据，并采用一种合理一致的方式分解和连接表。规范化是一个相当深奥的数据库设计主题，可能让人心生恐惧。
  * 以下是简单的数据库设计步骤：
    1. 选择对象，即希望用表来描述的对象。（你希望表描述的主题对象是什么？）
    2. 建立使用表时关于对象所需了解的一个信息列表。（你如何使用这个表？）
    3. 使用这个列表，将对象的有关信息分解为组织表时可用的多个部分。（如何最容易的查询表？）
  * 规范化的一个基本概念是：原子数据的思想。就是在给定数据库用途的前提下，分解为最小形式的有意义的数据。
  * 规范化的好处：不会出现重复数据，缩小数据库的规模；要搜索的数据更小，查询的更快
7. 创建
  ```
  CREATE TABLE table_name (
    category_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(48) NOT NULL,
    PRIMARY KEY (category_id)
  )
  ```
8. 更多的表，导致了更混乱的查询，联接join可以解决这个问题。INNER JOIN是内联的意思，ON后面的括号里填写的是条件。注意一点：WHERE子句中的具体比较会应用到原表，而不是查询结果。
  ```
  SELECT table_name1.column_name1, table_name2.column_name2
    FROM table_name1
    INNER JOIN table_name2
    ON (table_name1.column_name3 = table_name2.column_name3)
    WHERE table_name1.column_name2 = 'xxx'
  ```
9. 如果ON条件判断的列表名相同，可以用`USING`简化ON
  ```
  SELECT table_name1.column_name1, table_name2.column_name2
    FROM table_name1
    INNER JOIN table_name2
    USING (column_name3)
  ```
10. 引用别名`AS`进一步简化INNER JOIN。原来的表列不太明确时，别名还可以用来对结果数据重命名。
  ```
  SELECT mt.column_name1, mc.column_name2
    FROM table_name1 AS mt
    INNER JOIN table_name2 AS mc
    USING (column_name3)
    WHERE mt.column_name2 = 'xxx'
  ```
11. 可以联接多个表
  ```
  INNER JOIN table_name2 AS mt USING (column_name3)
  INNER JOIN table_name3 AS mc USING (tegory_id)
  ```
12. 其他类型的联接
  * 相等联接
  * 非相等联接
  * 自然联接
  * 外联接
13. 同时循环两组数组，`for` 方法。其中`count()`方法返回数组中元素的个数。
  ```
  for($i = 0; $i<count($user_responses); $i++){
    if($user_responses[$i]['response'] + $mismatch_responses[$i]['response'] == 3 ){
      ...
    }
  }
  ```

*-end-*
