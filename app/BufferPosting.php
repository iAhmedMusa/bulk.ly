<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;

class BufferPosting extends Model
{
   public function groupInfo()
    {
        return $this->hasOne(SocialPostGroups::class, 'id', 'group_id');
    }
   public function accountInfo()
    {
        return $this->hasOne(SocialAccounts::class, 'id', 'account_id');
    }

}