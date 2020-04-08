<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Elogail
 * Date: 16/01/2020
 * Time: 04:51 م
 */

namespace Ogail\LaravelReviews\Traits;


use Ogail\LaravelReviews\Models\Review;

trait Reviewable
{

    /**
     * @return mixed
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'model');
    }

    /**
     * Get average rate
     *
     * @return mixed
     */
    public function avgRate()
    {
        return round($this->reviews()->avg('rate'), 2);
    }

    /**
     * Add new review
     *
     * @param array $data
     * @return mixed
     */
    public function addReview($data = [])
    {
        return $this->reviews()->create($data);
    }

    /**
     * Update currently added review
     *
     * @param $reviewer_id
     * @param $model_id
     * @param array $data
     * @return
     */
    public function updateReview($reviewer_id, $model_id, $data = [])
    {
        $review = $this->reviews()->where(['reviewer_id' => $reviewer_id, 'model_id' => $model_id, 'model_type' => get_class($this)])->first();

        return $review->update($data);
    }

    /**
     * Get reviewer reviews, ex. user reviews for product
     *
     * @param $reviewer_id
     * @return mixed
     */
    public function getReviewerReviews($reviewer_id)
    {
        return $this->reviews()->where('reviewer_id', $reviewer_id)->get();
    }
}