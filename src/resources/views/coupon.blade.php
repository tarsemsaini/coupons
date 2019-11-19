@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Coupon') }}</div>

                <div class="card-body">
                    <form action="{{ isset($coupon) ? route('coupon.update',$coupon->id) : route('coupon.store') }}" method="POST">
                        @if(isset($coupon))
                        @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group row">
                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Coupon Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($coupon) ? $coupon->name : old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ isset($coupon) ? $coupon->code : old('code') }}"  autocomplete="code" autofocus>

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" >
                                    <option value="F" @if(isset($coupon) && $coupon->type=='F') selected @endif >Fixed</option>
                                    <option value="P" @if(isset($coupon) && $coupon->type=='P') selected @endif>Percentage</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
                            <div class="col-md-6">
                                <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ isset($coupon) ? $coupon->discount : old('discount') }}"  autocomplete="discount" autofocus>
                                @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="minAmount" class="col-md-4 col-form-label text-md-right">{{ __('Minimum Amount') }}</label>
                            <div class="col-md-6">
                                <input id="min_amount" type="text" class="form-control @error('min_amount') is-invalid @enderror" name="minAmount" value="{{ isset($coupon) ? $coupon->minAmount : old('minAmount') }}"  autocomplete="minAmount" autofocus>
                                @error('minAmount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxDiscountAmount" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Discount Amount') }}</label>
                            <div class="col-md-6">
                                <input id="max_amount" type="text" class="form-control @error('maxDiscountAmount') is-invalid @enderror" name="maxDiscountAmount" value="{{ isset($coupon) ? $coupon->maxDiscountAmount : old('maxDiscountAmount') }}"  autocomplete="maxDiscountAmount" autofocus>
                                @error('maxDiscountAmount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="startDateTime" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>
                            <div class="col-md-6">
                                <input id="startDateTime" type="text" class="form-control @error('startDateTime') is-invalid @enderror" name="startDateTime" value="{{ isset($coupon) ? $coupon->startDateTime : old('startDateTime') }}" placeholder="Y-m-d" autocomplete="startDateTime" autofocus>
                                @error('startDateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endDateTime" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>
                            <div class="col-md-6">
                                <input id="endDateTime" type="text" class="form-control @error('endDateTime') is-invalid @enderror" name="endDateTime" value="{{ isset($coupon) ? $coupon->endDateTime : old('endDateTime') }}"  placeholder="Y-m-d" autocomplete="endDateTime" autofocus>
                                @error('endDateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxTotalUse" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Total Use') }}</label>
                            <div class="col-md-6">
                                <input id="maxTotalUse" type="text" class="form-control @error('maxTotalUse') is-invalid @enderror" name="maxTotalUse" value="{{ isset($coupon) ? $coupon->maxTotalUse : '0' }}"  autocomplete="maxTotalUse" autofocus>
                                @error('maxTotalUse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maxUseCustomer" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Use Per Customer') }}</label>
                            <div class="col-md-6">
                                <input id="maxUseCustomer" type="text" class="form-control @error('maxUseCustomer') is-invalid @enderror" name="maxUseCustomer" value="{{ isset($coupon) ? $coupon->maxUseCustomer : '0' }}"  autocomplete="maxUseCustomer" autofocus>
                                @error('maxUseCustomer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" >
                                    <option value="0" @if(isset($coupon) && $coupon->status=='0') selected @endif >Enabled</option>
                                    <option value="1" @if(isset($coupon) && $coupon->status=='1') selected @endif>Disabled</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
