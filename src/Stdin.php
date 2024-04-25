<?php

namespace Stdin;

class Stdin 
{
    /**
     * @var $device 输入驱动
     */
    protected $device;

    /**
     * @method __construct
     * @desciption 构造方法
     */
    public function __construct()
    {
        $this->open();
    }

    /**
     * @method __destruct
     * @desciption 析构方法
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * @method line
     * @desciption 获取输入的一行数据
     */
    public function line(string $text = '') : string
    {
        return $this->get($text);
    }

    /**
     * @method get
     * @desciption 获取输入数据
     */
    public function get(string $text = '')
    {
        $this->print($text);
        return $this->scan();
    }

    /**
     * @method char
     * @desciption 获取输入单个(首个)字符
     */
    public function char(string $text = '') : string
    {
        $this->print($text);
        return mb_substr($this->scan(), 0, 1);
    }

    /**
     * @method string
     * @desciption 获取字符字符串类型数据
     * @return string
     */
    public function string(string $text = '') : string
    {
        return $this->get($text);
    }

    /**
     * @method bool
     * @desciption 获取布尔类型数据
     * @return bool
     */
    public function bool(string $text = '') : bool
    {
        return boolval($this->get($text));
    }

    /**
     * @method int
     * @desciption 获取整型数据
     * @return int
     */
    public function int(string $text = '') : int
    {
        return intval($this->get($text));
    }

    /**
     * @method float
     * @desciption 获取浮点型数据
     * @return float
     */
    public function float(string $text = '') : float
    {
        return floatval($this->get($text));
    }

    /**
     * @method array
     * @desciption 输入数组
     * @return array
     */
    public function array(string $text = '') : array
    {
        $arr = [];
        $this->print($text.PHP_EOL);
        $idx = 1;
        while($item = $this->get($idx++ . ':')) {
            $arr[] = $item;
        }
        return $arr;
    }

    // #====== protected methods ======

    /**
     * @method scan
     * @desciption 输入行数据并去除换行字符
     */
    protected function scan() : string
    {
        $line = fgets($this->device);
        return trim($line, PHP_EOL);
    }

    /**
     * @method print
     * @desciption 打印方法
     */
    protected function print(string ...$args)
    {
        $text = implode('', $args);
        $text && print($text);
    }

    /**
     * @method open
     * @desciption 打开驱动
     */
    protected function open()
    {
        $this->device = fopen('php://stdin', 'r');
    }
    
    /**
     * @method close
     * @desciption 关闭驱动
     */
    protected function close()
    {
        fclose($this->device);
    }


}
