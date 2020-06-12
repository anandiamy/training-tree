<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class TreeIndonesiaNested extends Model
{
    use NodeTrait;

    protected $table = 'tree_indonesia';
}
