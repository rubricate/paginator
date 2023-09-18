<?php 

declare(strict_types=1);

namespace Rubricate\Paginator\Nav;

use Rubricate\Paginator\IGetCurrentNumberPaginator;
use Rubricate\Paginator\IGetLinkNumberPaginator;

class NumberNavPaginator implements INumberNavPaginator
{
    private $_currentNumber;
    private $_linkNumber;
    private $_totalRows;

    private $_numberArr = [];
    private $_numberPrevious;
    private $_numberNext;

    public function __construct(
        IGetCurrentNumberPaginator $currentNumber,
        IGetLinkNumberPaginator    $linkNumber,
        $totalRows 
    ) {
        $this->_currentNumber   = $currentNumber;
        $this->_linkNumber      = $linkNumber;
        $this->_totalRows       = $totalRows;

        self::_init();
    }

    public function getCurrent(): int
    {
        return $this->_currentNumber->getCurrentNumber();
    } 

    public function getAll(): array
    {
        return $this->_numberArr; 
    } 

    private function _init(): void
    {
        self::_setPrevNext();
        self::_setNumberAll();
    } 

    private function _setPrevNext(): void
    {
        $curr       = self::getCurrent();
        $linkNum    = $this->_linkNumber->getLinkNumber();
        $total      = $this->_totalRows;

        $prev = $curr - $linkNum;
        $next = $curr + $linkNum;

        $this->_numberPrevious  = ($prev < 1)? 1 : $prev;
        $this->_numberNext      = ($next > $total) ? $total : $next;

    } 

    private function _setNumberAll(): void
    {
        $start = $this->_numberPrevious; 
        $total = $this->_numberNext; 

        for ($i = $start; $i <= $total; $i++){
            $this->_numberArr[] = $i;
        }
    } 

}    

