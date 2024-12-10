<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ReceiptOfGoodsCRUDWithArticleCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function createProduct(AcceptanceTester $I)
    {
        // Добавление товара
        $I->amOnPage('/');
        $I->click('#add_product');
        $I->fillField('#name', 'test');
        $I->fillField('#price', '100');
        $I->fillField('#article', '555');
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');
        $I->canSee('555');
    }

    public function updateProduct(AcceptanceTester $I)
    {
        // Редактирование товара
        $I->amOnPage('/');
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->fillField('#article', '777');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');
        $I->canSee('777');
    }

    public function create(AcceptanceTester $I)
    {
        // Добавление поступления
        $I->amOnPage('/receipt-of-goods');
        $I->click('#add_receipt');
        $I->selectOption('#product_id', 'test_edit');
        $I->fillField('#amount', '500');
        $I->click('#add');
        $I->canSee('test_edit');
        $I->canSee('500');
    }

    public function update(AcceptanceTester $I)
    {
        // Редактирование поступления
        $I->amOnPage('/receipt-of-goods');
        $I->click('#edit_receipt');
        $I->fillField('#amount', '1000');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('1000');
    }

    public function delete(AcceptanceTester $I)
    {
        // Удаление поступления
        $I->amOnPage('/receipt-of-goods');
        $I->click('#delete_receipt');
        $I->dontSee('test_edit');
        $I->dontSee('1000');
    }

    public function deleteProduct(AcceptanceTester $I)
    {
        // Удаление товара
        $I->amOnPage('/');
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
        $I->dontSee('777');
    }
}
