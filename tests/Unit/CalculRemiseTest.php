<?php

namespace App\Tests\Unit;

use App\Controller\Calculator;
use PHPUnit\Framework\TestCase;

class CalculRemiseTest extends TestCase
{
    const scenarios = [
        [13, 6],
        [19, 7],
        [56,5],
        [196, 3]
    ];

    public function testInferieur100(): void
    {
        $calculator = new Calculator();

        $datas = self::scenarios[0];
        $unitPrice = $datas[0];
        $nbProducts = $datas[1];

        //on appel la méthode
        $responseData = $calculator->CalculRemise($unitPrice, $nbProducts);

        //on récupère nos résultats
        $finalPrice = $responseData[0];
        $delivery = $responseData[1];
        $reduce = $responseData[2];

        //on fait nos vérifications
        $this->assertEquals(84, $finalPrice);
        $this->assertEquals(6, $delivery);
        $this->assertEquals(0, $reduce);
    }

    public function testEntre100et200(): void
    {
        $calculator = new Calculator();

        $datas = self::scenarios[1];
        $unitPrice = $datas[0];
        $nbProducts = $datas[1];

        //on appel la méthode
        $responseData = $calculator->CalculRemise($unitPrice, $nbProducts);

        //on récupère nos résultats
        $finalPrice = $responseData[0];
        $delivery = $responseData[1];
        $reduce = $responseData[2];

        //on fait nos vérifications
        $this->assertEquals(132.35, $finalPrice);
        $this->assertEquals(6, $delivery);
        $this->assertEquals(6.65, $reduce);
    }

    public function testEntre200et500(): void
    {
        $calculator = new Calculator();

        $datas = self::scenarios[2];
        $unitPrice = $datas[0];
        $nbProducts = $datas[1];

        //on appel la méthode
        $responseData = $calculator->CalculRemise($unitPrice, $nbProducts);

        //on récupère nos résultats
        $finalPrice = $responseData[0];
        $delivery = $responseData[1];
        $reduce = $responseData[2];

        //on fait nos vérifications
        $this->assertEquals(258, $finalPrice);
        $this->assertEquals(6, $delivery);
        $this->assertEquals(28.8, $reduce);
    }

    public function testSuperieu500(): void
    {
        $calculator = new Calculator();

        $datas = self::scenarios[3];
        $unitPrice = $datas[0];
        $nbProducts = $datas[1];

        //on appel la méthode
        $responseData = $calculator->CalculRemise($unitPrice, $nbProducts);

        //on récupère nos résultats
        $finalPrice = $responseData[0];
        $delivery = $responseData[1];
        $reduce = $responseData[2];

        //on fait nos vérifications
        $this->assertEquals(592.2, $finalPrice);
        $this->assertEquals(0, $delivery);
        $this->assertEquals(58.8, $reduce);
    }

}
