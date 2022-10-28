<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc_save extends Model
{
    use HasFactory;



    protected $fillable = [
            'pc_id',
           ' user_id',
            'name',
            'description',
            'total_tK',
            'total_item',
            'CPU',
            'CPU_Cooler',
            'Mother_Board',
            'RAM',
            'RAM_2',
            'Storage',
            'Storage_2',
            'Graphics_Card',
            'Power_Supply',
            'Casing',
            'Casing_Cooler',
            'Monitor',
            'Keyboard',
            'Mouse',
            'Headphone',
            'Anti_Virus',
            'UPS',
            'CPU_id',
            'CPU_Cooler_id',
            'Mother_Board_id',
            'RAM_id',
            'RAM_2_id',
            'Storage_id',
            'Storage_2_id',
            'Graphics_Card_id',
            'Power_Supply_id',
            'Casing_id',
            'Casing_Cooler_id',
            'Monitor_id',
            'Keyboard_id',
            'Mouse_id',
            'Headphone_id',
            'Anti_Virus_id',
            'UPS_id',
        ];
}
