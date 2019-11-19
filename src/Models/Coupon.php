<?php

namespace Ashriya\Coupon\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupon';
    protected $fillable = ['name', 'code', 'type', 'discount', 'minAmount', 'maxDiscountAmount','all_services','startDateTime', 'endDateTime', 'maxTotalUse', 'maxUseCustomer', 'status'];
}
