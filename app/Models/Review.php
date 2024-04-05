<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'title',
        'sentences',
        'user_id'
    ];

    public function getJoinedUsers() {
        return $this->select('review.*', 'users.name AS user_name')
                            ->leftjoin('users', 'review.user_id', '=', 'users.id')->paginate(10);
    }

    public function getJoinedUserFirst($id) {
        return $this->select('review.*', 'users.name AS user_name')
                    ->leftjoin('users', 'review.user_id', '=', 'users.id')
                    ->where('review.id', '=', $id)->first();
    }
}
