<?php

namespace Tests\Unit;

use Tests\TestCase;

// use database\factories\ProduitFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\ProduitRepository;
use App\Models\Produit;
use Faker\Factory as Faker;
use Database\factories\ProduitFactory;

class produitTest extends TestCase
 {

    // /**
    //  * A basic test example.
    //  *
    //  * @return void
    //  */

    // /** @test */
    // public function it_can_update_the_produit()
    // {
    //     $produit = factory(Produit::class)->create();

    //     $data = [
    //         'title' => $this->faker->word,
    //         'quantité' => $this->faker->numberBetween(1, 999999),
    //         'location' => $this->faker->url,
    //     ];

    //     $produitRepo = new ProduitRepository($produit);
    //     $update = $produitRepo->updateproduit($data);

    //     $this->assertTrue($update);
    //     $this->assertEquals($data['title'], $produit->title);
    //     $this->assertEquals($data['quantité'], $produit->quantité);
    //     $this->assertEquals($data['location'], $produit->location);
    // }

    // /** @test */
    // public function it_can_show_the_produit()
    // {
    //     $produit = factory(produit::class)->create();
    //     $produitRepo = new produitRepository(new produit);
    //     $found = $produitRepo->findproduit($produit->id);

    //     $this->assertInstanceOf(produit::class, $found);
    //     $this->assertEquals($found->title, $produit->title);
    //     $this->assertEquals($found->quantité, $produit->quantité);
    //     $this->assertEquals($found->location, $produit->location);
    // }

    // /** @test */
    // public function it_can_create_a_produit()
    // {

    //     $data = [
    //         'title' => $this->faker->word,
    //         'quantité' => $this->faker->numberBetween(1, 999999),
    //         'location' => $this->faker->location,
    //     ];

    //     $produitRepo = new ProduitRepository(new produit);
    //     $produit = $produitRepo->createproduit($data);

    //     $this->assertInstanceOf(produit::class, $produit);
    //     $this->assertEquals($data['title'], $produit->title);
    //     $this->assertEquals($data['quantité'], $produit->quantité);
    //     $this->assertEquals($data['location'], $produit->location);
    // }























    public function setUp() : void
    {
        parent::setUp();

        $this->faker = Faker::create();
        // initialisation test
        $this->produit = [
            'title' => $this->faker->name,
            'quantité' => $this->faker->numberBetween(1, 999999),
            'location' => $this->faker->name,
        ];
        // creation ProduitRepository
        $this->produitRepository = new ProduitRepository();


    }

     /**
     * A basic test example.
     *
     * @return void
     */

    public function tearDown() : void
    {
        $produit = $this->produitRepository->storeProduit($this->produit);
         $this->assertInstanceOf(Produit::class, $produit);
         $this->assertEquals($this->produit['title'], $produit->title);
         $this->assertEquals($this->produit['quantité'], $produit->quantité);
         $this->assertEquals($this->produit['location'], $produit->location);
         $this->assertDatabaseHas('produits', $this->produit);

    }
    public function testStore()
    {
        $produit = $this->produitRepository->storeProduit($this->produit);
        $this->assertInstanceOf(Produit::class, $produit);
        $this->assertEquals($this->produit['title'], $produit->title);
        $this->assertEquals($this->produit['quantité'], $produit->quantité);
        $this->assertEquals($this->produit['location'], $produit->location);
        $this->assertDatabaseHas('produits', $this->produit);
    }

    public function testUpdate()
    {
        $produit = $this->produitRepository->storeProduit($this->produit);
        $newProduit = $this->produitRepository->updateProduit($this->produit, $produit);

        $this->assertInstanceOf(Produit::class, $newProduit);
        $this->assertEquals($this->produit['title'], $produit->title);
        $this->assertEquals($this->produit['quantité'], $produit->quantité);
        $this->assertEquals($this->produit['location'], $produit->location);
        $this->assertDatabaseHas('produits', $this->produit);
    }

    public function testDestroy()
    {
        $produit = $this->produitRepository->storeProduit($this->produit);
        $deleteProduit = $this->produitRepository->destroyProduit($produit);

        $this->assertTrue($deleteProduit);

        $this->assertDatabaseMissing('produits', $produit->toArray());
    }


    public function testExample1()
    {
        $this->assertTrue(true);
    }

     /**
     * A basic unit test example 2.
     *
     * @return void
     */
    public function testExample2()
    {
        $this->assertTrue(true);
    }




























////////////////////////////////////////////////////////////////////////////////////////////////



    // public function addPrduit()
    // {
    //     $produit1 = new Resquest([
    //         'title' => 'Couscous',
    //         'quantité' => '1500',
    //         'location' => 'Bertoua',

    //     ]);

    //     $this->assertEquals('Produit created successfully.',\App\Http\Controllers\ProduitController::store($produit1));
    // }

    // public function updatePrduit()
    // {

    //     $produit1 = new Resquest([
    //         'title' => 'Couscous',
    //         'quantité' => '1500',
    //         'location' => 'Bertoua',

    //     ]);


    //     $produit2 = new Produit([
    //         'title' => 'Poullet',
    //         'quantité' => '1500',
    //         'location' => 'Douala',

    //     ]);

    //     $this->assertSame('Produit created successfully.',\App\Http\Controllers\ProduitController::update($produit1, $produit2));
    // }
    // public function getPrduit()
    // {
    //     $this->assertTrue(true);
    // }
    // public function getOnePrduit()
    // {
    //     $this->assertTrue(true);
    // }
    // public function deletePrduit()
    // {


    //     $this->assertTrue(true);
    // }

    }
