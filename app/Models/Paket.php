<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Outlet;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
}
