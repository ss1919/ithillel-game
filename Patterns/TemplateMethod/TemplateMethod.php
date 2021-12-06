<?php


abstract class Builder
{
    //Template Method
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}

    //realization
class AndroidBuilder extends Builder
{
    public function test()
    {
        echo 'Старт Android тестов';
    }

    public function lint()
    {
        echo 'Анализ Android кода';
    }

    public function assemble()
    {
        echo 'Сборка Android';
    }

    public function deploy()
    {
        echo 'Развертывание Android';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'Старт iOS тестов';
    }

    public function lint()
    {
        echo 'Анализ iOS кода';
    }

    public function assemble()
    {
        echo 'Сборка iOS';
    }

    public function deploy()
    {
        echo 'Развертывание iOS';
    }
}

    //use
    $androidBuilder = new AndroidBuilder();
    $androidBuilder->build();

    $iosBuilder = new IosBuilder();
    $iosBuilder->build();