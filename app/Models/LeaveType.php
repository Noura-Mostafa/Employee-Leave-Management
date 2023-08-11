<?php

namespace App\Models;

use App\Models\User;
use App\Models\LeaveRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function leaveRequests() {
        return $this->hasMany(LeaveRequest::class);
    }

    
}
