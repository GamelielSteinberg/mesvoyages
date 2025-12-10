<?php

namespace App\Tests\Repository;

use App\Entity\Visite;
use App\Repository\VisiteRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of VisiteRepositoryTest
 *
 * @author stgam
 */
class VisiteRepositoryTest extends KernelTestCase {

    public function recupRepository(): VisiteRepository {
        self::bootKernel();
        $repository = self::getContainer()->get(VisiteRepository::class);
        return $repository;
    }

    public function testNbVisites() {
        $repository = $this->recupRepository();
        $nbVisites = $repository->count([]);
        $this->assertEquals(98, $nbVisites);
    }

    public function newVisite(): Visite {
        $visite = (new Visite())
                ->setVille("Cair Paravel")
                ->setPays("Narnia")
                ->setDateCreation(new DateTime("now"));
        return $visite;
    }
    
    public function testAddVisite(){
        $repository = $this->recupRepository();
        $visite = $this->newVisite();
        $nbVisites = $repository->count([]);
        $repository->add($visite, false, true);
        $this->assertEquals($nbVisites + 1, $repository->count([]), "erreur lors de l'ajout");
    }
    
    public function testRemoveVisite(){
        $repository = $this->recupRepository();
        $visite = $this->newVisite();
        $repository->add($visite, false, true);
        $nbVisites = $repository->count([]);
        $repository->remove($visite, false, true);
        $this->assertEquals($nbVisites - 1, $repository->count([]), "erreur lors de la suppression");
    }
    
    public function testFindByEqualValue(){
        $repository = $this->recupRepository();
        $visite = $this->newVisite();
        $repository->add($visite, true, true);
        $visites = $repository->findByEqualValue("ville", "Cair Paravel");
        $nbVisites = count($visites);
        $this->assertEquals(1, $nbVisites);
    }
}
