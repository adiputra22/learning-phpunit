<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function test_empty_instantiated_collection_returns_no_items()
    {
        $collection = new App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    public function test_count_is_correct_for_items_passed_in()
    {
        $collection = new App\Support\Collection([
            'data1', 'data2', 'data3'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    public function test_items_returned_match_items_passed_in()
    {
        $collection = new App\Support\Collection([
            'data1', 'data2'
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'data1');
    }

    public function test_collection_is_instance_of_iterator_aggregate()
    {
        $collection = new App\Support\Collection();
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function test_collection_can_be_iterated()
    {
        $collection = new App\Support\Collection([
            'data1', 'data2', 'data3'
        ]);

        $items = [];

        foreach($collection as $item){
            $items[] = $item;
        }

        $this->assertCount(3, $items);
    }

    public function test_collection_can_be_merged_with_another_collection()
    {
        $collection1 = new App\Support\Collection([
            'data1', 'data2', 'data3'
        ]);

        $collection2 = new App\Support\Collection([
            'data4', 'data5'
        ]);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1);
        $this->assertEquals(5, $collection1->count());
    }

    public function test_can_add_to_existing_collection()
    {
        $collection = new App\Support\Collection([
            'data1', 'data2', 'data3'
        ]);

        $collection->add(['data4']);

        $this->assertEquals(4, $collection->count());
        $this->assertCount(4, $collection->get());
    }

    public function test_returns_json_encoded_items()
    {
        $collection = new App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
    }

    public function test_encoding_a_collection_object_returns_json()
    {
        $collection = new App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
    }
    
}