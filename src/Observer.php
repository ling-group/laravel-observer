<?php

namespace Superman2014\Observers;

trait Observer
{

    public static function table() {
        $model = new static;

        return $model->getTable();
    }

    public static function boot() {
        parent::boot();

        $middle = strrpos(__CLASS__, '\\');

        $namespace = substr(__CLASS__, 0, $middle);
        $observer = substr(__CLASS__, $middle + 1);

        $observerClass = sprintf('%s\%s\%s', $namespace, 'Observers', $observer.'Observer');

        self::observe(new $observerClass());
    }
}
