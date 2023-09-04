<?php

namespace Rubricate\Paginator;

use Rubricate\Paginator\Nav\NumberNavPaginator;
use Rubricate\Paginator\Nav\ArrowNavPaginator;

class Paginator implements IPaginator
{
    private $total;
    private $perPage;
    private $offset;

    private $currentNumber;
    private $totalRows;
    private $linkNumber;
    private $numberNav;
    private $arrowNav;

    public function __construct(
        IGetTotalPaginator          $total, 
        IGetPerPagePaginator        $perPage, 
        IGetCurrentNumberPaginator  $currentNumber, 
        IGetLinkNumberPaginator     $numberLink
    ) {
        $this->total         = $total;
        $this->perPage       = $perPage;
        $this->currentNumber = $currentNumber; 

        $t = self::getTotal();
        $p = self::getPerPage();
        $c = $this->currentNumber->getCurrentNumber();

        $this->offset    = ($p * $c - $p);
        $this->totalRows = (ceil($t / $p));

        $this->numberNav = new NumberNavPaginator(
            $this->currentNumber, $numberLink,
            $this->totalRows
        );

        $this->arrowNav = new ArrowNavPaginator(
            $this->currentNumber,
            $this->totalRows
        );

    }

    public function getTotal()
    {
        return $this->total->getTotal();
    }

    public function getNumber()
    {
        return  $this->numberNav;
    } 

    public function getArrow()
    {
        return  $this->arrowNav;
    } 

    public function getPerPage()
    {
        return $this->perPage->getPerPage();
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function haveToPaginate()
    {
        return ($this->totalRows > 1); 
    } 
}

