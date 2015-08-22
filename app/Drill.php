<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drill extends Model
{
    /**
     * Type casting attributes
     * @var array
     */
    protected $casts = ['age_id' => 'array', 'principle_id' => 'array'];

    /**
     * Returns the age group names
     *
     * @return string
     */
    public function getAgeGroupsAttribute()
    {
        $out = array();
        foreach ($this->age_id as $id) {
            $ageGroup = AgeGroup::where('id', $id);
            if ($ageGroup->count() === 1) {
                $out[] = $ageGroup->first()->name;
            }
        }
        return join(', ', $out);
    }

    /**
     * Returns the principle names
     *
     * @return string
     */
    public function getPrinciplesAttribute()
    {
        $out = array();
        foreach ($this->principle_id as $id) {
            $principle = Principle::where('id', $id);
            if ($principle->count() === 1) {
                $out[] = $principle->first()->name;
            }
        }
        return join(', ', $out);
    }

    /**
     * Focus model data
     *
     * @return array
     */
    public function stage()
    {
        return $this->belongsTo('App\Stage');
    }
}
