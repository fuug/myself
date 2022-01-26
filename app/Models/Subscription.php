<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subscriptions';
    protected $guarded = false;

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function performer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'performer_id');
    }

    public function sessions(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Session::class, 'subscription_id');
    }

    public function doneSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->sessions()->where('end','<>', '');
    }

    /**
     * Получить цену за один приём.
     *
     * @return float|int
     */
    public function getPricePerSession()
    {
        return round($this->price / count($this->sessions));
    }

    /**
     * Получить сумму за выполненные приёмы.
     *
     * @return float|int
     */
    public function getSumPerDoneSession()
    {
        return $this->getPricePerSession() * count($this->doneSessions);
    }

    public function getSumPerDate($from = null, $to = null)
    {
        if ($from == null && $to == null) {
            return $this->doneSessions()->count() * $this->getPricePerSession();
        }

        if ($from == null) {
            return $this->doneSessions()->whereDate('start', '<=', $to)->count() * $this->getPricePerSession();
        }

        if ($to == null) {
            return $this->doneSessions()->whereDate('start', '>=', $from)->count() * $this->getPricePerSession();
        }

        if (strlen($to) > 10) {
            return $this->doneSessions()->whereBetween('start', [$from, $to])->count() * $this->getPricePerSession();
        } else {
            return $this->doneSessions()->whereBetween('start', [$from, $to . ':23:59:59'])->count() * $this->getPricePerSession();
        }

    }

    public function getStatus(): string
    {
        if ($this->customer == null) {
            return 'Не куплен';
        }
        if ($this->sessions()->count() === $this->doneSessions()->count()) {
            return 'Завершён';
        }
        return 'Не завершён';
    }
}
