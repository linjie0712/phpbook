<?php
/**
 * 单例模式的示例
 */
class Singleton{
    private static $instance;

    /**
     * 对外调用时，采用此方法
     */
    public static function getInstance(){
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * 构建方法被禁止访问
     */
    private function __construct(){
    }

    /**
     * 克隆方法被禁止访问
     */
    private function __clone(){
    }

    /**
     * 唤醒方法被禁止访问
     */
    private function __wakeup(){
    }
}