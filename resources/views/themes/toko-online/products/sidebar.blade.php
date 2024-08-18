<div class="sidebar mt-2">
    @if ($categories->count() > 0)
        <div class="sidebar-widget">
            <div class="widget-title">
                <h5>Kategori</h5>
            </div>
            <div class="widget-content widget-categories">
                <ul class="nav nav-category">
                    @foreach ($categories as $category)
                        <li class="nav-item border-bottom w-100">
                            <a class="nav-link active" aria-current="page" href="{{ shop_category_link($category) }}">{{ $category->name }}<i
                                    class='bx bx-chevron-right'></i></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="sidebar-widget mt-4">
        <div class="widget-title">
            <div class="row">
                <div class="col-sm-6 mt-1">
                    <h5>Cari Harga</h5>
                </div>
                {{-- <div class="col-sm-6 text-end">
                    <button type="button" id="idr" class="col-sm-5 btn btn-sm btn-price">IDR</button>
                    <button type="button" id="usd" class="col-sm-5 btn btn-sm btn-price">USD</button>
                </div> --}}
            </div>
        </div>
        <div class="widget-content shop-by-price">
            <form method="GET" action="?">
                <div class="price-filter">
                    <div class="price-filter-inner">
                        {{-- <div id="slider-range"></div> --}}
                        <div id="slider-range" class="range-idr"></div>
                        {{-- <div id="slider-range" class="range-usd" style="display: none"></div> --}}
                        <div class="price_slider_amount">
                            <div class="label-input d-lg-flex justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" id="min_price" value="{{ $filter['price']['min'] }}">
                                        <input type="hidden" id="max_price" value="{{ $filter['price']['max'] }}">
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price"
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <button type="submit" class="btn-first-sm">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>