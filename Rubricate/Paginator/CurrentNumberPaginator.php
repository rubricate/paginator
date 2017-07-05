<?php 

/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/paginator
 * @copyright   2017
 * 
 */



namespace Rubricate\Paginator;

class CurrentNumberPaginator implements IGetCurrentNumberPaginator
{
    private $currentNumber;

    public function __construct($num)
    {
        $num = (int) $num;
        $currentNumber = ($num) ? $num : 1;




        $this->currentNumber = (int) $currentNumber;
    }



    public function getCurrentNumber()
    {
        return  $this->currentNumber;
    }



}    


