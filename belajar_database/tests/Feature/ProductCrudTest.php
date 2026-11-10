<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;
    public function test_product_index_can_be_accessed(): void
    {
        $response = $this->get('/product');
        $response->assertStatus(200);
    }
    public function test_product_can_be_created(): void
    {
        $response = $this->post('/product', [
            'name' => 'Mouse Wireless',
            'code' => 'MS001',
            'price' => 250000,
            'stock' => 10,
        ]);
        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseHas('products', [
            'code' => 'MS001',
            'name' => 'Mouse Wireless',
        ]);
    }
    public function test_code_is_required_and_unique(): void
    {
        Product::create([
            'name' => 'Produk Awal',
            'code' => 'PR001',
            'price' => 10000,
            'stock' => 1,
        ]);
        $response = $this->post('/product', [
            'name' => 'Produk Duplikat',
            'code' => 'PR001',
            'price' => 20000,
            'stock' => 2,
        ]);
        $response->assertSessionHasErrors('code');
    }
    public function test_product_can_be_deleted(): void
    {
        $product = Product::create([
            'name' => 'Produk Hapus',
            'code' => 'DL001',
            'price' => 5000,
            'stock' => 3,
        ]);
        $response = $this->delete(route('product.destroy', $product));
        $response->assertRedirect(route('product.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
