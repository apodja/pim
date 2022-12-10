<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Interfaces\ProductRepositoryInterface;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Import Trait so it can be used inside the class.
     *
     */
    use FileUploadTrait;

    protected ProductRepositoryInterface $productService;

    /**
     * Inject the service in the constructor
     *
     */
    public function __construct(ProductRepositoryInterface $productService) 
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollection(Product::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $products =  $request->all();
        $total_created = array();
        foreach ($products as $product) 
        {
            $category_id = $this->productService->getOrCreateCategory($product['category'])->id;
            $manufacturer_id = $this->productService->getOrCreateManufacturer($product['manufacturer'])->id;
            if($product['hasVariants'] == false)
            {
                $keys = array('title' , 'description' , 'sku' , 'price' , 'quantity'); //check if product exists to determine if the next one is a combination or a new product
                $product_data = $this->productService->filterKeys($product, $keys);

                //get ids needed for relations
                $product_data['category_id'] = $category_id;
                $product_data['manufacturer_id'] = $manufacturer_id;

                //create product with data payload
                $productRecord = $this->productService->getOrCreateProduct($product_data);

                //save images in the db (urls) and storage  
                if($product['images'])
                {
                    $images = $this->uploadFile($product['images'], 'images', 'products/');
                    $productRecord = $this->productService->createImage($images ,$productRecord->id , null );
                }
                
            }
            else
            {
                $keys = array('title' , 'description' , 'sku' , 'hasVariants'); 
                $product_data = $this->productService->filterKeys($product, $keys);
                $product_data['category_id'] = $category_id;
                $product_data['manufacturer_id'] = $manufacturer_id;
                $productRecord = $this->productService->getOrCreateProduct($product_data);
                $attribute = $this->productService->getOrCreateAttribute($product['attribute1'] , $productRecord->id );   
                $attribute1value = $this->productService->getOrCreateMeta($product['attribute1_value'] , $attribute->id );  
                $combination_data = array(
                    'product_id' => $productRecord->id,
                    'mainAttr' => $attribute1value->id,
                    'price' => $product['price'],
                    'quantity' => $product['quantity']
                );
                if(isset($product['attribute2']) and isset($product['attribute2_value']))
                {
                    $attribute2 = $this->productService->getOrCreateAttribute($product['attribute2'] , $productRecord->id ); 
                    $attribute2value = $this->productService->getOrCreateMeta($product['attribute2_value'] , $attribute2->id );  
                    $combination_data['attr'] = $attribute2value->id;
                }  
                
                $combination =  $this->productService->createCombination($combination_data);

                if(isset($product['images']))
                {
                    $images = $this->uploadFile($product['images'], 'images', 'products/');
                    $this->productService->createImage($images , null , $combination->id );
                }
            }
        }
        return response()->json(['message'=>'Products created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $save = $this->uploadFile($request, 'image', 'images/products');
        return $save;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
