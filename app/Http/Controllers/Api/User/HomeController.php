<?php

namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $homeRepository;
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function category(Request $request)
    {
        $cat = $this->homeRepository->category($request->header('lang'));
        $order = Order::count();

        return response()->json(msgdata($request,success(),
            'success',['category'=>$cat,'order_count'=>$order]));
    }

    public function subCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id,type,1'
        ]);

        if($validator->fails()) return response()->json(['status' => 'error',
            'msg' => $validator->messages()->first()]);

        $sub_cat = $this->homeRepository->subCategory($request->header('lang'),$request->id);

        return response()->json(msgdata($request,success(),'success',$sub_cat));
    }

    public function thirdCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id,type,2'
        ]);

        if($validator->fails()) return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);

        $third_cat = $this->homeRepository->thirdCategory($request->header('lang'),$request->id);

        return response()->json(msgdata($request,success(),'success',$third_cat));
    }

    public function fourthCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id,type,3'
        ]);

        if($validator->fails()) return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);

        $third_cat = $this->homeRepository->fourthCategory($request->header('lang'),$request->id);

        return response()->json(msgdata($request,success(),'success',$third_cat));
    }

}
