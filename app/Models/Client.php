<?php

namespace App\Models;

use App\Traits\ColumnFillable;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory,ColumnFillable,CommonTrait;
}
