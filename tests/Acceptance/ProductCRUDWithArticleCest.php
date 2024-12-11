<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ProductCRUDWithArticleCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    // tests
    public function create(AcceptanceTester $I)
    {
        // Добавление товара
        $I->click('#add_product');
        $I->fillField('#name', 'test');
        $I->fillField('#price', '100');
        $I->fillField('#article', '555');
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');
        $I->canSee('555');
    }

    public function update(AcceptanceTester $I)
    {
        // Редактирование товара
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->fillField('#article', '777');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');
        $I->canSee('777');
    }

    public function delete(AcceptanceTester $I)
    {
        // Удаление товара
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
        $I->dontSee('777');
    }
}
