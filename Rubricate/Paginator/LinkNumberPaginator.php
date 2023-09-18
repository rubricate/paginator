<?php 

declare(strict_types=1);

namespace Rubricate\Paginator;

class LinkNumberPaginator implements IGetLinkNumberPaginator
{
    private $num;
    
    public function __construct($num)
    {
        $this->num = (int) $num;
    }

    public function getLinkNumber(): int
    {
        return $this->num;
    } 

}

