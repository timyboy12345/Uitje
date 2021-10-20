<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FrequentlyAskedQuestion
 *
 * @property string id
 * @property string title
 * @property string content
 * @property string subject
 * @property string organization_id
 * @package App\Models
 */
class FrequentlyAskedQuestion extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = ['title', 'content', 'subject'];

    public function relatedQuestions()
    {
        return FrequentlyAskedQuestion::where('subject', $this->subject)
            ->where('id', '!=', $this->id)
            ->get();
    }

    public function getParsedSubjectAttribute()
    {
        if (ReservationType::where('id', '=', $this->subject)->exists()) {
            return ReservationType::find($this->subject)->title;
        }

        return $this->subject;
    }
}
