<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:53 م
 */

namespace App\Http\Controllers\Eloquent\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Models\Category;

class HomeRepository implements HomeRepositoryInterface
{
    public $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function category($lang)
    {
        return Category::whereType(1)
            ->select('id', $lang.'_name as name','image','has_period')
            ->get();
    }

    public function subCategory($lang,$id)
    {
        $arr=[];
        $sub_cats = Category::whereType(2)->where('parent_id', $id)
        ->where("active",1)
        ->select('id', $lang.'_name as name', 'image','type','has_period')->get();
        foreach ($sub_cats as $sub){
            $third_cats = Category::whereType(3)->where('parent_id', $sub->id)
                ->where("active",1)
                ->first();
            if($third_cats){
                $sub->hasSubCats = true;
            }else{
                $sub->hasSubCats = false;
            }
            array_push($arr,$sub);
        }
        return $arr;
    }

    public function thirdCategory($lang,$id)
    {
        $third_cats = Category::whereType(3)->where('parent_id', $id)
        ->where("active",1)
        ->select('id', $lang.'_name as name', 'image','has_period')->get();
        return $third_cats;
    }

    public function fourthCategory($lang,$id)
    {
        $third_cats = Category::whereType(4)->where('parent_id', $id)
            ->where("active",1)
            ->select('id', $lang.'_name as name', 'image','has_period')->get();

        return $third_cats;
    }

}
