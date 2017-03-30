<?php


class UserLoginCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->wantTo('Login');
        $I->sendPost('/login',['email' => 'glagah.putih@mailinator.com', 'password' => 'sikret']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $response = json_decode($I->grabResponse());
        $api_token = $response->api_token;
        codecept_debug($api_token);
    }
}
