<?php

namespace App\Models;

class Listing {
    public static function all(){
        return [
            [
                'id' => 1, 
                'title' => 'First listing',
                'description' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit.',
            ],
            [
                'id' => 2,
                'title' => 'Second listing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta.',
            ],
            [
                'id' => 3,
                'title' => 'Third listing',
                'description' => 'Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ]
        ];
    }

    public static function find($id){
        $listings = static::all();
        return $listings[$id - 1];
    }
}