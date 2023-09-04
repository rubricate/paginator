<?php 

namespace Rubricate\Paginator;

interface IPaginator extends
    IGetTotalPaginator,  IGetPerPagePaginator, 
    IGetNumberPaginator, IGetArrowPaginator, 
    IGetOffsetPaginator, IHaveToPaginatePaginator
{

}

