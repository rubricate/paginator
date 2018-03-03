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

