<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Error
 * @package App\Models
 *
 * @property integer $id
 * @property string $file_name
 * @property integer $entry_number_in_file
 * @property string[] $errors
 */
class Error extends Model
{
    public $timestamps = false;
    protected $dates = ['created_at'];

    protected $fillable = [
        'file_name',
        'entry_number_in_file',
        'errors'
    ];

    protected $casts = [
        'errors' => 'array',
    ];
}
