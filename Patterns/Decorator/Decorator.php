<?php

class HtmlTemplate
{
    // any parent class methods
}

class Template1 extends HtmlTemplate
{
    protected $html;

    public function __construct()
    {
        $this->html = "<p>__text__</p>";
    }

    public function set($html)
    {
        $this->html = $html;
    }

    public function render()
    {
        echo $this->html;
    }
}

class Template2 extends HtmlTemplate
{
    protected $element;

    public function __construct($s)
    {
        $this->element = $s;
        $this->set("<h2>" . $this->_html . "</h2>");
    }

    public function __call($name, $args)
    {
        $this->element->$name($args[0]);
    }
}

class Template3 extends HtmlTemplate
{
    protected $element;

    public function __construct($s)
    {
        $this->element = $s;
        $this->set("<u>" . $this->_html . "</u>");
    }

    public function __call($name, $args)
    {
        $this->element->$name($args[0]);
    }
}