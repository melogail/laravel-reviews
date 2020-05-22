<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Date: 16/01/2020
 * Time: 03:13 م
 */

namespace Melogail\LaravelReviews\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    /**
     * Targeted table
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * Mass-assignment fields
     *
     * @var array
     */
    protected $fillable = [
        'reviewer_id', 'title', 'body', 'parent_id', 'rate', 'approved', 'model_id', 'model_type'];

    /**
     * Guarded fields from mass assignment check
     *
     * @var array
     */
    protected $guarded = ['id', 'create_at', 'updated_at'];


    /**
     * Polymorphic relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model()
    {
        return $this->morphTo();
    }

    /**
     * test relation with user
     */
    public function reviewer()
    {
        return $this->belongsTo(config('laravel-reviews.models.reviewer.class'),'reviewer_id' );
    }

}
