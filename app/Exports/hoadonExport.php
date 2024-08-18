<?php

namespace App\Exports;

use App\hoadon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class hoadonExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return hoadon::all();
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
