@section("sidebar")


  <div class="sidebar">

    <!--開発中-->
    <ul class="list-group">
      <li class="list-group-item sidebar-part sidebar-search">
        {!! Form::open(array('url' => 'thai_intern/post', 'method' => 'GET')) !!}
          {{ Form::text('q', null, ['placeholder' => 'search']) }}
        {{ Form::close() }}
      </li>
      <div class="clearfix filter-part">
        <p class="filter">フィルター</p>
        <p class="reset-link"><a href="http://localhost:8000/thai_intern/post">絞り込みを解除する</a></p>
      </div>
      <li class="list-group-item sidebar-part clearfix"><a id="category_name" class="thai-acdn-1" data-target="thai-acdn-01">Job Categoru<span class="arrow arrow-button-1 pull-right"></span></a></li>
        <ul id="thai-acdn-01" class="thai-child-acdn sidebar-child-part">
          @foreach($categories as $category)
            @if($category->id == 1 || $category->id == 2)
              <li><span class="parent-category" style="cursor: pointer;">{{ $category->name }}</span>
                @if($category->id == 1)
                <ul>
                  @foreach($child_categories as $child_category)
                    @if($child_category->cat_id == 1)
                      <li class="child-category sidebar-category" style="cursor: pointer;" id="" data-value="{{$child_category->name}}" data-name="category"><div class="mark pull-left"></div>{{$child_category->name}}</li>
                    @endif
                  @endforeach
                </ul>
              </li>
                @elseif($category->id == 2)
                <ul>
                  @foreach($child_categories as $child_category)
                    @if($child_category->cat_id == 2)
                      <li class="child-category sidebar-category" style="cursor: pointer;" id="" data-value="{{$child_category->name}}" data-name="category"><div class="mark pull-left"></div>{{$child_category->name}}</li>
                    @endif
                  @endforeach
                </ul>
              </li>
                @endif
            @else
              <li class="normal-category sidebar-category" style="cursor: pointer;" id="" data-value="{{$category->name}}" data-name="category"><div class="mark pull-left"></div>{{$category->name}}</li>
            @endif
          @endforeach
        </ul>
      <li class="list-group-item sidebar-part clearfix"><a class="thai-acdn-2" data-target="thai-acdn-02">Region<span class="arrow arrow-button-2 pull-right"></span></a></li>
        <ul id="thai-acdn-02" class="thai-child-acdn sidebar-child-part">
          @foreach($regions as $region)
            <li class="normal-category sidebar-region" style="cursor: pointer;" id="" data-value="{{$region->name}}" data-name="region"><div class="mark pull-left"></div>{{$region->name}}</li>
          @endforeach
        </ul>
      {!! Form::open(array('url' => 'thai_intern/post', 'method' => 'GET')) !!}
        <input id="category" type="hidden" name="" value="">
        <input id="region" type="hidden" name="" value="">
        <button id="filter-button" type="submit" class="btn btn-grey700_rsd sidebar-button" style="width: 100%;">絞り込む</button>
      {{ Form::close() }}
    </ul>
  </div>

@stop
