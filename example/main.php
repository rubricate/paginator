<?php 

require '../vendor/autoload.php';

use Rubricate\Paginator\Paginator;
use Rubricate\Paginator\TotalPaginator;
use Rubricate\Paginator\PerPagePaginator;
use Rubricate\Paginator\CurrentNumberPaginator;
use Rubricate\Paginator\LinkNumberPaginator;


if( !function_exists('anchor') ) 
{
    function anchor($link, $name)
    {
        return sprintf('<a href="%s">%s</a>', $link, $name);
    }
}



$currNum = (isset($_GET['page'])) ? (int) $_GET['page']: 0;
$url = 'http://127.0.0.1/github/rubricate/paginator/example/main.php?page=';
$currStr = '<b style="color: #c00;">%s</b>';



$page = new Paginator(
    new TotalPaginator(200),
    new PerPagePaginator(10),
    new CurrentNumberPaginator($currNum),
    new LinkNumberPaginator(2)
);


if( $page->haveToPaginate() )
{
    echo ( !$page->getArrow()->getFirst() ) ? 
        'First |' : 
        anchor( $url . $page->getArrow()->getFirst(), 'First' );

    echo ' ';

    echo ( !$page->getArrow()->getPrev() ) ? 
        'Previous' : 
        anchor($url . $page->getArrow()->getPrev(), 'Previous');
    echo ' ';

    echo ' - ';

    foreach ( $page->getNumber()->getAll() as $num )
    {
        echo ( $page->getNumber()->getCurrent() == $num ) ? 
            sprintf($currStr, $num) : anchor($url . $num, $num);
        echo ' - ';
    }

    echo ( !$page->getArrow()->getNext() ) ? 
        'Next' : anchor($url . $page->getArrow()->getNext(), 'Next');
    echo ' ';

    echo ( !$page->getArrow()->getLast() ) ? 
        '| Last' : anchor($url . $page->getArrow()->getLast(), 'Last');
    echo ' ';

}


## SQL string
/*

$sql = 'SELECT * FROM tb_lorem LIMIT 10 OFFSET ' . $page->getOffset();

 */


