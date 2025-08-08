<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
  protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'subject',
        'message',
        'status',
        'admin_notes',
        'responded_at',
        'company', // إضافة حقل اسم الشركة
        'budget',  // إضافة حقل الميزانية
        'timeline', // إضافة حقل الإطار الزمني
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'in_progress' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'في الانتظار',
            'in_progress' => 'قيد المعالجة',
            'completed' => 'مكتملة',
            'cancelled' => 'ملغية',
            default => 'غير محدد'
        };
    }
}
