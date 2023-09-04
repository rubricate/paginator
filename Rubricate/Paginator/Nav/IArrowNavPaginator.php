<?php 

namespace Rubricate\Paginator\Nav;

interface IArrowNavPaginator
{
    public function getFirst();
    public function getLast();
    public function getPrev();
    public function getNext();
}

