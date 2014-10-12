<?php

use Illuminate\Support\Facades\URL;

class Comment extends Eloquent {

    protected $fillable = array('content');

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }

    public function content() {
        return nl2br($this->content);
    }

    public function post() {
        return $this->belongsTo('Post');
    }

    public function createdAtFormatted() {
        return $this->created_at->format('F d, Y');
    }
}
