<?php 

declare(strict_types=1);

namespace Rubricate\Paginator;

class TotalPaginator implements IGetTotalPaginator
{
    private $total;
    
    public function __construct($total)
    {
        $this->total = (int) $total;
    }

    public function getTotal(): int
    {
        return  $this->total;
    } 
}    

