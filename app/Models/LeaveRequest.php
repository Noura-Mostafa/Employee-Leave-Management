<?php

namespace App\Models;

use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'user_id',
        'leave_type_id',
        'status',
        'start_date',
        'duration',
        'reason',
        'reject_reason',
    ];

    public function leaveType() {
        return $this->belongsTo(LeaveType::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
