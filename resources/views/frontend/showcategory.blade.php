@extends('frontend.layouts.master')

@section('title','Petchemparts || All categorys')

@section('main-content')
<!--<script src="https://cdn.tailwindcss.com"></script>-->



    <!-- Popular Categories -->
 @php
$categories = DB::table('categories')
    ->where('status', 'active')
    ->whereNull('parent_id')
    ->paginate(6);

$subcategories = DB::table('categories')
    ->where('status', 'active')
    ->whereNotNull('parent_id')
    ->get()
    ->groupBy('parent_id');
@endphp


<section class="py-20 bg-gray-50 mt-[70px]">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">
             Categories
        </h2>

       <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach($categories as $category)
        <div class="category-card bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">

            <!-- Image -->
            <div class="h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                @if(!empty($category->photo))
                    <img src="{{ asset($category->photo) }}"
                         alt="{{ $category->title }}"
                         class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('images/category-placeholder.png') }}"
                         class="w-24 h-24 opacity-60">
                @endif
            </div>

            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-800 uppercase">
                    <a href="{{ route('product-cat', $category->slug) }}">
                        {{ $category->title }}
                    </a>
                </h3>

                <!-- Subcategories -->
                <ul class="space-y-2 text-gray-600 mb-6">
                    @if(isset($subcategories[$category->id]))
                        @foreach($subcategories[$category->id]->take(4) as $sub)
                            <li>
                                <a href="{{ route('product-sub-cat', [
                                    'slug' => $category->slug,
                                    'sub_slug' => $sub->slug
                                ]) }}"
                                   class="hover:text-[#13A1F3] transition">
                                    {{ $sub->title }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="text-gray-400 text-sm">No subcategories</li>
                    @endif
                </ul>
            </div>
        </div>
    @endforeach
</div>

        
<div class="flex justify-center mt-12">
    {{ $categories->links() }}
</div>


    </div>
</section>


@endsection
