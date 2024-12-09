<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ProductCRUDCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/products/');
        $I->click('#add_product');
        $I->fillField('#name', 'test');
        $I->fillField('#price', '100');
    }

    // tests
    public function CRUD(AcceptanceTester $I)
    {
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');

        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');

        $I->click('#delete_product');
        $I->dontSee('test_edit');
    }

    public function CRUDWithArticle(AcceptanceTester $I)
    {
        $I->fillField('#article', '555');
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');
        $I->canSee('555');

        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->fillField('#article', '777');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');
        $I->canSee('777');

        $I->click('#delete_product');
        $I->dontSee('test_edit');
    }
}