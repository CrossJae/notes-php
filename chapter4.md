# 实际应用

1. 数据验证，客户端验证（js）或者服务端验证（php）
  * 虽然客户端验证也能解决大部分问题，服务端验证是捕获不良数据的最后一道防线，所以不能忽视服务端验证。
2. `if{}else{}`
  * 多层嵌套，不如分别判断。尽量减少嵌套！
  ```
  if( 条件1 && 条件2 ){
    ...
  }else {
    if( 条件2 || 条件2 ){
      ...
    }else{
      ...
    }
  }else{
    ...
  }
  ```
  ```
  // 改进
  if( 条件1 && 条件2 ){
    ...
  }
  if(...){
    ...
  }
  ```
3. `isset()` 测试变量是否存在
  ```
  // callback存在时
  $callback = isset($_GET['callback']) ? $_GET['callback'] : '';
  ```
  * 无法分辨空表单与已填充表单的区别，所以确定表单是否填写内容，用`empty()`
  ```
  $inputVal = $_POST['message']; // 表单的message输入框
  if(isset($inputVal)){
     echo "已经填好"; // 不论message是否填内容，提交后，页面都会打印结果，如果换成empty()就好了
  }
  ```
  * `isset()` 可以用来检验表单是否提交过，比如
  ```
  if(isset($_POST['submit'])){...}
  ```
4. `empty()` 确定变量是否是空值，php中空值表示0、空串、false、null，如果是空值，返回true
5. 表单
  ```
  <form action="xxx.php" method="post"></form>
  ```
6. 储存当前脚本的名 `$_SERVER['PHP_SELF']`
  ```
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"></form>
  ```

  
* todo
[] html和php混合写在一起，用php来判断显示某一段html，而不是使用php拼接html字符串
[] 删除重复数据
