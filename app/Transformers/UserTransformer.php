<?php

namespace App\Transformers;

class UserTransformer extends Transformer
{
    public function transform($item)
    {
        return [
            'user_id'           => $item['id'],
            'name'              => $item['name'],
            'email'             => $item['email'],
            'email_verified_at' => $item['email_verified_at']
        ];
    }
}
