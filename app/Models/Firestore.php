<?php

namespace App\Models;
/**
 * 
 */
class Firestore
{
    protected static $collection;

    public function __construct() { 

    }

    public static function db() {
        return app('firebase.firestore')->database();
    }

    public static function getAll() {
        $collection = self::db()->collection(static::$collection);
        $documents = $collection->documents();
        
        if($documents->rows()) {
        	$data = array_map(function ($row) {
		        		return $row->data();
		        	}, $documents->rows());
        	
        	return $data;
        }

        return [];
    }

    public static function getWhere($field = null, $value = null) {
        if(empty($field)) {
            return [];
        }

        $collection = self::db()->collection(static::$collection);
        $query = $collection->where($field, '=', $value);
        $documents = $query->documents();
        if($documents->rows()) {
            $data = array_map(function ($row) {
                        $__row = $row->data();
                        foreach ($row->reference()->collections() as $key => $__collection) {
                            // get sub collection data into parent as array
                            $__row[$__collection->id()] = array_map(function ($row) {
                                                                return $row->data();
                                                            }, $__collection->documents()->rows());
                        }
                        return $__row;
                    }, $documents->rows());
            
            return $data;
        }

        return [];
    }

    public static function find($ref = null) {
        $collection = self::db()->collection(static::$collection);
        $document = $collection->document($ref);

        // sub collection
        // $document->collection('classUsers')->documents()->rows();

        $snapshot = $document->snapshot();
        if($snapshot->exists()) {
        	$data = $snapshot->data();
            
            foreach ($document->collections() as $key => $collection) {
                // get sub collection data into parent as array
                $data[$collection->id()] = array_map(function ($row) {
                                                            return $row->data();
                                                        }, $collection->documents()->rows());
            }

            return $data;
        }

        return [];
    }

    /*
     * @param string $ref parent document id
     * @param array $data
     * @param string $sub sub collection name
    */
    public static function createDocument($ref = null, $data = [], $sub = null)
    {
        if(empty($ref) Or empty($data)) {
            return [];
        }

        try {
            $collection = self::db()->collection(static::$collection);
            $documentRef = $collection->document($ref);

            if(!empty($sub)) { // create sub collection documents            
                $documentNew = $documentRef->collection($sub)->newDocument();
            } 
            else {
                $documentNew = $collection->newDocument();
            }

            $response = $documentNew->create($data);
            return true;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function deleteDocument($ref = null)
    {
        try {
            $collection = self::db()->collection(static::$collection);
            $document = $collection->document($ref);

            $response = $document->delete();
            return true;            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    /*
     * @param string $ref
     * @param array $data
     * @param array $sub ref: document id, collection: sub collection name
    */
    public static function updateDocument($ref = null, $data = [], $sub = [])
    {   
        if(empty($ref) Or empty($data)) {
            return [];
        }

        try {
            $collection = self::db()->collection(static::$collection);
            $documentRef = $collection->document($ref);

            $decorated = array_map(fn ($key, $value) => ['path' => $key, 'value' => $value], array_keys($data), $data);

            if(!empty($sub) && !empty($sub['collection']) && !empty($sub['ref']) ) {
                $document = $documentRef->collection($sub['collection'])->document($sub['ref']);
            }
            else {
                $document = $documentRef;
            }

            $response = $document->update($decorated);
            return true;

        } catch (Exception $e) {
            // dd($e);
            return $e->getMessage();
        }
    }
}