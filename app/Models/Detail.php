<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Detail extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'name',
            'type',
            'identifier',
            'form'
        ];

        //add: for which form?
    }
