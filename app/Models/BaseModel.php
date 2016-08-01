<?php
namespace App\Models;

use App\Models\Traits\ErrorTrait;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
	use ErrorTrait, SoftDeletes;

	public $timestamps = true; 
}