<?php

namespace App\Helpers;

use Google\AdsApi\AdWords\AdWordsSessionBuilder;
use Google\AdsApi\Common\OAuth2TokenBuilder;

class GoogleAdsSession
{
    public static function getSession()
    {
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();
        $session = (new AdWordsSessionBuilder())->fromFile()->withOAuth2Credential($oAuth2Credential)->build();
        return $session;
    }

}
