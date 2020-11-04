<?php declare(strict_types=1);

namespace App\Models;

use App\ValueObjects\Address;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * @package App\Models
 *
 * @property integer $id
 * @property integer $store_number
 * @property string $store_name
 * @property Address $address
 * @property string $site_id
 * @property float $latitude
 * @property float $longitude
 * @property string $phone_number
 * @property boolean $cfs_flag
 */
class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'store_number',
        'store_name',
        'address',
        'site_id',
        'latitude',
        'longitude',
        'phone_number',
        'cfs_flag',
    ];
}
