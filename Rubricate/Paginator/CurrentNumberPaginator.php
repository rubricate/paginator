<?php 

namespace Rubricate\Paginator;

class CurrentNumberPaginator implements IGetCurrentNumberPaginator
{
    private $currentNumber;

    public function __construct($num)
    {
        $num                 = (int) $num;
        $currentNumber       = ($num) ? $num : 1;
        $this->currentNumber = (int) $currentNumber;
    }

    public function getCurrentNumber()
    {
        return  $this->currentNumber;
    }

}    

