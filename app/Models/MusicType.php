<?php

namespace App\Models;

use App\Models\Firestore;

class MusicType extends Firestore
{
    protected static $collection = 'MusicTypes';

    public function __construct() {
        parent::construct();
    }

}