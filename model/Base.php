<?php
namespace Model;

/**
  * Model base class
  *
  * PHP version 7.0.10
  *
  * @author    Genadijs Aleksejenko <agenadij@gmail.com>
  * @copyright 2021 Genadijs Aleksejenko
  */
class Base
{
    public  $App;

    /**
     * Constructor
     *
     * @param onject $App App object
     * @return void
     */
    public function __construct($App)
    {
        $this->App = $App;
    }
}
