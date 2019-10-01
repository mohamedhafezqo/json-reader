<?php

namespace App\Constant;

/**
 * Class TransactionStatusCodeConstant
 */
final class StatusCodeConstant
{
    const AUTHORISED = 'authorised';
    const AUTHORISED_CODE = [100, 1];

    const DECLINE = 'decline';
    const DECLINE_CODE = [200, 2];

    const REFUNDED = 'refunded';
    const REFUNDED_CODE = [300, 3];

    public static function getChoices(): array
    {
        return [
            self::AUTHORISED => self::AUTHORISED_CODE,
            self::DECLINE => self::DECLINE_CODE,
            self::REFUNDED => self::REFUNDED_CODE,
        ];
    }

    /**
     * @param string $type
     * @return array
     */
    public static function getCode(string $type): array
    {
        $statusCodes = self::getChoices();

        return $statusCodes[strtolower($type)] ?? self::AUTHORISED_CODE;
    }
}
