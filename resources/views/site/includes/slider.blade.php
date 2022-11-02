 <!-- Banner Starts Here -->
 <div class="main-banner header-text">
     <div class="container-fluid">
         <div class="owl-banner owl-carousel">

             <x-slider_item :item="json_encode([
                 'img' => 'site/assets/images/banner-item-03.jpg',
                 'title' => 'Doğada hayatta nasıl kalınır!',
                 'description' => 'BLABLABLALBAL',
                 'categories' => ['bir', 'iki'],
             ])">
             </x-slider_item>
             <x-slider_item :item="json_encode([
                 'img' => 'site/assets/images/blog-post-02.jpg',
                 'title' => 'Doğada hayatta nasıl kalınır!',
                 'description' => 'BLABLABLALBAL',
                 'categories' => ['bir', 'iki'],
             ])">
             </x-slider_item>
             <x-slider_item :item="json_encode([
                 'img' => 'site/assets/images/banner-item-06.jpg',
                 'title' => 'Doğada hayatta nasıl kalınır!',
                 'description' => 'BLABLABLALBAL',
                 'categories' => ['bir', 'iki'],
             ])">
             </x-slider_item>
             <x-slider_item :item="json_encode([
                 'img' => 'site/assets/images/banner-item-01.jpg',
                 'title' => 'Doğada hayatta nasıl kalınır!',
                 'description' => 'BLABLABLALBAL',
                 'categories' => ['bir', 'iki'],
             ])">
             </x-slider_item>

         </div>
     </div>
 </div>
 <!-- Banner Ends Here -->
