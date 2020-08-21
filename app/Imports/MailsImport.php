<?php

namespace App\Imports;

use App\Email;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MailsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Email([
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'asunto'    => $row['asunto'], 
            'mensaje'    => $row['email'], 
            'created_at'    => $row['created_at'], 

        ]);
    }
}
