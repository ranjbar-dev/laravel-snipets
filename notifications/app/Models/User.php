<?php

namespace App\Models;

use App\Models\Base\BaseAuthModel;
use App\Models\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class User extends BaseAuthModel
{
    protected $casts = [
        "telegram_payload" => AsCollection::class,
    ];

    public function getTelegramChatId() : string|null
    {
        return $this["telegram_payload"]?->get("chat_id") ?? null ;
    }

    public function isTelegramAccountLinked() : bool
    {
        return $this->getTelegramChatId() != null ;
    }

}
