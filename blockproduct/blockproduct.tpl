{if $product !== false}
<div id="new-products_block_right" class="block products_block">
        <h4 class="title_block">
        </h4>
        <div class="block_content products-block" style="">
            <ul class="products">
                <li class="clearfix">
                    <a class="products-block-image" href="{$product.link}" title=""><img class="replace-2x img-responsive" src="{$product.image}" alt="{$product.name}"></a>
                    <div class="product-content">
                        <h5>
                            <a class="product-name" href="{$product.link}" title="{$product.name}">{$product.name}</a>
                        </h5>
                        <div class="price-box">
                            <span class="price">
                                ${$product.price|string_format:"%.2f"}              
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>      
{/if}