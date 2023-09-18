<?php 

declare(strict_types=1);

namespace Rubricate\Paginator;

class PerPagePaginator implements IGetPerPagePaginator
{
    private $num;
    
    public function __construct($num)
    {
        $this->num = (int) $num;
    }

    public function getPerPage(): int
    {
        return  $this->num;
    } 
}

