# 绘制动态图像

1. 所有web表单都存在受到垃圾邮件机器人攻击的风险。垃圾邮件机器人会在表单中插入广告。所有输入表单都是不安全的。所以表单需要一个新的检验域，是真正人类才能做的，比如验证码，验证码图片上随机的 *直线和点* 有助于模糊文本，阻止光学字符识别。PHP提供了图像功能，可以动态地生成图像，然后使用html代码显示。在PHP中绘制动态图像需要使用GD库函数（Graphics Draw）。
2. `rand()`和`chr()`
  * `rand()` 返回随机整数，参数是取值范围。`rand(97,122)`
  * `chr()` 将一个数字ascii字符码（97-122）转换为一个字符
  ```
  define('CAPTCHA_NUMBERS', 6);
  $pass_phrase = '';
  for($i=0;$i<CAPTCHA_NUMBERS;$i++){
    $pass_phrase .= chr(rand(97,122));
  }
  ```
3. GD库函数
  * `$img = imagecreatetruecolor(width,height)` 新建一个width * height的黑色块
  * `$bg_color = imagecolorallocate($img, 255, 255, 255)` 绘制白色
  * `imagefilledrectangle($img, 0, 0, width, height, $bg_color)` 填充为白色背景
  * `imageline($img, 0, rand()%height, width, rand()%height, $graphic_color)` 绘制随机直线
  * `imagesetpixel($img, rand() % width, rand()%height, $graphic_color)` 绘制随机点
  * `imagttftext($img, 18, 0, 5, height-5, $text_color, 'Courier New Bold.ttf', $pass_phrase)` 绘制文本
  * `imagepng($img)`返回png


*-end-*
