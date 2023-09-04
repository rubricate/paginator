<?php 

namespace Rubricate\Paginator;

class PerPagePaginator implements IGetPerPagePaginator
{
    private $num;
    
    public function __construct($num)
    {
        $this->num = (int) $num;
    }

    public function getPerPage()
    {
        return  $this->num;
    } 
}

