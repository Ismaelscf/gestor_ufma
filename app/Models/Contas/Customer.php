<?php

namespace App\Models\Contas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'contas';
    protected $table = 'customers';
    protected $primaryKey = 'cst_id';
    protected $fillable = [
        'cst_usr_id',
        'cst_name',
        'cst_cpf',
        'cst_email',
        'cst_birthdate',
        'cst_zipcode',
        'cst_number',
        'cst_country',
        'cst_state',
        'cst_city',
        'cst_district',
        'cst_street',
        'cst_password_md5'
    ];

    protected $casts = ['cst_birthdate' => 'date'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'cst_usr_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'ord_cst_id', 'cst_id')->orderByDesc('created_at');
    }
}
