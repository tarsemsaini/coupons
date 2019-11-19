<?php

namespace Ashriya\Coupon\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ashriya\Coupon\Models\Coupon;

class CouponController extends Controller {

   const PAGINATION = 15;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $coupons = Coupon::paginate(self::PAGINATION);

        return view('coupon::list', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('coupon::coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:coupon',
            'type' => 'required',
            'discount' => 'required',
            'minAmount' => 'required',
            'maxDiscountAmount' => 'required',
            'startDateTime' => 'required|date|date_format:Y-m-d',
            'maxTotalUse' => 'required',
            'maxUseCustomer' => 'required',
        );

        $data = $request->all();
        $validator = Validator::make($data, $rules);

        // dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if all validation rules passed 
        $coupon = Coupon::create($data);

        return redirect('coupon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('coupon::coupon', ['coupon' => Coupon::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:coupon,code,' . $id,
            'type' => 'required',
            'discount' => 'required',
            'minAmount' => 'required',
            'maxDiscountAmount' => 'required',
            'startDateTime' => 'required|date|date_format:Y-m-d',
            'endDateTime' => 'required|date|date_format:Y-m-d',
            'maxTotalUse' => 'required',
            'maxUseCustomer' => 'required',
        );

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $coupon = Coupon::find($id);

        if ($coupon) {
            $coupon->name = $data['name'];
            $coupon->code = $data['code'];
            $coupon->type = $data['type'];
            $coupon->discount = $data['discount'];
            $coupon->minAmount = $data['minAmount'];
            $coupon->maxDiscountAmount = $data['maxDiscountAmount'];
            $coupon->startDateTime = $data['startDateTime'];
            $coupon->endDateTime = $data['endDateTime'];
            $coupon->status = $data['status'];
            $coupon->save();
        }

        return redirect('coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $coupon = Coupon::destroy($id);
        return redirect('coupon');
    }

}
