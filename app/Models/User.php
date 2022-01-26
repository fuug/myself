<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'role_rus',
        'description',
        'gender',
        'thumbnail',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_users', 'user_id', 'category_id');
    }

    public function hasCategory($category_id = null): bool
    {
        if ($this->categories()->count() < 1)
            return false;
        if ($this->categories()->where('category_id', $category_id)->count() < 1)
            return false;
        return true;
    }

    public function subscriptions_performer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class, 'performer_id');
    }

    public function subscriptions_customer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class, 'customer_id');
    }

    public function getSumPer($from = null, $to = null)
    {
        $sum = 0;
        foreach ($this->subscriptions_performer as $subscription) {
            $sum += $subscription->getSumPerDate($from, $to);
        }
        return $sum;
    }

    public function getPerformerEvents(): array
    {
        $sessions_arr = array();
        foreach ($this->subscriptions_performer as $item) {
            foreach ($item->sessions->all() as $session) {
                $sessions_arr[] = $session;
            }
        }
        return $sessions_arr;
    }

    public function getCustomerEvents(): array
    {
        $sessions_arr = array();
        foreach ($this->subscriptions_customer as $item) {
            foreach ($item->sessions->all() as $session) {
                $sessions_arr[] = $session;
            }
        }
        return $sessions_arr;
    }

    public function getMinimumPrice()
    {
        if ($this->subscriptions_performer()->get()->count() != 0) {
            return $this->subscriptions_performer()->orderBy('price')->get('price')->first()->price;
        }
        return false;
    }
}
