<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashSale;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use DB;


class WebController extends Controller
{

	public function index(){

		$message = '';
		$sale = '';
		$orderCount = 0;
		$alreadyPurchased = 0;
		$uid = 0;

		if(isset($_GET['uid']) && $_GET['uid'] != ''){
			$uid = $_GET['uid'];
			$checkUser = User::find($uid);
			if($checkUser->role){

				// dd(date('Y-m-d'));

				$date1 = date('Y-m-d');
				$date2 = date('Y-m-d',strtotime("-1 day"));

				$sales = FlashSale::where('status',1)->whereIN('publish_date',[$date1, $date2])->orderBy('id','ASC')->limit(1)->get();
				

				if(count($sales) == 0){				
					$message = "No deal available for today. Please come tomorrow.";
				}
				else{
					$sale = $sales[0];
					$current = date('Y-m-d H:s:i');
					$startDate = date('Y-m-d H:s:i', strtotime($sale->start_from));
					$endDate = date('Y-m-d H:s:i', strtotime($sale->expire_on));

					// dd($current<=$endDate && $current>=$startDate);

					if($current<=$endDate && $current>=$startDate){

					$orderCount = Order::where('user_id',$uid)->count();					
					$alreadyPurchased = Order::where('user_id',$_GET['uid'])->where('sales_id', $sale->id)->count();
					}
					else{
						$message = "No deal available for today. Please come tomorrow.";
					}
				}
			}
			else{
				return redirect('admin/dashboard');
			}
		}


		$data_array = [
			'sale' => $sale,
			'message' => $message,
			'orderCount' => $orderCount,
			'alreadyPurchased' => $alreadyPurchased,
			'uid' => $uid
		];

		// dd($data_array);

		return view('home', $data_array);
	}


	public function place_order(Request $request,$id){
		$data = $request->except(['_token','_method']);
		
		$order_info = json_encode($data);

		// dd($id);

		$order = new Order;

		$order['user_id'] = $id;
		$order['sales_id'] = $data['sales_id'];
		$order['sale_description'] = $order_info;

		// Order::create($order);

			// dd($order);

		$order->save();


		FlashSale::where('id',$data['sales_id'])->update([
			'stock_left' => DB::raw('stock_left + 1')
		]);



        return redirect('/?uid=5')->with('message', 'Your order has been successfully placed. Thank you.');


}

}
