<?php

namespace App;

use App\Contracts\Likeable;
use App\Concerns;
use Illuminate\Database\Eloquent\Model;

/**
 * App\NewsItem
 *
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $details
 * @property string $image
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsItem whereUpdatedAt($value)
 */
class NewsItem extends Model implements Likeable
{
    use Concerns\Likeable;

    public $fillable = ['title', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}





