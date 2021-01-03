<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected static function booted() {
        //Commentaire non creer qi le user nest pas du meme groupe
        static::creating(function ($comment) {
            return !is_null($comment->photo->group->users->find($comment->user_id));
        });
    }

    /**
     * Renvoi l'utilisateur a qui appartient la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function photo()
     {
         return $this->belongsTo(Photo::class);
     }

    /**
     * Renvoi l'utilisateur qui a repondu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     //Renvoi les reponses des users au comment
    public function replyTo()
     {
        return $this->belongsTo(Comment::class,'comment_id','id');
     }
     //Renvoi les reponses aux comment
    public function replies()
     {
         return $this->hasMany(Comment::class);
     }
}
