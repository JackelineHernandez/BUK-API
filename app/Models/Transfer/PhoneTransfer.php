<?php

namespace BukApi\Models\Transfer;

use Illuminate\Database\Eloquent\Model;
use BukApi\Models\Transfer\TransferService;
use BukApi\Constants\HiddenColumns;
use BukApi\Constants\GuardedColumns;
use BukApi\Constants\TableName;

class PhoneTransfer extends Model
{
    public $timestamps = false;

    protected $table = TableName::PHONE_TRANSFER;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = GuardedColumns::ID;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = HiddenColumns::PIVOT;
    
    public function transferService(){

        return $this->belongsTo(TransferService::class);
    }
}
