<?php

namespace App\Models;

use App\Models\Firestore;

class Classes extends Firestore
{
    protected static $collection = 'classes';

    const PENDING   = "pending";
    const PUBLISHED = "published";
    const REJECTED  = "rejected";
    const DRAFT     = "draft";

    public function __construct() {
        parent::construct();
    }

    public function create($ref, $data, $sub = null)
    {
        return self::createDocument($ref, $data, $sub);
    }

    public function update($ref, $data, $sub = [])
    {
        return self::updateDocument($ref, $data, $sub);
    }
}