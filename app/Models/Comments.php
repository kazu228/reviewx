<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'sentences',
        'review_id'
    ];

    public function getCommentByReviewId($review_id) {
        return $this->select('*')->where('review_id', '=', $review_id)->get();
    }

}
