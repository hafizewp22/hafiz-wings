<?php

namespace Database\Seeders;

use App\Models\TransactionHeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionHeader = [
            [
                'document_code' => 'AAA',
                'document_number' => '001',
                'user_id' => '1',
                'user' => 'hafizewp',
                'total' => '14480000',
                'date' => '2023-09-30',
                'created_at' => '2023-09-30 01:53:05',
                'updated_at' => '2023-09-30 01:53:05',
            ],
        ];
        foreach ($transactionHeader as $key => $value){
            TransactionHeader::create($value);
        }
    }
}
