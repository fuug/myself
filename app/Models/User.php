<?php

namespace App\Models;

use Carbon\Carbon;
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
        'role_id',
        'thumbnail',
        'timezone',
        'privacy',
        'show_urgency',
        'currency_id',
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

    public function activities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'activity_users', 'user_id', 'activity_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getNearUsers()
    {
        $ids = $this->subscriptions_performer->pluck('customer_id')->toArray();
        $ids += $this->subscriptions_customer->pluck('performer_id')->toArray();
        return User::all()->whereIn('id', $ids);
    }

    public function convertAmount($amountUsd)
    {
        if ($this->currency === null) {
            return $amountUsd;
        }
        return $this->currency->amount * $amountUsd;
    }

    public function getCurrencyTitle()
    {
        if ($this->currency === null) {
            return '$';
        }
        return $this->currency->title == 'usd' ? '$' : strtoupper($this->currency->title);
    }

    public function echoAmount($amountUsd)
    {
        $currency = $this->currency;
        if ($currency === null) {
            if (!in_array($this->role->title, array('performer', 'customer'))) {
                $amountAdmin = $amountUsd / 2;
                return $amountUsd . ' (' . $amountAdmin . ') $';
            }
            return $amountUsd . ' $';
        }
        $currencyTitle = $this->getCurrencyTitle();
        $currencyAmount = $currency->amount * $amountUsd;
        if (!in_array($this->role->title, array('performer', 'customer'))) {
            $amountAdmin = $currencyAmount / 2;
            return $currencyAmount . ' (' . $amountAdmin . ')' . $currencyTitle;
        }
        return $currencyAmount . ' ' . $currencyTitle;
    }

    public function firstname()
    {
        return explode(' ', $this->name)[0] ?? '';
    }

    public function surname()
    {
        return explode(' ', $this->name)[1] ?? '';
    }

    public function performerDescription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PerformerDescription::class, 'user_id');
    }

    public function chats()
    {
        $chats_ids = Chat::all()->where('user_id', $this->id)->pluck('id')->toArray();
        $chats_ids += Chat::all()->where('second_user_id', $this->id)->pluck('id')->toArray();

        return Chat::all()->whereIn('id', $chats_ids);
    }

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function performer_reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class, 'customer_id')->where('published', '1');
    }

    public function hasCategory($category_id = null): bool
    {
        if ($this->categories()->count() < 1)
            return false;
        if ($this->categories()->where('category_id', $category_id)->count() < 1)
            return false;
        return true;
    }

    public function hasGender($gender = null): bool
    {
        if ($this->performerDescription->count() < 1)
            return false;
        if ($this->performerDescription->gender != $gender)
            return false;
        return true;
    }

    public function hasPrice($price = null): bool
    {
        if ($this->performerDescription->count() < 1)
            return false;
        switch ($price) {
            case '50':
        }
        if ($this->performerDescription->price != $price)
            return false;
        return true;
    }

    public function hasSubscription(): bool
    {
        return $this->subscriptions_performer->where('customer_id', '')->count() > 0;
    }

    public function subscriptions_performer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class, 'performer_id');
    }

    public function subscriptions_customer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class, 'customer_id');
    }

    public function getChatWith($secondUser_id)
    {
        $chat = Chat::all()->where('user_id', $this->id)->where('second_user_id', $secondUser_id)->first();
        if ($chat == null) {
            $chat = Chat::all()->where('second_user_id', $this->id)->where('user_id', $secondUser_id)->first();
        }
        return $chat ?? Chat::create(array('user_id' => $this->id, 'second_user_id' => $secondUser_id));
    }

    public function getCustomers()
    {
        $customer_ids = $this->subscriptions_performer->pluck('customer_id')->toArray();
        return User::all()->whereIn('id', $customer_ids);
    }

    public function getSumPer($from = null, $to = null): int
    {
        $sum = 0;
        foreach ($this->subscriptions_performer as $subscription) {
            $sum += $subscription->getSumPerDate($from, $to);
        }
        return $sum;
    }

    public function performerSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Session::class, 'performer_id');
    }

    public function customerSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Session::class, 'customer_id');
    }

    public function getNearSessions()
    {
        return $this->performerSessions()->where('customer_id', null)->where('start', '>', Carbon::today())->orderBy('start')->first();
    }

    public function getUserSessions(): array
    {
        $sessions_arr = $this->performerSessions != null ? $this->performerSessions->toArray() : [];
        $sessions_arr += $this->customerSessions != null ? $this->customerSessions->toArray() : [];
        return $sessions_arr;
    }

    public function getMinimumPrice()
    {
        if ($this->subscriptions_performer()->get()->count() != 0) {
            return $this->subscriptions_performer()->orderBy('price')->get('price')->first()->price;
        }
        return false;
    }

    public static function getPerformers()
    {
        return User::all()->where('role_id', Role::all()->where('title', 'performer')->first()->id);
    }

    public function convertTime($time, $format = 'h:i'): string
    {
        return \Illuminate\Support\Carbon::parse($time)->timezone($this->timezone)->format($format);
    }
}
