<?php

namespace App\Exports;

use App\User;
use App\order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $food='';
        $order= order::where('safe_status','=','1')->toArray();
        foreach($order as $row){
           foreach($row as $rows){
               $food=$rows;
           }
         }

         return $food;
       

    // public function map($user): array
    // {
    //     return [
    //        "name".$user->name,
    //               $user->email,
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //        "name",
    //        'email'
    //     ];
    // }

    

}
}