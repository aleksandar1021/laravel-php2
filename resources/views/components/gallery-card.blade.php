<div class="col-md-4 mb-3 agile-gallery-grid galleryImg">
    <h2 class="nas">{{ $heading }}</h2>
    <div class="agile-gallery div2">
        <a href="{{asset("images/gallery")}}/{{ $image }}" class="lsb-preview" data-lsb-group="header">
            <img src="{{asset("images/gallery")}}/{{ $image }}" alt="{{ $heading }}" class="img2"/>
            <div class="agileits-caption">
                <h4>{{ $category }}</h4>
                <p>{{ $description }}</p>
            </div>
        </a>
    </div>
</div>
