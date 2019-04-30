<?php

namespace App;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category', 'image'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

//    public function user() {
//        return $this->belongsTo(User::class);
//    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function addComment($body) {
        $comment = new Comment();
        $comment->body = $body;
        $comment->user_id = Auth::id();
        $this->comments()->save($comment);
    }

    public function scopeFilter($query, $filters) {
        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
