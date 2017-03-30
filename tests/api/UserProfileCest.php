<?php

class UserProfileCest
{
    // tests
    public function SeeMyProfile(ApiTester $I)
    {
        $I->wantTo('See my profile');
        $I->haveHttpHeader('X-API-TOKEN','$2y$11$QXo8djqFtm8P6VzSmvilgOzQgoqqdmzT52DR/riOuqv3D8SdSZ7PK');
        $I->sendGet('/profile/1');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
    }

    public function InvalidToken(ApiTester $I)
    {
        $I->wantTo('See profile with invalid token');
        $I->sendGet('/profile/1');
        $I->haveHttpHeader('X-API-TOKEN','ga ono jampine');
        $I->seeResponseCodeIs(401);
    }

    public function WithoutToken(ApiTester $I)
    {
        $I->wantTo('See profile without token');
        $I->sendGet('/profile/1');
        $I->seeResponseCodeIs(401);
    }

}