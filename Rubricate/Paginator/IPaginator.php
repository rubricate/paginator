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

interface IPaginator extends
    IGetTotalPaginator,  IGetPerPagePaginator, 
    IGetNumberPaginator, IGetArrowPaginator, 
    IGetOffsetPaginator, IHaveToPaginatePaginator
{

}
