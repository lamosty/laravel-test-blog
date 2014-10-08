<?php

use Illuminate\Support\Facades\URL;

class Post extends Eloquent {

    public function author() {
        return $this->belongsTo('User', 'user_id');
    }

    private function formatDate($date) {
        return $date;
    }

    public function createdAtFormatted() {
        return $this->formatDate($this->created_at);
    }
}
