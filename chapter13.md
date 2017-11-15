# 其他补充

1. PHP异常处理
  * try catch
  * throw
  ```
  <?php
    function checkBalance($balance){
      if($balance < 1000){
        throw new Exception('balance is less than 1000');
      }
      return true;
    }
    try{
      checkBalance(999);
      echo 'balance is above 1000';
    }
    catch(Exception $e){
      echo 'error:' . $e->getMessage();
    }
  ?>
  ```
2. 面向对象的php语言
  * 好处：重用性好
  * 缺点：代码冗长，编写时间长
3. 安全
  * xss 跨网站脚本攻击 cross-site scripting
    * 一般发生在用户提交数据的网站
    * 现象：将结果页重定向到被控制的网站 `location.href`
    * 还可以盗取cookie信息
    * 防御的方法：删除输入框中的脚本代码、验证表单信息
4. 操作符优先级
  1. `++ --`
  2. `*/%`
  3. `+ - .`
  4. `< <= > >= <>`
  5. `== != === !==`
  6. `&&`
  7. `||`
  8. `= += -= *= /= .= %= &= |= ^=`
  9. `and`
  10. `xor`
  11. `or`

*-end-*
