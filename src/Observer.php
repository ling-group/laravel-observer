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

        $rightpos = strrpos(__CLASS__, '\\');
        $leftpos = strpos(__CLASS__, '\\');

        $namespace = substr(__CLASS__, 0, $leftpos);
        $observer = substr(__CLASS__, $rightpos + 1);

        $observerClass = sprintf('%s\%s\%s', $namespace, 'Observers', $observer.'Observer');

        self::observe($observerClass);
    }
}
