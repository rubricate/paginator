<?php

declare(strict_types=1);

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

    public function getTotal(): int
    {
        return $this->total->getTotal();
    }

    public function getNumber(): object
    {
        return  $this->numberNav;
    } 

    public function getArrow(): object
    {
        return  $this->arrowNav;
    } 

    public function getPerPage(): int
    {
        return $this->perPage->getPerPage();
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function haveToPaginate(): bool
    {
        return ($this->totalRows > 1); 
    } 
}

