# middlegroundrequest

使用例子

use Lrh\MiddlegroundRequest\MiddlegroundServices;

$type = MiddlegroundServices::TYPE_XLS; //表格导出功能
$option = [
    'url' => 自建的技术中台的域名,
    'name' => 定义导出表格的名称,
    'exportData' => 导出内容的数组,
];

//$type = MiddlegroundServices::TYPE_PAY; //支付功能(未实现)
//$type = MiddlegroundServices::TYPE_MSG; //短信功能(未实现)
//$type = MiddlegroundServices::TYPE_DB; //并发查询

//初始化
$middlegroundS = new MiddlegroundServices($type);
//设置参数
$middlegroundS->setOption($option);
//执行操作
$res = $middlegroundS->run();//返回执行结果(由技术中台决定)： ['code' => 200|400, 'msg' => 描述信息, 'data' => ['fileName' => 下载文件的网址]]
  

