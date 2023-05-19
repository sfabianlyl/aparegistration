<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Participant extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'name',
            'email',
            'ic',
            'age',
            'involvement',
            'gender',
            'differently_abled',
            'leadership',
            'accomodation',
            'diet',
            'phone',
            'allergy',
            'entity_id',
            'details',
            'user_id',
            'staff'
        ];

        
    }
