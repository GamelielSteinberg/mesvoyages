<?php
namespace App\Tests;

use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

/**
 * Description of VisiteTest
 *
 * @author stgam
 */
class VisiteTest extends TestCase {
    public function testGetDatecreationString(){
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2001-12-09"));
        $this->assertEquals("09/12/2001", $visite->getDatecreationString());
    }
}
