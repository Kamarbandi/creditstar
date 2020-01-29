<?php


namespace tests\models;


use app\models\Customer;

class CustomerTest extends \Codeception\Test\Unit
{
    public function testAge()
    {
        $customer = new Customer();
        $customer->personal_code = '37604190371';
        $this->assertEquals(43, $customer->getAge());
    }
}