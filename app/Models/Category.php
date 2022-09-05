<?php

namespace App\Models;

use App\Models\Firestore;

class Category extends Firestore
{
    protected static $collection = 'TrainingTypes';

    public function __construct() {
        parent::construct();
    }

}