<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'tag_id', 'order'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
