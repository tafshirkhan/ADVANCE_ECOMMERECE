<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function AllOrderReportsView(){
        return view('Backend.Reports.viewallorder_reports');
    }

    public function SearchByDate(Request $req){
        //return $req->all();
        $date = new DateTime($req->date);
        //date comes from viewallorder_reports page 

        $dateFormat = $date->format('d F Y');
        //return $dateFormat;

        $orders = Order::where('order_date',$dateFormat)->latest()->get();

        return view('Backend.Reports.vieworder_report',compact('orders'));

    }

    public function SearchByMonth(Request $req){

        //$orders = Order::where('order_month',$req->month)->where('order_year',$req->year_no)->latest()->get();
        $orders = Order::where('order_month',$req->month)->latest()->get();

        //month & year comes from select form of the viewallorder_reports page 
        return view('Backend.Reports.vieworder_report',compact('orders'));
    }

    
    public function SearchByYear(Request $req){

        $orders = Order::where('order_year',$req->year)->latest()->get();
        //month & year comes from select form of the viewallorder_reports page 
        return view('Backend.Reports.vieworder_report',compact('orders'));
    }
}
