<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainOparation;

class CreateTrainModel extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'create_trains';

    protected $fillable = [
        'eng_no',
        'train_no',
        'line',
        'from',
        'to',
        'final_code'
    ];

    public function trainOparation()
    {
        return $this->hasMany(TrainOparation::class, 'index', 'id');
    
    }

   
}

