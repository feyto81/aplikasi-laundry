<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\User;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
}
