<?php 

namespace Rubricate\Paginator;

class LinkNumberPaginator implements IGetLinkNumberPaginator
{
    private $num;
    
    public function __construct($num)
    {
        $this->num = (int) $num;
    }

    public function getLinkNumber()
    {
        return $this->num;
    } 

}

