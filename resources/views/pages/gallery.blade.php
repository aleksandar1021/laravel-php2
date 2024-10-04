@extends("Layouts.Layout")
@section("title")
    Gallery
@endsection

@section("PhoneNumberOrPage")
    Gallery
@endsection

@section("content")

    <div class="gallery-grids">
        <div class="container">
            <div class="wthree-heading">
                <h3>Our Gallery</h3><br><br>


                    <form class="filterDiv" action="{{route("galleryFilter")}}" method="get" id="form1">
                        <x-drop-down-list noneSelected="Without filters" id="cat" :selected="$selectedCategory" :options="$categories" attrName="category" attrText="name" attrValue="id" hidden="Select category"></x-drop-down-list>
                        <div class="searchDiv">
                            <x-text-field id="gallerySearch" class="fieldClass" placeholder="Search for a meal" :inputValue="$input" nameAttr="search"></x-text-field>
                            <button id="news" type="submit"  class="buttonInputText"><i style="height: 25px" class="fa fa-search " aria-hidden="true"></i></button>
                        </div>
                    </form>

            </div>
            <div class="show-reel row">


                @if(count($images))
                    @foreach($images as $img)
                        <x-gallery-card :image="$img->image"
                                        :heading="$img->name"
                                        :description="$img->description"
                                        :category="$img->category->name">
                        </x-gallery-card>
                    @endforeach
                @else
                    <div class="alert alert-danger" role="alert">
                        There are no results for the entered search
                    </div>
                @endif
                <div class="clearfix"> </div>

                    <div class="pagination2">{{ $images->links(('vendor.pagination.default')) }}</div>

            </div>


        </div>
    </div>


@endsection
