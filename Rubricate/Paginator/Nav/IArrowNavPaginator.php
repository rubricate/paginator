<?php 

/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/paginator
 * @copyright   2017
 * 
 */



namespace Rubricate\Paginator\Nav;

interface IArrowNavPaginator
{
    public function getFirst();
    public function getLast();
    public function getPrev();
    public function getNext();
}



