<?php 

/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/paginator
 * @copyright   2017
 * 
 */



namespace Rubricate\Paginator;

class TotalPaginator implements IGetTotalPaginator
{
    private $total;
    
    public function __construct($total)
    {
        $this->total = (int) $total;
    }



    public function getTotal()
    {
       return  $this->total;
    } 
    
}    


