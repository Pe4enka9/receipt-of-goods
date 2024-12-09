<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class CRUDCest
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
        // Добавление товара
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');

        // Редактирование товара
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');

        // Удаление товара
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
    }

    public function CRUDWithArticle(AcceptanceTester $I)
    {
        // Добавление товара
        $I->fillField('#article', '555');
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');
        $I->canSee('555');

        // Редактирование товара
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->fillField('#article', '777');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');
        $I->canSee('777');

        // Удаление товара
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
        $I->dontSee('777');
    }

    public function CRUDWithReceiptOfGoods(AcceptanceTester $I)
    {
        // Добавление товара
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');

        // Редактирование товара
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');

        // Переход на страницу поступлений
        $I->click('#back');

        // Добавление поступления
        $I->click('#add_receipt');
        $I->selectOption('#product_id', 'test_edit');
        $I->fillField('#amount', '500');
        $I->click('#add');
        $I->canSee('test_edit');
        $I->canSee('500');

        // Редактирование поступления
        $I->click('#edit_receipt');
        $I->fillField('#amount', '1000');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('1000');

        // Удаление поступления
        $I->click('#delete_receipt');
        $I->dontSee('test_edit');
        $I->dontSee('1000');

        // Переход на страницу товаров
        $I->click('#products');

        // Удаление товара
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
    }

    public function CRUDWithReceiptOfGoodsAndArticle(AcceptanceTester $I)
    {
        // Добавление товара
        $I->fillField('#article', '555');
        $I->click('#add');
        $I->canSee('test');
        $I->canSee('100');
        $I->canSee('555');

        // Редактирование товара
        $I->click('#edit_product');
        $I->fillField('#name', 'test_edit');
        $I->fillField('#price', '200');
        $I->fillField('#article', '777');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('200');
        $I->canSee('777');

        // Переход на страницу поступлений
        $I->click('#back');

        // Добавление поступления
        $I->click('#add_receipt');
        $I->selectOption('#product_id', 'test_edit');
        $I->fillField('#amount', '500');
        $I->click('#add');
        $I->canSee('test_edit');
        $I->canSee('500');

        // Редактирование поступления
        $I->click('#edit_receipt');
        $I->fillField('#amount', '1000');
        $I->click('#edit');
        $I->canSee('test_edit');
        $I->canSee('1000');

        // Удаление поступления
        $I->click('#delete_receipt');
        $I->dontSee('test_edit');
        $I->dontSee('1000');

        // Переход на страницу товаров
        $I->click('#products');

        // Удаление товара
        $I->click('#delete_product');
        $I->dontSee('test_edit');
        $I->dontSee('200');
        $I->dontSee('777');
    }
}