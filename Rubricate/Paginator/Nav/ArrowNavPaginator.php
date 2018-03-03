<?php 

/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/paginator
 * @copyright   2017
 * 
 */



namespace Rubricate\Paginator\Nav;

use Rubricate\Paginator\IGetCurrentNumberPaginator;

class ArrowNavPaginator implements IArrowNavPaginator
{

    private $first;
    private $last;
    private $next;
    private $prev;

    private $currentNumber;
    private $totalRows;


    public function __construct(
        IGetCurrentNumberPaginator $currentNumber,
        $totalRows 
    ) {
        $this->currentNumber = $currentNumber;
        $this->totalRows     = $totalRows;

        self::init();
    }



    public function getFirst()
    {
        return  $this->first;
    } 


    public function getLast()
    {
        return $this->last;
    } 


    public function getPrev()
    {
        return $this->prev;
    } 


    public function getNext()
    {
        return $this->next;
    } 




    private function init()
    {
        $total   = $this->totalRows;
        $currNum = $this->currentNumber->getCurrentNumber();
        $first   = ($currNum != 1)? 1: null;
        $last    = ($currNum != $total)? $total: null;
        $plus    = ($currNum - 1)? ($currNum - 1): null;
        $less    = (($currNum + 1) <= $total)? ($currNum + 1): null;


        $this->first = $first;
        $this->last  = $last;
        $this->prev  = $plus;
        $this->next  = $less;
    } 






}    

