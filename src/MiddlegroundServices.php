<?php
namespace Lrh\MiddlegroundRequest;

class MiddlegroundServices
{

    const TYPE_XLS = 'xls'; //表格功能
    const TYPE_PAY = 'pay'; //支付功能
    const TYPE_MSG = 'msg'; //短信功能

    public $type = self::TYPE_XLS;
    public $mode;
    public $option = [];

    /**
     * @param string $url 技术中台的域名
     * @param string $type TYPE_XLS:表格功能,TYPE_PAY:支付功能 TYPE_MSG:短信功能
     */
    public function __construct($type = self::TYPE_XLS)
    {
        $this->type = $type;

        if ($type == self::TYPE_XLS) {
            $this->mode = new XLSXWriter();
        }

        if ($type == self::TYPE_MSG) {
            $this->mode = new MsgServices();
        }

        if ($type == self::TYPE_PAY) {
            $this->mode = new PayServices();
        }
    }


    /**
     * 设置执行的参数
     * 
     * @param array $option
     * @return string 返回错误的日志
     */
    function setOption($option) {
        // $this->option = $option;

        if ($this->type == self::TYPE_XLS) {
            if (empty($option['url'])) {
                return '未指定技术中台的域名';
            }
            if (empty($option['name'])) {
                return '未指定表格名称';
            }
            if (empty($option['exportData'])) {
                return '未指定导出的内容';
            }

            $count = count($option['exportData']);
            if ($count > 150000) {
                return '目前限制只能导小于15W条数据';
            }
            $option['exportData'] = json_encode($option['exportData'], true);
        }

        if ($this->type == self::TYPE_MSG) {
            
        }

        if ($this->type == self::TYPE_PAY) {
            
        }
        $this->option = $option;
        return '';
    }

    /**
     * 执行动作
     * 
     */
    function run() {

        if ($this->type == self::TYPE_XLS) {
            $ret = $this->mode->run($this->option);
        }

        if ($this->type == self::TYPE_MSG) {
            $ret = $this->mode->run($this->option);
        }

        if ($this->type == self::TYPE_PAY) {
            $ret = $this->mode->run($this->option);
        }

        return $ret;
    }
}