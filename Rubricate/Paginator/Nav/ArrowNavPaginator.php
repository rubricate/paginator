<?php 

declare(strict_types=1);

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

    public function getFirst(): ?int
    {
        return  $this->first;
    } 

    public function getLast(): ?int
    {
        return $this->last;
    } 

    public function getPrev(): ?int
    {
        return $this->prev;
    } 

    public function getNext(): ?int
    {
        return $this->next;
    } 

    private function init()
    {
        $total   = (int) $this->totalRows;
        $currNum = (int) $this->currentNumber->getCurrentNumber();
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

