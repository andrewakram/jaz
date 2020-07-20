<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:52 م
 */

namespace App\Http\Controllers\Interfaces\User;


interface HomeRepositoryInterface
{
    public function category($lang);
    public function subCategory($lang,$id);
    public function thirdCategory($lang,$id);
    public function fourthCategory($lang,$id);
}
