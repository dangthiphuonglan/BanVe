<?php

namespace App\Exports;

use App\danhmuc;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return danhmuc::all();
    }

    public function headings(): array {
        return [
            'ID',
            'Tên Danh Mục',
        ];
    }
 
    public function map($danhmuc): array {
        return [
            $danhmuc->id_DanhMuc,
            $danhmuc->tenDanhMuc,
        ];
    }
    
}
