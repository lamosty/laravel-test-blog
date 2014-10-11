<?php

use Illuminate\Support\Facades\URL;

class Post extends Eloquent {

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }


    public function createdAtFormatted() {
        return $this->created_at->format('F d, Y');
    }
}
