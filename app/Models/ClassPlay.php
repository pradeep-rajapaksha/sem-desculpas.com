<?php

namespace App\Models;

use App\Models\Firestore;

class ClassPlay extends Firestore
{

    protected static $collection = 'classPlays';
    
    public function __construct() {
        parent::construct();
    }
}
