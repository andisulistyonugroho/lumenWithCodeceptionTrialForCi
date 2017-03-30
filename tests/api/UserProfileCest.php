<?php

class UserProfileCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('X-API-TOKEN','$2y$11$QXo8djqFtm8P6VzSmvilgOzQgoqqdmzT52DR/riOuqv3D8SdSZ7PK');
    }
    // tests
    public function SeeMyProfile(ApiTester $I)
    {
        // $I->wantTo('See my profile');
//         $I->sendGet('/profile/7');
//         $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
//$I->seeResponseIsJson();
        //$response = json_decode($I->grabResponse());
        //codecept_debug($api_token);
    }
    
}