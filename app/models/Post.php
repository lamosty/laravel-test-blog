<?php

use Illuminate\Support\Facades\URL;

class Post extends Eloquent {

    protected $fillable = array(
        'post_title',
        'post_excerpt',
        'post_content',
        'post_slug'
    );

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }


    public function createdAtFormatted() {
        return $this->created_at->format('F d, Y');
    }

    public function comments() {
        return $this->hasMany('Comment');
    }

    public function getCreatedAtMonthYear() {
        return $this->created_at->format('F Y');

    }

    public function getCreatedAtYear() {
        return $this->created_at->format('Y');
    }
}
